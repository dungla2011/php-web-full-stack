<?php
require_once '../app/models/News.php';
class NewsController
{
    

    public function list()
    {        
        try{
            //sort_by=username&sort_type=asc
            $sort_by = $_GET['sort_by'] ?? 0;
            $sort_type = $_GET['sort_type'] ?? 0;

            $search_name = $_GET['search_name'] ?? '';
           

            //Limit/Offset 
            $page = $_GET['page'] ?? 1;
            $limit = 5;
            $param = ['page'=>$page, 
            'limit' => $limit,
            'sort_by' => $sort_by,
            'sort_type' => $sort_type,
            'search_name'=> $search_name,
            ];

            $data = News::list($param);


            $total = News::count();
            $nPage = ceil($total / $limit);
            
            
        } catch (PDOException $e) {
            $error =  "Có lỗi: " . $e->getMessage();
            // return null;
        }

        require_once "../app/views/news/list.php";
    }

    public function add()
    {

        if($_POST['name'] ?? ''){
            try{
                $ret = News::add($_POST);
                if($ret){
                    Header("Location: /admin/news");
                }
            } catch (PDOException $e) {
                $error =  "Có lỗi: " . $e->getMessage();
                return null;
            }
        }

        require_once "../app/views/news/add.php";
    }

    public function edit()
    {
        $ret  = null;
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = News::get($id);
                if($_POST['name'] ?? ''){
                    News::save($id, $_POST);
                    $ret = News::get($id);
                    $msg = "Update thành công!";
                }
                //  if($ret){
                //      Header("Location: /admin/users");
                // }
            } catch (PDOException $e) {
                $error =  "Có lỗi: " . $e->getMessage();
                return null;
            }
        }

        require_once "../app/views/news/edit.php";
    }

    public function delete()
    {
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = News::delete($id);
                if($ret){
                    Header("Location: /admin/news");
                }
            } catch (PDOException $e) {
                echo "<br>Có lỗi: " . $e->getMessage();
                return null;
            }
        }
    }
}
