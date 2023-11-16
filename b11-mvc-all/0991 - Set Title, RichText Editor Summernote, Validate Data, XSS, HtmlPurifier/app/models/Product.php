<?php

require_once "BaseModel.php";

class Product extends BaseModel
{

    static $table = 'products';

    static $search_field = 'name';

    static $sort_field = ['name', 'price'];


    //Các field sẽ được add/save vào db:
    static $fillable = ['name','cat_id', 'thumb', 'description','detail', 'price'];


    ///
    static $indexListField = ['id','name',  'thumb', 'price', 'created_at', 'cat_id'];
    static $metaFieldName = [
        'id' => "Mã",
        'name'=>"Tên sản phẩm",
        'description' => "Mô tả",
        'detail' => "Chi tiết",
        'created_at' => "Ngày tạo",
        'cat_id' => "Thể loại",
        'price' => "Giá",
        'thumb' => "Anh san pham",
    ];

    static $metaFieldType = [
        'content' => "textarea",
        'cat_id' => "select_box",
        //'password' => 'password',
        'detail' => "richtext",
        'description' => "textarea",
        'thumb' => 'image',
    ];

    static $nameView = "Sản phẩm";
    
    public static function validation($param){

        if($name = ($param['name'] ?? '')){
            //Kiem tra username
            if(strlen($name) > 100 || strlen($name) < 3 ){
                throw new Exception("Tiêu đề khong hop le!");
            }
        }

        if($description = $param['description'] ?? '')
        if(strlen($description) > 200 || strlen($description) < 3 ){
            throw new Exception("Tiêu đề khong hop le!");
        }

        if($price = $param['price'] ?? '')
        if(!is_numeric($price) || $price < 0){
            throw new Exception("Giá phải là số hợp lệ!");
        }

    }
    

}
