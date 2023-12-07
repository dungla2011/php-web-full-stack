<?php

require_once "BaseModel.php";

class ProductCat extends BaseModel
{
    static $table = 'products_cat';

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


    static $nameView = "Thể loại sản phẩm";

    public static function validation($param){

        if($name = ($param['name'] ?? '')){
            //Kiem tra username
            if(strlen($name) > 100 || strlen($name) < 3 ){
                throw new Exception("Tiêu đề khong hop le!");
            }
        }
    }

    public static function _parent($val, $isIndex = 0){
        
        if($isIndex)
            return self::get($val)['name']?? '';;;

        $cats = self::list(['limit'=>1000]);
        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";
        

        // Lấy dữ liệu từ bảng NewsCat (giả sử $categories là mảng chứa dữ liệu)
        // $categories = ...;        
        // Gọi hàm để xây dựng Select Option
        return $selectOptions = Helpers::buildSelectOptions($cats, 0, '', $val, 'parent');
    }

}