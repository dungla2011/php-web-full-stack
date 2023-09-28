<?php

require_once "BaseModel.php";

class Product extends BaseModel {
    static public $table = 'products';
    static public $fillAble = ['name' , 'cat_id', 'price', 'description', 'detail'];  
    static public $sortAbleField = ['id', 'name' , 'created_at', 'price'];
    static public $searchAbleField = 'name';
}
