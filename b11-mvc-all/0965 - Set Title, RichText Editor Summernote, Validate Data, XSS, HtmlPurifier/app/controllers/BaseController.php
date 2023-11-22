<?php

class BaseController
{
    /**
     * @var BaseModel
     */
    static public $model;
    static public $viewPathFolder;
    static public $adminUrl;

    static public $pageTitle = "";


    public function list_api(){        
        $ret = static::list(1);
        echo json_encode($ret, JSON_PRETTY_PRINT);
        return;
    }

    public function get_api(){      
        $error = '';
        if(($id = ($_GET['id'] ?? '')) && is_numeric($_GET['id'] ?? '')){
            try{
                if(!$ret = static::$model::get($id)){
                    http_response_code(404);
                    echo json_encode(['error'=>1, 'message'=>"Không tồn tại id: $id?"], JSON_PRETTY_PRINT);
                    return;
                }
                echo json_encode(['error'=>0, 'data'=>$ret], JSON_PRETTY_PRINT);
                return;
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }
        else{
            http_response_code(400);
            echo json_encode(['error'=>1, 'message'=>"Not valid request!"], JSON_PRETTY_PRINT);
            return;
        }
        http_response_code(500);
        echo json_encode(['error'=>1, 'message'=>$error], JSON_PRETTY_PRINT);    
    }

    public function edit_api(){      
        $ret = static::edit(1);
        echo json_encode($ret, JSON_PRETTY_PRINT);
    }

    public function delete_api(){     
        $ret = static::delete(1);
        echo json_encode($ret, JSON_PRETTY_PRINT);
    }


    public function add_api(){      
        $ret = static::add(1);
        echo json_encode($ret, JSON_PRETTY_PRINT);
    }



    public function list($isApi = 0)
    {        
        $error = '';
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

            if($isApi){
                return ['error'=>0, 'total'=>$total, 'data'=>$data];
            }

            $nPage = ceil($total / $limit);

            $modelClass = static::$model;
            
            $controllerClass = static::class;
            
            
        //Bắt lỗi lớp Exception là mọi loại lỗi, kể cả PDOException
        } catch (Exception $e) {
            http_response_code(500);
            $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            if($isApi)
                return ['error'=>1, 'message'=>$error];    
        }

        // if($isApi){
        //     return ['error'=>1, 'message'=>$error];    
        // }
        //require_once "../app/views/product/list.php";
        //require_once static::$viewPathFolder. "/list.php";
        require_once "../app/views/base-view/list.php";
    }

    public function add($isApi = 0)
    {


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
                        if($name)
                        $_POST[$field] = "/images/$name";                        
                    }
                }       

                $ret = static::$model::add($_POST);
                if($ret){
                    if($isApi ){
                        return ["error"=> 0, 'data'=>$ret, "message"=>'insert done'];
                    }

                    Header("Location: " . static::$adminUrl);
                }
            } catch (Exception $e) {
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
            }
        }

        if($isApi){
            return ["error"=> 1, "message"=> $error];
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

                if(!$ret)
                    throw new Exception('Can not get id: ' . $id);

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
                        $error = "Error Update!";
                    else {
                        if($isApi){
                            return ['error'=>0, 'message'=>'update done!'];
                        }
                        $ret = static::$model::get($id);
                        $msg = "Update thành công!";
                    }                    
                }
            } catch (Exception $e) {
                http_response_code(500);
                $error =  "Có lỗi: " . $e->getMessage() . " \n". $e->getTraceAsString();
                if($isApi)
                    return ['error'=>1, 'message'=>$error];    
            }
        }

        if($isApi){
            return ['error'=>1, 'message'=>$error];
        }

        $modelClass = static::$model;
        $controllerClass = static::class;
        //require_once "../app/views/product/edit.php";
        // require_once static::$viewPathFolder. "/edit.php";
        require_once "../app/views/base-view/edit.php";

    }

    public function delete($isApi = 0)
    {
        $error = '';
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = static::$model::delete($id);
                if($ret){

                    if($isApi){
                        return ['error'=>0, 'message'=> 'Delete done!'];
                    }

                    Header("Location: " . static::$adminUrl);
                }
            } catch (Exception $e) {
                $error =  $e->getMessage() . " \n". $e->getTraceAsString();
                http_response_code(500);
                if($isApi)
                    return ['error'=>1, 'message'=>$error];    

                echo "<pre>";
                print_r("Có lỗi: " . $error);
                echo "</pre>";

                
            }
        }else{
            http_response_code(400);
            if($isApi)
                return ['error'=>1, 'message'=>'Bad request!'];    
        }

        if($isApi){
            return ["error"=> 1, "message"=> $error];
        }
    }
}
