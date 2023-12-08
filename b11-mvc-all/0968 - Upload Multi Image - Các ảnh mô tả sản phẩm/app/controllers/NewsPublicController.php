<?php
require_once 'BaseController.php';
require_once '../app/models/News.php';
class NewsPublicController extends BaseController
{
    static $model = News::class;


    function index(){

        require_once "../app/views/news/index.php";

    }

    
}