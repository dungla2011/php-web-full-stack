<?php
require_once '../app/models/Product.php';
class ProductController
{

    public function list()
    {        
        try{
            //sort_by=username&sort_type=asc
            $sort_by = $_GET['sort_by'] ?? 0;
            $sort_type = $_GET['sort_type'] ?? 0;

            $search_value = $_GET['search_value'] ?? '';
            
            //Limit/Offset 
            $page = $_GET['page'] ?? 1;
            $limit = 5;
            $param = ['page'=>$page, 
            'limit' => $limit,
            'sort_by' => $sort_by,
            'sort_type' => $sort_type,
            'search_value'=> $search_value,
            ];

            $data = Product::list($param);

            $total = Product::count($param);

            $nPage = ceil($total / $limit);
            
            
        //Bắt lỗi lớp Exception là mọi loại lỗi, kể cả PDOException
        } catch (Exception $e) {
            $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
        }
        require_once "../app/views/product/list.php";
    }

    public function add()
    {

        if($_POST['name'] ?? ''){
            try{
                $ret = Product::add($_POST);
                if($ret){
                    Header("Location: /admin/products");
                }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        require_once "../app/views/product/add.php";
    }

    public function edit()
    {

        $ret  = null;
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = Product::get($id);
                if($_POST['name'] ?? ''){
                    Product::save($id, $_POST);
                    $ret = Product::get($id);
                    $msg = "Update thành công!";
                }
                //  if($ret){
                //      Header("Location: /admin/users");
                // }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        require_once "../app/views/product/edit.php";
    }

    public function delete()
    {
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = Product::delete($id);
                if($ret){
                    Header("Location: /admin/products");
                }
            } catch (Exception $e) {
                echo "<pre>";
                print_r("Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString());
                echo "</pre>";
            }
        }
    }
}
