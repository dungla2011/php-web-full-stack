<?php

require "IBaseModel.php";

class BaseModel{

    static $table;

    //Các trường cho phép edit
    static $fillable;

    //Các trường cho phép tìm kiếm
    static $search_field;

    //Các trường được sắp xếp
    static $sort_field;

    //mảng Mô tả tên trường, ví dụ trường 'name' trong bảng product, sẽ là "Tên sản phẩm"
    static $metaFieldName;
    static $nameView;

    //Các trường sẽ được hiển thị trên index
    static $indexListField;

    //Kiểu dữ liệu các trường
    static $metaFieldType = [
        //'content' => "textarea",
        //'cat' => "checkbox"
//        'password' => "password",
    ];


    public static function delete($id)
    {
        $table = static::$table;

        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function add($params)
    {
        $table = static::$table;

        $conn = Database::getConnection();

        $fillable = static::$fillable;

        // $params['name'];
        // $params['cat_id'];
        // $params['description'];
        // $params['detail'];
        // $params['price'];
        
        $strField = '';
        $strBind = '';
        $arrBind = [];
        //['name','cat_id','description','detail', 'price']
        foreach($fillable AS $field){
            $strField .= "$field,";
            $strBind .= ":$field,";
            $arrBind[$field] = $params[$field];
        }
        //name,cat_id,description,detail,price
        $strField = trim($strField, ',');
        //:name,:cat_id,:description,:detail,:price
        $strBind = trim($strBind, ',');

        // $username = $params['username'];
        // $email = $params['email'];
        // $password = $params['password'];


        //name,cat_id,description,detail,price
        $stmt = $conn->prepare("INSERT INTO $table ($strField) 
        VALUES ($strBind)");

        foreach($arrBind AS $field => $val){
            //$stmt->bindParam(":$field", $val);
            $stmt->bindValue(":$field", $val);
            // $stmt->bindParam(':username', $username);
            // $stmt->bindParam(':email', $email);
            // $stmt->bindParam(':password', $password); //Password có thể cần thêm băm để bảo mật
        }

        return $stmt->execute();
    }


    public static function save($id, $params)
    {

        if(!is_numeric($id))
            throw new Exception("Save: Not valid id!");

        $table = static::$table;

        $conn = Database::getConnection();

        $fillable = static::$fillable;

        // $params['name'];
        // $params['cat_id'];
        // $params['description'];
        // $params['detail'];
        // $params['price'];

        // echo "<pre>";
        // print_r($params);
        // echo "</pre>";
        
        $strField = '';
        $arrBind = [];
        //['name','cat_id','description','detail', 'price']
        foreach($fillable AS $field){
            if(!isset($params[$field]))
                continue;
            $strField .= "$field=:$field,";
            $arrBind[$field] = $params[$field];
        }

        // echo "<pre>";
        // print_r($arrBind);
        // echo "</pre>";
        //name,cat_id,description,detail,price
        $strField = trim($strField, ',');

        // $username = $params['username'];
        // $email = $params['email'];
        // $password = $params['password'];

        //$stmt = $conn->prepare("UPDATE $table SET username = :username, email=:email, password=:password WHERE id=:id");
        // name=:name,cat_id=:cat_id ...
        $stmt = $conn->prepare("UPDATE $table SET $strField WHERE id=$id");
        foreach($arrBind AS $field => $val){
            //$stmt->bindParam(":$field", $val);
            $stmt->bindValue(":$field", $val);
        }
        // $stmt->bindParam(':id', $id);
        // $stmt->bindParam(':username', $username);
        // $stmt->bindParam(':email', $email);
        // $stmt->bindParam(':password', $password); //Password có thể cần thêm băm để bảo mật

        
        // echo "<pre>";
        // print_r($stmt->debugDumpParams());
        // echo "</pre>";

        return $stmt->execute();
    }

    public static function get($id)
    {
        $table = static::$table;

        $conn = Database::getConnection();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare("SELECT * FROM $table WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ret = $stmt->fetchAll();
        if ($ret)
            return $ret[0];
        return null;
    }

    public static function count($param = null)
    {
        $table = static::$table;

        $conn = Database::getConnection();

        $sql = "SELECT count(*) AS c FROM $table";

        $search_field = static::$search_field;
    
        $search_value = $param['search_value'];
        $searchString = null;
        if($search_value){
            $searchString = " WHERE $search_field LIKE :search_value ";            
            $sql = "SELECT count(*) AS c FROM $table $searchString ";
        }        
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare($sql);
        if($search_value){
            $search_value = "%$search_value%";
            $stmt->bindParam(':search_value', $search_value);
        }
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ret = $stmt->fetchAll();
        //        $stmt->debugDumpParams();

        return $ret[0]['c'];
    }

    public static function list($param)
    {

        $table = static::$table;
        $page = $param['page'];
        //Page = 0 -> offset = 0,
        //Page = 1 -> offset = 5,
        //Page = 2 -> offset = 10,...
        $limit = $param['limit'];
        $offset = ($page - 1) * $limit;

        $sort_by = $param['sort_by'];
        $sort_type = $param['sort_type'];
        $search_value = $param['search_value'];

        $searchString = null;
        if($search_value){
            $searchString = " WHERE ".static::$search_field." LIKE :search_value ";
        }
        
        $sql = "SELECT * FROM $table $searchString LIMIT :limit OFFSET :offset";

        //if(in_array($sort_by, ['username', 'email']))
        if(in_array($sort_by, static::$sort_field))
            if(in_array($sort_type, ['asc', 'desc']))
                $sql = "SELECT * FROM $table  $searchString ORDER BY $sort_by $sort_type LIMIT :limit OFFSET :offset";
        
        // echo "<pre>";
        // print_r($param);
        // echo "</pre>";
        // die($sql);

        $conn = Database::getConnection();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

        if($search_value){
            $search_value = "%$search_value%";
            $stmt->bindParam(':search_value', $search_value);
        }

        $stmt->execute();

        //$stmt->debugDumpParams();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ret = $stmt->fetchAll();
        return $ret;
    }


}