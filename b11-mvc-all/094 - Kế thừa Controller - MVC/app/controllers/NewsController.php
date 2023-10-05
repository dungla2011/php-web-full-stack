<?php
require_once 'BaseController.php';
require_once '../app/models/News.php';
class NewsController extends BaseController
{
    static public $model = News::class;
    static public $viewPathFolder = "../app/views/news";
    static public $adminUri = "/admin/news";
    
}
