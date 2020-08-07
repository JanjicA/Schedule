<?php
    session_start();
    require_once(__DIR__.'/../config/connection.php');
    
    // require "../vendor/autoload.php";
    // use \Firebase\JWT\JWT;

    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }

    $errors = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $reName = "/^[A-Z]{1}[a-z]{2,20}$/";
    $reUsername = "/^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/";
    $rePassword = "/([\w\W\D\d]){7,40}/";
       
    if(!preg_match($reName, $name)){
        $errors[] = "Ime nije ok";
    }

    if(!preg_match($reUsername, $username)){
        $errors[] = "Korisnik nije ok";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email nije ok";
    }

    if(!preg_match($rePassword, $password)){
        $errors[] = "Lozinka nije ok";
    }

    // Provera da li vec postoji taj korisnik

    $stat = $conn->prepare("SELECT * FROM users WHERE username = ?");

    $stat -> execute([$username]);

    if($stat->rowCount() == 0){
        $result = $stat->fetch();

        if(count($errors) == 0){
        

            $password = md5($password);
            $date = date("Y-m-d H:i:s");
    
            $unosKorisnika = $conn->prepare("INSERT INTO users VALUES (NULL, ?, ?, ?, ?, ?, 2, 0)" );
            
            try{
                $unosKorisnika->execute([$name, $username, $email, $date, $password]);
    
                $_SESSION['uspeh'] = ["Uspesno ste se registrovali!"];
                header("Location: ../index.php?page=login");
            }
    
            //kad bacim na stranicuda se logovao ide ono page=...
    
            catch(PDOException $e){
                $_SESSION['greske'] = ["Vec postoji korisnik sa tim email!"];
    
                header("Location: ../index.php?page=register");
            }
        }
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('This username already exist!');
        window.location.href='../index.php?page=register';
        </script>");
    }

    