<?php

require_once "BaseModel.php";

class News extends BaseModel
{
    static $table = 'news';
    static $search_field = 'name';
    static $sort_field = ['name', 'created_at'];
    //Các field sẽ được add/save vào db:
    static $fillable = ['name','description','content','cat'];
    static $indexListField = ['id','name','created_at','cat'];
    static $metaFieldName = [
        'id' => "Mã tin",
        'name'=>"Tiêu đề",
        'description' => "Mô tả",
        'content' => "Nội dung",
        'created_at' => "Ngày tạo",
        'cat' => "Thể loại"
    ];
    static $metaFieldType = [
        'content' => "textarea",
        'cat' => "checkbox"
    ];
    static $nameView = "Tin tức";
}
