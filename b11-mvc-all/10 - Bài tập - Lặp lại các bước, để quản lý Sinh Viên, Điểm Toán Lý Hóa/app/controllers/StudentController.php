<?php
require_once '../app/models/Student.php';
class StudentController
{

    public function list()
    {        
        try{
            //sort_by=username&sort_type=asc
            $sort_by = $_GET['sort_by'] ?? 0;
            $sort_type = $_GET['sort_type'] ?? 0;

            $search_first_name = $_GET['search_first_name'] ?? '';
            

            //Limit/Offset 
            $page = $_GET['page'] ?? 1;
            $limit = 5;
            $param = ['page'=>$page, 
            'limit' => $limit,
            'sort_by' => $sort_by,
            'sort_type' => $sort_type,
            'search_first_name'=> $search_first_name,
            ];

            $data = Student::list($param);


            $total = Student::count();
            $nPage = ceil($total / $limit);
            
            
        } catch (PDOException $e) {
            $error =  "Có lỗi: " . $e->getMessage();
            // return null;
        }

        require_once "../app/views/student/list.php";
    }

    public function add()
    {

        if($_POST['first_name'] ?? ''){
            try{
                $ret = Student::add($_POST);
                if($ret){
                    Header("Location: /admin/student");
                }
            } catch (PDOException $e) {
                $error =  "Có lỗi: " . $e->getMessage();
                return null;
            }
        }

        require_once "../app/views/student/add.php";
    }

    public function edit()
    {

        $ret  = null;
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = Student::get($id);

                // echo "<pre>";
                // print_r($ret);
                // echo "</pre>";

                if($_POST['first_name'] ?? ''){
                    Student::save($id, $_POST);
                    $ret = Student::get($id);
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

        
        require_once "../app/views/student/edit.php";
    }

    public function delete()
    {
        if($id = ($_GET['id'] ?? '')){
            try{
                $ret = Student::delete($id);
                if($ret){
                    Header("Location: /admin/student");
                }
            } catch (PDOException $e) {
                echo "<br>Có lỗi: " . $e->getMessage();
                return null;
            }
        }
    }
}
