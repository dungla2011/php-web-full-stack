<?php

require_once "BaseModel.php";

class NewsCat extends BaseModel
{
    static $table = 'news_cat';

    static $search_field = 'name';

    static $sort_field = ['name', 'created_at'];

    //Các field sẽ được add/save vào db:
    static $fillable = ['name','parent'];

    static $indexListField = ['id', 'name', 'parent'];
    static $metaFieldName = [
        'id' => "Mã",
        'name'=>"Tên",
        'parent' => "Cha",        
        'created_at' => "Ngày tạo",
    ];

    static $metaFieldType = [
        'parent' => "selectbox",
    ];

    public static function _parent($val, $isIndex = 0){

        if($isIndex)
            return self::get($val)['name'] ?? '';

        $cats = self::list(['limit'=>1000]);
        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";
        return $selectOptions = Helpers::buildSelectOptions($cats, 0, '', $val, 'parent');
    }

    static $nameView = "Thể loại Tin tức";

    public static function validation($param){

        if($name = ($param['name'] ?? '')){
            //Kiem tra username
            if(strlen($name) > 100 || strlen($name) < 3 ){
                throw new Exception("Tiêu đề khong hop le!");
            }
        }
    }
}