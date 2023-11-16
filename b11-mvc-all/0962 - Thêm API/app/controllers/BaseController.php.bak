<?php

class BaseController
{
    /**
     * @var BaseModel
     */
    static public $model;
    static public $viewPathFolder;
    static public $adminUrl;

    public function list_api()
    {                
        $ret = static::list(1);
        echo json_encode($ret,JSON_PRETTY_PRINT);
        return;
    }

    public function get_api()
    {                
        $ret  = null;
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = static::$model::get($id);
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
                echo json_encode(['error'=>1, 'message'=> $e->getMessage], JSON_PRETTY_PRINT);
            }
        }
        echo json_encode($ret,JSON_PRETTY_PRINT);
        return;
    }

    public function add_api()
    {              
        $ret = static::add(1);
        echo json_encode($ret,JSON_PRETTY_PRINT);
        return;
    }


    public function edit_api()
    {              
        $ret = static::edit(1);
        echo json_encode($ret,JSON_PRETTY_PRINT);
        return;
    }

    public function delete_api()
    {              
        $ret = static::delete(1);
        echo json_encode($ret,JSON_PRETTY_PRINT);
        return;
    }


    public function list($isApi = null)
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

            if($isApi){
                return ['error'=>0, 'total'=>$total, 'data'=>$data];
            }
            
            
        //Bắt lỗi lớp Exception là mọi loại lỗi, kể cả PDOException
        } catch (Exception $e) {
            $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            if($isApi){
                return ['error'=>1, 'message'=>$e->getMessage() . " \n". $e->getTraceAsString()];
            }
        }

        //require_once "../app/views/product/list.php";
        //require_once static::$viewPathFolder. "/list.php";
        require_once "../app/views/base-view/list.php";
    }

    public function add($isApi = 0)
    {


        // echo "<pre>";
        // print_r(static::$model::$fillable);
        // echo "</pre>";



        // die("123 - $isApi ");


       $error = '';

         //'name, 'username';
        if($_POST[static::$model::$fillable[0]] ?? ''){
            try{

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        //         die("123");

                if($_FILES ?? ''){
                    $field = array_keys($_FILES)[0];
                    if(static::$model::$metaFieldType[$field] == 'image'){
                        $filepath = $_FILES[$field]['tmp_name'];
                        $name = $_FILES[$field]['name'];
                        $imgDir = __DIR__ . "/../../public/images";
                        if(!file_exists($imgDir))
                            mkdir($imgDir, 0755,1);                        
                        $imgFullPath = $imgDir . "/". $name;
                        move_uploaded_file($filepath, $imgDir . "/". $name);
                        if(!file_exists($imgFullPath))
                            throw new Exception("Co loi upload!");
                        $_POST[$field] = "/images/$name";                        
                    }
                }       

                $ret = static::$model::add($_POST);

                if($isApi && $ret){
                    ob_clean();
                    return ['error'=>0, 'data'=>$ret , 'message'=>'insert done!'];
                }

                if($ret){
                    Header("Location: " . static::$adminUrl);
                }
                else{
                    $error =  "Can not add item!";
                }

            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }

            if($isApi && $error){
                return ['error'=>1, 'message'=>$error];
            }
        }

        if($isApi){
            return ['error'=>1, 'message'=>'not valid data?'];
        }

        $modelClass = static::$model;
        $controllerClass = static::class;
        //require_once "../app/views/product/add.php";
        // require_once static::$viewPathFolder. "/add.php";
        require_once "../app/views/base-view/add.php";

    }

    public function edit($isApi = 0)
    {

        $error = '';
        $ret  = null;
        if($id = ($_GET['id'] ?? '')){

            try{
                $ret = static::$model::get($id);
                if($_POST[static::$model::$fillable[0]] ?? ''){

                    if($_FILES ?? ''){
                        $field = array_keys($_FILES)[0];
                        if(static::$model::$metaFieldType[$field] == 'image'){
                            $filepath = $_FILES[$field]['tmp_name'];
                            $name = $_FILES[$field]['name'];
                            $imgDir = __DIR__ . "/../../public/images";
                            if(!file_exists($imgDir))
                                mkdir($imgDir, 0755,1);                        
                            $imgFullPath = $imgDir . "/". $name;
                            move_uploaded_file($filepath, $imgDir . "/". $name);
                            if(!file_exists($imgFullPath))
                                throw new Exception("Co loi upload!");
                            if($name)
                                $_POST[$field] = "/images/$name";                           
                        }
                        // die();
                    }

                    if(!static::$model::save($id, $_POST))
                        $error = "Có lôi update!";

                    if($isApi)
                    {
                        return ['error'=>0, 'message'=>'update done!'];
                    }

                    $ret = static::$model::get($id);

                    $msg = "Update thành công!";
                }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        if($isApi && $error)
            return ['error'=>1, 'message'=>$error];

        $modelClass = static::$model;
        $controllerClass = static::class;
        //require_once "../app/views/product/edit.php";
        // require_once static::$viewPathFolder. "/edit.php";
        require_once "../app/views/base-view/edit.php";

    }

    public function delete($isApi = 0)
    {
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = static::$model::delete($id);
                if($ret){
                    if($isApi){
                        return ['error'=>0, 'message'=>'delete done!'];
                    }
                    Header("Location: " . static::$adminUrl);
                }
            } catch (Exception $e) {
                $err = "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
                if($isApi){
                    return ['error'=>1, 'message'=> $err];
                }
                echo "<pre>";
                print_r($err);
                echo "</pre>";
            }
        }
        return ['error'=>1, 'message'=> 'not valid delete?'];
    }
}
