<?php
require_once 'BaseController.php';
require_once '../app/models/Product.php';
class ProductController extends BaseController
{
    static public $model = Product::class;

    static public $viewPathFolder = "../app/views/product";

    static public $adminUrl = "/admin/products";

    static $pageTitle = 'San pham';
    
}