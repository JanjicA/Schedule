<?php
    require_once "../config/connection.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $delete = $conn->prepare("DELETE from calendar WHERE id = ?");

        try{
            $delete->execute([$id]);
            header("Location: ../index.php?page=editSchedule");
        }
        catch(PDOException $g){
            http_response_code(404);
            header("Location: ../index.php");
        }
    }




 



?>