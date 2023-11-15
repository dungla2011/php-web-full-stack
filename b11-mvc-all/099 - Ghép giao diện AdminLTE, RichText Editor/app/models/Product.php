<?php

require_once "BaseModel.php";

class Product extends BaseModel
{

    static $table = 'products';

    static $search_field = 'name';

    static $sort_field = ['name', 'price'];


    //Các field sẽ được add/save vào db:
    static $fillable = ['name','cat_id', 'thumb','description','detail', 'price'];


    ///
    static $indexListField = ['id','name', 'thumb', 'price', 'created_at', 'cat_id'];
    static $metaFieldName = [
        'id' => "Mã",
        'name'=>"Tên sản phẩm",
        'thumb' => "Ảnh",
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
        'thumb' => "image",
    ];

    static $nameView = "Sản phẩm";
    

    

}
