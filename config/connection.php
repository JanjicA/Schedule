<?php

    $databasename='fww';
    $username='root';
    $passw='';
    $server='localhost';

    try {
        $conn = new PDO("mysql:host=".$server.";dbname=".$databasename.";charset=utf8", $username, $passw);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
    }
    
    function executeQuery($query){
        global $conn;
        return $conn->query($query)->fetchAll();
    }

  
    // // used to get mysql database connection
    // class DatabaseService{
    
    //     private $db_host = "localhost";
    //     private $db_name = "fww";
    //     private $db_user = "root";
    //     private $db_password = "";
    //     private $connection;
    
    //     public function getConnection(){
    
    //         $this->connection = null;
    
    //         try{
    //             $this->connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
    //         }catch(PDOException $exception){
    //             echo "Connection failed: " . $exception->getMessage();
    //         }
    
    //         return $this->connection;
    //     }
    // }
?>