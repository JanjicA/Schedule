<?php

//insert.php
require_once "../config/connection.php";

    $title = $_POST['title'];
    $start = $_POST['start'] ;


    $insert = $conn->prepare("INSERT INTO calendar VALUES (NULL, ?, ?)");

    try{
        $insert->execute([$title, $start]);
        header("Location: ../index.php?page=schedule");
    }
    catch(PDOException $g){
        http_response_code(404);
        header("Location: ../index.php");
    }


?>