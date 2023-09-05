<?php
class User {
    private $username;
    private $email;

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public static function add($param){
        $database = Database::getInstance();
        // Lấy kết nối cơ sở dữ liệu
        $conn = $database->getConnection();
        // Sử dụng $dbConnection để thực hiện các truy vấn cơ sở dữ liệu
        $username = $param['username'];
        $email = $param['email'];
        $password = $param['password'];
        $last_name = $param['last_name'];
        $first_name = $param['first_name'];
        /////////////////////////////////////
        //Cách cơ bản này có thể insert được, nhưng dễ bị tấn công SQL Injection:
        $sql = "INSERT INTO users (username, email, password, first_name, last_name)
        VALUES ('$username', '$email' , '$password', '$first_name', '$last_name')";
        //return $conn->exec($sql);

        //Ta nên dùng cách nâng cao sau để insert, là php_mysql_prepared_statements
        //Tham khảo: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, first_name, last_name) 
        VALUES (:username, :email, :password, :first_name, :last_name)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':password', $password);       

        return $stmt->execute();
        
    }

    public static function list(){
        // Lấy đối tượng Database (singleton)
        $database = Database::getInstance();
        // Lấy kết nối cơ sở dữ liệu
        $conn = $database->getConnection();
        // Sử dụng $dbConnection để thực hiện các truy vấn cơ sở dữ liệu
        $sql = "SELECT * FROM Users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        return $stmt->fetchAll();

        // $cc = 0;
        // foreach($stmt->fetchAll() as $k=>$v) {
        //     $cc++;
        //     echo "<pre>";
        //     print_r($v);
        //     echo "</pre>";
        //     $id = $v['id'];
        //     $first_name = $v['first_name'];
        //     $last_name = $v['last_name'];
        //     $email = $v['email'];
        //     echo("\n<br/> $cc.  $id | $first_name | $last_name | $email");
        // }



    }
}