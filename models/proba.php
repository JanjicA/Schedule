<?php

    require_once "../vendor/autoload.php";
    use \Firebase\JWT\JWT;

    header("Access-Control-Allow-Origin: * ");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600"); 

    require_once "../config/connection.php";
    // require_once "../classes/Users.php";

    $name = '';
    $username = '';
    $email = '';
    $password = '';
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $data = json_decode(file_get_contents("php://input"));

        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = md5($password);

        $unosKorisnika = $conn->prepare("INSERT INTO users SET name = ?, username = ?, email = ?, password = ?");

        if($unosKorisnika->execute([$name, $username, $email, $password])) {
                
            http_response_code(200);
            echo json_encode(array("message" => "User was successfully registered."));
            header("Location: ../index.php?page=login");
        }    
        else{
            http_response_code(400);
        
            echo json_encode(array("message" => "Unable to register the user."));
        }
    }
        
        
    else {
        http_response_code(503);
        echo json_encode(array(
            "status" => 0,
            "message" => "Access Denied!"
        ));
    }

?>