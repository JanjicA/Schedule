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

        $all_headers = getallheaders();

        $data->jwt = $all_headers['Authorization'];

        if(!empty($data->jwt)) {
            
            try{
                $secret_key = "jwt123";

                $decodec_data = JWT::decode($data->jwt, $secret_key, array('HS512'));
                  

                http_response_code(200);
                
                $user_id = $decodec_data->data->id;

                echo json_encode(array(
                    "status" => 1,
                    "message" => "We got JWT Token!",
                    "user_data" => $decodec_data,
                    "user_id" => $user_id
                ));
            }

            catch(Exception $ex){
                http_response_code(500);
                echo json_encode(array(
                    "status" => 0,
                    "message" => $ex->getMessage()
                ));
            }
    
        }
    }