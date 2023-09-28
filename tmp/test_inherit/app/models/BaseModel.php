<?php
class BaseModel
{

    static public $table;
    static public $fillAble = [];

    static public $sortAbleField = [];
    static public $searchAbleField = '';


    public static function delete($id)
    {
        $tbl = static::$table;
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM $tbl WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function add($params)
    {

    
        $tbl = static::$table;

        $conn = Database::getConnection();
        
        $strField = $strBind = "";
        $arrBind = [];

        // echo "<pre>";
        // print_r(static::$fillAble);
        // echo "</pre>";

        foreach(static::$fillAble AS $field){
            if($val = ($params[$field] ?? '')){
                $strField .= "$field,";
                $strBind .= ":$field,";     
                $arrBind[$field] = $val;           
            }
        }

        $strField = trim($strField, ',');
        $strBind = trim($strBind, ',');

        // echo "<pre>";
        // print_r($arrBind);
        // echo "</pre>";

        if(!$strField || !$strBind)
            return null;

        // die("Str In: $strField");

        /////////////////////////////////////
        //Cách cơ bản này có thể insert được, nhưng dễ bị tấn công SQL Injection:
        // $sql = "INSERT INTO news (name, description, content, first_name, last_name)
        // VALUES ('$username', '$email' , '$password', '$first_name', '$last_name')";
        //return $conn->exec($sql);

        // $sql = "INSERT INTO news (username, email, password)
        //  VALUES ('$username', '$email', '$password')";    // use exec() because no results are returned
        //$conn->exec($sql);
        //echo "New record created succesfully";

        //Ta nên dùng cách nâng cao sau để insert, là php_mysql_prepared_statements
        //Tham khảo: https://www.w3schools.com/php/php_mysql_prepared_statements.asp

        $stmt = $conn->prepare("INSERT INTO $tbl ($strField) VALUES ($strBind)");
        foreach($arrBind AS $bind => $val){
            $stmt->bindParam(":$bind", $val);
        }



        return $stmt->execute();
    }


    public static function save($id, $params)
    {
        if(!is_numeric($id))
            throw new Exception("Not valid id number!");

        $tbl = static::$table;

        $conn = Database::getConnection();

        $arrBind = [];

        // echo "<pre>";
        // print_r($params);
        // echo "</pre>";
        // echo "<pre>";
        // print_r(static::$fillAble);
        // echo "</pre>";

        $strUpdate = '';
        foreach(static::$fillAble AS $field){
            if(isset($params[$field])){
                $val = $params[$field];
                $strUpdate .= " $field=:$field,";
                $arrBind[$field] = $val;           
            }
        }

        $strUpdate = trim($strUpdate, ',');

        // echo "<pre>";
        // print_r($arrBind);
        // echo "</pre>";
        // echo("\n<br/> StrUpdate = $strUpdate <>");

        if(!$strUpdate)
            return null;

        $stmt = $conn->prepare("UPDATE  $tbl SET $strUpdate WHERE id=$id");
        
        foreach($arrBind AS $bind => $val){
            $stmt->bindParam(":$bind", $val);
        }

        // echo "<pre>";
        // print_r($stmt->debugDumpParams());
        // echo "</pre>";


        return $stmt->execute();
    }

    public static function get($id)
    {

        $tbl = static::$table;
        $conn = Database::getConnection();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare("SELECT * FROM  $tbl WHERE id=:id");
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
        $tbl = static::$table;

        $conn = Database::getConnection();

        $sql = "SELECT count(*) AS c FROM $tbl";
    
        $search_val = $param['search_val'] ?? '';
        $searchString = null;
        if($search_val && static::$searchAbleField){
            $searchString = " WHERE ".static::$searchAbleField." LIKE :search_val ";            
            $sql = "SELECT count(*) AS c FROM $tbl $searchString ";
        }
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare($sql);
        if($search_val && static::$searchAbleField){
            $search_val = "%$search_val%";
            $stmt->bindParam(':search_val', $search_val);
        }

        // echo("\n<br/> SQL = $sql ");

        // $stmt->debugDumpParams();


        // return;

        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ret = $stmt->fetch();

        return $ret['c'];
    }

    // public static function count($param = null)
    // {

    //     $tbl = static::$table;
    //     $conn = Database::getConnection();
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     //echo "Connected successfully";
    //     $stmt = $conn->prepare("SELECT count(*) AS c FROM $tbl");
    //     $stmt->execute();
    //     // set the resulting array to associative
    //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $ret = $stmt->fetchAll();
    //     return $ret[0]['c'];
    // }

    public static function list($param)
    {
        $tbl = static::$table;
     
        $page = $param['page'];
        //Page = 0 -> offset = 0,
        //Page = 1 -> offset = 5,
        //Page = 2 -> offset = 10,...
        $limit = $param['limit'];
        $offset = ($page - 1) * $limit;

        $sort_by = $param['sort_by'] ?? '';
        $sort_type = $param['sort_type'] ?? '';
        $search_val = $param['search_val'] ?? '';

        $searchString = null;
        if ($search_val && static::$searchAbleField) {
            $searchString = " WHERE ".static::$searchAbleField." LIKE :search_val ";
        }

        $sql = "SELECT * FROM $tbl $searchString LIMIT :limit OFFSET :offset";

        if(!$sort_by || !$sort_type){
            $sort_by = 'id';
            $sort_type = "desc";
        }

        // echo "<pre>";
        // print_r(static::$sortAbleField);
        // echo "</pre>";

        
        if (in_array($sort_by, static::$sortAbleField))
            if (in_array($sort_type, ['asc', 'desc']))
                $sql = "SELECT * FROM  $tbl $searchString ORDER BY $sort_by $sort_type LIMIT :limit OFFSET :offset";

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

        if ($search_val) {
            $search_val = "%$search_val%";
            $stmt->bindParam(':search_val', $search_val);
        }

        $stmt->execute();
        // $stmt->debugDumpParams();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ret = $stmt->fetchAll();
        return $ret;
    }
}
