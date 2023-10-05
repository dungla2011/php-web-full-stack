<?php

require_once "BaseModel.php";

class Product extends BaseModel
{

    static $table = 'products';

    static $search_field = 'name';

    static $sort_field = ['name', 'price', 'created_at'];


    //Các field sẽ được add/save vào db:
    static $fillable = ['name','cat_id','description','detail', 'price'];


}
