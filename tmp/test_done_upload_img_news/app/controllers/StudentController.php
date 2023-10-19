<?php
require_once 'BaseController.php';
require_once '../app/models/Student.php';
class StudentController extends BaseController
{
    static $model = Student::class;

    //static public $viewPathFolder = "../app/views/news";

    static public $adminUrl = "/admin/student";
}
