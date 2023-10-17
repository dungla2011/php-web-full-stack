<?php

require_once "BaseModel.php";

class Product extends BaseModel
{

    static $table = 'products';

    static $search_field = 'name';

    static $sort_field = ['name', 'price'];


    //Các field sẽ được add/save vào db:
    static $fillable = ['name','cat_id','description','detail', 'price'];


    ///
    static $indexListField = ['id','name', 'price', 'created_at', 'cat_id'];
    static $metaFieldName = [
        'id' => "Mã",
        'name'=>"Tên sản phẩm",
        'description' => "Mô tả",
        'detail' => "Chi tiết",
        'created_at' => "Ngày tạo",
        'cat_id' => "Thể loại",
        'price' => "Giá",
    ];

    static $metaFieldType = [
        'content' => "textarea",
        'cat_id' => "select_box",
        //'password' => 'password',
        'detail' => "textarea",
        'description' => "textarea",
    ];

    static $nameView = "Sản phẩm";
    

    

}
