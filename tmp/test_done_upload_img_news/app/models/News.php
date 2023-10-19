<?php

require_once "BaseModel.php";

class News extends BaseModel
{
    static $table = 'news';

    static $search_field = 'name';

    static $sort_field = ['name', 'created_at'];

    //Các field sẽ được add/save vào db:
    static $fillable = ['name','thumb', 'description','content'];

    static $indexListField = ['id','name','thumb', 'created_at'];
    static $metaFieldName = [
        'id' => "Mã",
        'content' => "Nội dung",
        'name'=>"Tiêu đề",
        'description' => "Mô tả",        
        'thumb' => "Anh Dai dien",
        'created_at' => "Ngày tạo",
    ];

    static $metaFieldType = [
        'content' => "textarea",
        'detail' => "textarea",
        'description' => "textarea",
        'thumb' => "image",
    ];

    static $nameView = "Tin tức";

    public static function validation($param){
        if($name = ($param['name'] ?? '')){
            //Kiem tra username
            if(strlen($name) > 100 || strlen($name) < 3 ){
                throw new Exception("Tiêu đề khong hop le!");
            }
        }
    }
}