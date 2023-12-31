<?php

class BaseController
{
    /**
     * @var BaseModel
     */
    static public $model;
    static public $viewPathFolder;
    static public $adminUrl;


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

            $modelClass = static::$model;
            
            $controllerClass = static::class;
            
            
        //Bắt lỗi lớp Exception là mọi loại lỗi, kể cả PDOException
        } catch (Exception $e) {
            $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
        }
        //require_once "../app/views/product/list.php";
        //require_once static::$viewPathFolder. "/list.php";
        require_once "../app/views/base-view/list.php";
    }

    public function add()
    {
         //'name, 'username';
        if($_POST[static::$model::$fillable[0]] ?? ''){
            try{
                $ret = static::$model::add($_POST);
                if($ret){
                    Header("Location: " . static::$adminUrl);
                }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        $modelClass = static::$model;
            
        $controllerClass = static::class;
        //require_once "../app/views/product/add.php";
        // require_once static::$viewPathFolder. "/add.php";
        require_once "../app/views/base-view/add.php";

    }

    public function edit()
    {

        $ret  = null;
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = static::$model::get($id);
                if($_POST[static::$model::$fillable[0]] ?? ''){
                    static::$model::save($id, $_POST);
                    $ret = static::$model::get($id);
                    $msg = "Update thành công!";
                }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        $modelClass = static::$model;
        $controllerClass = static::class;
        //require_once "../app/views/product/edit.php";
        // require_once static::$viewPathFolder. "/edit.php";
        require_once "../app/views/base-view/edit.php";

    }

    public function delete()
    {
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = static::$model::delete($id);
                if($ret){
                    Header("Location: " . static::$adminUrl);
                }
            } catch (Exception $e) {
                echo "<pre>";
                print_r("Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString());
                echo "</pre>";
            }
        }
    }
}
