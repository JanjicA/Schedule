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

        if(!empty($data->email) && !empty($data->password)){

            $users_obj->email = $data->email;
            // $users_obj->password = $data->password;

            $user_data = $users_obj->check_login();

            if(!empty($user_data)) {

                $name = $user_data['name'];
                $email = $user_data['email'];
                $password = $user_data['password'];
            }
            else{
                http_response_code(200);
                echo json_encode(array(
                    "status" => 1,
                    "jwt" => $jwt,
                    "message" => "aiii!"
                ));
            }

            // JWT
            $user_arr = array(
                "id"=>$user_data['id'],
                "name"=>$user_data['name'],
                "email"=>$user_data['email']
            );

            $secret_key = "jwt123";

            $payload = array(
                "iss" =>"localhost",
                "iat" =>time(),
                "nbf" => time() + 10,
                "exp" => time() + 60,
                "aud" => "myusers",
                "data" => $user_arr
            );

            $jwt = JWT::encode($payload, $secret_key, 'HS512');

            http_response_code(200);
            echo json_encode(array(
                "status" => 1,
                "jwt" => $jwt,
                "message" => "Logovan je!"
            ));


        }
        else{
            http_response_code(404);
            echo json_encode(array(
                "status" => 0,
                "message" => "ovde!"
            ));
        }
    }