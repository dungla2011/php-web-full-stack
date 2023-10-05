<?php

require_once "BaseModel.php";

class Product extends BaseModel
{

    static $table = 'products';

    static $search_field = 'name';

    static $sort_field = ['id','name', 'price', 'created_at'];


    //Các field sẽ được add/save vào db:
    static $fillable = ['name','cat_id','description','detail', 'price'];


    static $indexListField = ['id','name', 'price', 'created_at', 'cat_id'];
    static $metaFieldName = [
        'id' => "Mã tin",
        'name'=>"Tên sản phẩm",
        'description' => "Mô tả",
        'detail' => "Chi tiết",
        'created_at' => "Ngày tạo",
        'cat_id' => "Thể loại",
        'price' => "Giá",
    ];

    static $metaFieldType = [
        'content' => "textarea",
        'cat_id' => "checkbox"
    ];

    static $nameView = "Sản phẩm";

}
