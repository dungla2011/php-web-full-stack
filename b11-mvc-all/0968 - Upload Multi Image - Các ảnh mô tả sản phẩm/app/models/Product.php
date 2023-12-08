<?php

require_once "BaseModel.php";
require_once "ProductCat.php";

class Product extends BaseModel
{

    static $table = 'products';

    static $search_field = 'name';

    static $sort_field = ['name', 'price'];


    //Các field sẽ được add/save vào db:
    static $fillable = ['name','cat_id', 'thumb' , 'images', 'description','detail', 'price'];


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
        'thumb' => "Ảnh đại diện",
       'images' => "Danh sách ảnh",
    ];

    static $metaFieldType = [
        'content' => "textarea",
        //'password' => 'password',
        'detail' => "richtext",
        'description' => "textarea",
        'thumb' => 'image',
        'cat_id' => 'selectbox',
        'images' => 'multi_image',
    ];

    static $nameView = "Sản phẩm";

    static function _cat_id($val, $isIndex = 0){
            if($isIndex)
                return ProductCat::get($val)['name']?? '';;;
        $cats = ProductCat::list(['limit'=>1000]);
        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";
        

        // Lấy dữ liệu từ bảng NewsCat (giả sử $categories là mảng chứa dữ liệu)
        // $categories = ...;        
        // Gọi hàm để xây dựng Select Option
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

        if($price = $param['price'] ?? '')
        if(!is_numeric($price) || $price < 0){
            throw new Exception("Giá phải là số hợp lệ!");
        }

    }
    

}
