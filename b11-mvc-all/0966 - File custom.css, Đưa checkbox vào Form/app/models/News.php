<?php

require_once "BaseModel.php";

class News extends BaseModel
{
    static $table = 'news';

    static $search_field = 'name';

    static $sort_field = ['name', 'created_at'];

    //Các field sẽ được add/save vào db:
    static $fillable = ['name','thumb','publish', 'description','content'];

    static $indexListField = ['id', 'publish', 'name', 'thumb', 'created_at'];
    static $metaFieldName = [
        'id' => "Mã",
        'content' => "Nội dung",
        'thumb' => "Ảnh",
        'name'=>"Tiêu đề",
        'description' => "Mô tả",        
        'created_at' => "Ngày tạo",
        'publish'=>'Xuất bản',
       // 'test1'=>'t1',
    ];

    static $metaFieldType = [
        'content' => "richtext",
        'detail' => "textarea",
        'description' => "textarea",
        'thumb' => "image",
        'publish' => "checkbox",
        //'test1' => "checkbox",
    ];

    static $nameView = "Tin tức";

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

    }
}