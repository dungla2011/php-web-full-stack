<?php

require_once "BaseModel.php";
require_once "NewsCat.php";

class News extends BaseModel
{
    static $table = 'news';

    static $search_field = 'name';

    static $sort_field = ['name', 'created_at'];

    //Các field sẽ được add/save vào db:
    static $fillable = ['name','thumb','publish', 'cat', 'description','content'];

    static $indexListField = ['id', 'publish', 'name', 'cat', 'thumb', 'created_at'];
    static $metaFieldName = [
        'id' => "Mã",
        'content' => "Nội dung",
        'thumb' => "Ảnh",
        'name'=>"Tiêu đề",
        'description' => "Mô tả",        
        'created_at' => "Ngày tạo",
        'publish'=>'Xuất bản',
        'cat'=>'Thể loại',
    ];

    static $metaFieldType = [
        'content' => "richtext",
        'detail' => "textarea",
        'description' => "textarea",
        'thumb' => "image",
        'publish' => "checkbox",
        'cat' => "selectbox",
    ];

    static $nameView = "Tin tức";


    public static function _cat($val, $isIndex = 0){

        if($isIndex)
            return NewsCat::get($val)['name'] ?? '';;
        $cats = NewsCat::list(['limit'=>1000]);
        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";
        return $selectOptions = Helpers::buildSelectOptions($cats, 0, '', $val, 'parent');
    }


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