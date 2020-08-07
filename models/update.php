
<?php

require_once "../config/connection.php";

    if(isset($_POST["change"]))
    {
        $id = $_POST["hdnChange"];
        $title = $_POST["title"];
        $start_event = $_POST["start_event"];

        $greske = [];

        if(empty($title)){
            $greske[] = "Enter title!";
        }

        if(empty($start_event)){
            $greske[] = "Enter date!";
        }

        if(count($greske) == 0){
            $proba = $conn->prepare("SELECT * FROM calendar WHERE start_event = ?");
            $proba->execute([$start_event]);
    
            if($proba->rowCount() == 0){
    
                $update = $conn->prepare("UPDATE calendar SET title = ?, start_event = ?  WHERE id = ?");
                $update->execute([$title, $start_event, $id]);
        
                header("Location: ../index.php?page=editSchedule");
            }
            else{
                
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('This date already exist!');
                window.location.href='../index.php?page=editSchedule';
                </script>");
            }
    
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Fill in empty space!');
            window.location.href='../index.php?page=editSchedule';
            </script>");
        }

        
    }

?>