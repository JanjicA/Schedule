<?php
    session_start();
    require_once(__DIR__.'/../config/connection.php');

    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }

    $errors = [];

    $username = $_POST['username'];
    $password = $_POST['password'];

    $reUsername = "/^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/";
    $rePassword = "/([\w\W\D\d]){3,40}/";

    if(!preg_match($reUsername, $username)){
        $errors[] = "Korisnik nije ok";
    }

    if(!preg_match($rePassword, $password)){
        $errors[] = "Lozinka nije ok";
    }

    if(count($errors) == 0){
        $password = md5($password);

        $login = $conn->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $login->execute([$username, $password]);

        if($login->rowCount() == 1){
            $userlogin = $login->fetch();

            $_SESSION["user"] = $userlogin;

            header("Location: ../index.php?page=schedule");
        }

        else{
            http_response_code(404);
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Your username or password is not correct!');
            window.location.href='../index.php?page=login';
            </script>");
        }

    }
    else{
        http_response_code(403);
        header("Location: ../index.php");
    }

   