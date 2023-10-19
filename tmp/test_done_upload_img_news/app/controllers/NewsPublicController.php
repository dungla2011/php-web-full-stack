<?php
require_once 'BaseController.php';
require_once '../app/models/News.php';
class NewsPublicController extends BaseController
{
    static $model = News::class;

    //static public $viewPathFolder = "../app/views/news";

    static public $adminUrl = "/news";

    public function index() {
        // Gọi view để hiển thị trang chu
        require '../app/views/news-public/index.php';
        //echo "MEMBER content...";
    }

}