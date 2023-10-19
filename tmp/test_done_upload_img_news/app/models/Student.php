<?php
require_once "BaseModel.php";
class Student extends BaseModel
{
    static $table = 'students';
    static $search_field = 'first_name';
    static $sort_field = ['first_name', 'last_name', 'created_at', 'math','physical','chemistry'];
    //Các field sẽ được add/save vào db:
    static $fillable = ['first_name', 'last_name', 'math','physical','chemistry'];
    static $indexListField = ['id','first_name', 'last_name', 'math','physical','chemistry'];
    static $metaFieldName = [
        'id'=>'Mã sv',
        'first_name'=> "Họ", 
        'last_name'=>"Tên",
         'math'=>"Toán",
         'physical'=>"Lý",
         'chemistry' =>"Hóa",
    ];
    static $metaFieldType = [
        // 'content' => "textarea",
        // 'detail' => "textarea",
        // 'description' => "textarea",
    ];
    static $nameView = "Sinh viên";
}
