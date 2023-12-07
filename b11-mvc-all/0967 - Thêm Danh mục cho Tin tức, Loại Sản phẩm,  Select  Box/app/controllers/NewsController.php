<?php
require_once 'BaseController.php';
require_once '../app/models/News.php';
class NewsController extends BaseController
{
    static $model = News::class;


    static public $viewPathFolder = "../app/views/news";

    static public $adminUrl = "/admin/news";

    static public $pageTitle = "Tin tuc";
}