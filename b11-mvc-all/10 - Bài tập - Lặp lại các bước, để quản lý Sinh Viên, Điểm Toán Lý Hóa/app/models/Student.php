<?php
class Student
{

    public static function delete($id)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function add($params)
    {

        // echo "<pre>";
        // print_r($params);
        // echo "</pre>";

        $conn = Database::getConnection();
        $first_name = $params['first_name'];
        $last_name = $params['last_name'];
        $math = $params['math'];
        $physical = $params['physical'];
        $chemistry = $params['chemistry'];

        /////////////////////////////////////
        //Cách cơ bản này có thể insert được, nhưng dễ bị tấn công SQL Injection:
        // $sql = "INSERT INTO students (username, email, password, first_name, last_name)
        // VALUES ('$username', '$email' , '$password', '$first_name', '$last_name')";
        //return $conn->exec($sql);

        // $sql = "INSERT INTO students (username, email, password)
        //  VALUES ('$username', '$email', '$password')";    // use exec() because no results are returned
        //$conn->exec($sql);
        //echo "New record created succesfully";

        //Ta nên dùng cách nâng cao sau để insert, là php_mysql_prepared_statements
        //Tham khảo: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, math, physical, chemistry) 
        VALUES (:first_name, :last_name, :math, :physical, :chemistry)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':math', $math);
        $stmt->bindParam(':physical', $physical);
        $stmt->bindParam(':chemistry', $chemistry);
        
        return $stmt->execute();
    }


    public static function save($id, $params)
    {

        $conn = Database::getConnection();
        $first_name = $params['first_name'];
        $last_name = $params['last_name'];
        $math = $params['math'];
        $physical = $params['physical'];
        $chemistry = $params['chemistry'];
        // $sql = "INSERT INTO students (username, email, password)
        //  VALUES ('$username', '$email', '$password')";    // use exec() because no results are returned
        //$conn->exec($sql);
        //echo "New record created succesfully";

        //Ta nên dùng cách nâng cao sau để insert, là php_mysql_prepared_statements
        //Tham khảo: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $stmt = $conn->prepare("UPDATE students SET first_name = :first_name, last_name=:last_name, math=:math,physical=:physical,chemistry=:chemistry  WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':math', $math);
        $stmt->bindParam(':physical', $physical);
        $stmt->bindParam(':chemistry', $chemistry);
        
        return $stmt->execute();
    }

    public static function get($id)
    {
        $conn = Database::getConnection();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare("SELECT * FROM students WHERE id=:id");
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
        $conn = Database::getConnection();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare("SELECT count(*) AS c FROM students");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ret = $stmt->fetchAll();
        return $ret[0]['c'];
    }

    public static function list($param)
    {

        // echo "<pre>";
        // print_r($param);
        // echo "</pre>";
        $page = $param['page'];
        //Page = 0 -> offset = 0,
        //Page = 1 -> offset = 5,
        //Page = 2 -> offset = 10,...
        $limit = $param['limit'];
        $offset = ($page - 1) * $limit;

        $sort_by = $param['sort_by'];
        $sort_type = $param['sort_type'];

        $search_first_name = $param['search_first_name'] ?? '';

        $searchString = null;
        if($search_first_name){
            $searchString = " WHERE first_name LIKE :first_name ";
        }
        

        $sql = "SELECT * FROM students $searchString LIMIT :limit OFFSET :offset";

        if(in_array($sort_by, ['first_name', 'last_name']))
            if(in_array($sort_type, ['asc', 'desc']))
                $sql = "SELECT * FROM $searchString students ORDER BY $sort_by $sort_type LIMIT :limit OFFSET :offset";
        
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

        if($search_first_name){
            $search_first_name = "%$search_first_name%";
            $stmt->bindParam(':first_name', $search_first_name);
        }

        $stmt->execute();

        // $stmt->debugDumpParams();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ret = $stmt->fetchAll();
        return $ret;
    }
}
