<?php

class BaseController
{
    static public $model;
    static public $viewPathFolder;
    static public $adminUri;

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

            
            $data = static::$model::list($param);

            $total = static::$model::count($param);

            $nPage = ceil($total / $limit);
            
            
        //Bắt lỗi lớp Exception là mọi loại lỗi, kể cả PDOException
        } catch (Exception $e) {
            $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
        }
        require_once static::$viewPathFolder."/list.php";
    }

    public function add()
    {

        if($_POST['name'] ?? ''){
            try{
                $ret = static::$model::add($_POST);
                if($ret){
                    Header("Location: " . static::$adminUri);
                }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        //require_once "../app/views/news/add.php";
        require_once static::$viewPathFolder."/add.php";

    }

    public function edit()
    {

        $ret  = null;
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = static::$model::get($id);
                if($_POST['name'] ?? ''){
                    static::$model::save($id, $_POST);
                    $ret = static::$model::get($id);
                    $msg = "Update thành công!";
                }
                //  if($ret){
                //      Header("Location: /admin/users");
                // }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        //require_once "../app/views/news/edit.php";
        require_once static::$viewPathFolder."/edit.php";

    }

    public function delete()
    {
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = static::$model::delete($id);
                if($ret){
                    //Header("Location: /admin/news");
                    Header("Location: " . static::$adminUri);
                }
            } catch (Exception $e) {
                echo "<pre>";
                print_r("Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString());
                echo "</pre>";
            }
        }
    }
}
