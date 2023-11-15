<?php
require_once 'BaseController.php';

class AdminController extends BaseController{
    public function index() {
        // Gọi view để hiển thị trang chu
        require '../app/views/adminIndex.php';
    }
}
