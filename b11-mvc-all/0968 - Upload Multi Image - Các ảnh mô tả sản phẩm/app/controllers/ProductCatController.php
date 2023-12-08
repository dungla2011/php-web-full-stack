<?php
require_once 'BaseController.php';
require_once '../app/models/ProductCat.php';
class ProductCatController extends BaseController
{
    static $model = ProductCat::class;

    // static public $viewPathFolder = "../app/views/news";

    static public $adminUrl = "/admin/products-cat";

    static public $pageTitle = "Phân loại sản phẩm";
}