<?php

    require_once "../vendor/autoload.php";
    use \Firebase\JWT\JWT;

    header("Access-Control-Allow-Origin: * ");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600"); 

    require_once "../config/connection.php";
    require_once "../classes/Users.php";

    $db = new Database();

    $connection = $db->connect();

    $users_obj = new Users($connection);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $data = json_decode(file_get_contents("php://input"));

        if($data){
            $users_obj->name = $data->name;
            $users_obj->email = $data->email;
            $users_obj->password = $data->password;

            if($users_obj->create_user()) {
                http_response_code(200);
                echo json_encode(array(
                    "status" => 1,
                    "message" => "radi!"
            ));
            }

        }
        else {
            http_response_code(500);
            echo json_encode(array(
                "status" => 0,
                "message" => "greskaaa!"
            ));
        }
    }
    else {
        http_response_code(503);
        echo json_encode(array(
            "status" => 0,
            "message" => "Access Denied!"
        ));
    }