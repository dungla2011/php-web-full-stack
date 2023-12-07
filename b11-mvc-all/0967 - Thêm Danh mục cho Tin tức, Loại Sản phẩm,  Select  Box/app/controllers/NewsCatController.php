<?php
require_once 'BaseController.php';
require_once '../app/models/NewsCat.php';
class NewsCatController extends BaseController
{
    static $model = NewsCat::class;

    // static public $viewPathFolder = "../app/views/news";

    static public $adminUrl = "/admin/news-cat";

    static public $pageTitle = "Phân loại tin tức";
}