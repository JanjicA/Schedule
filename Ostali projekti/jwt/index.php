<?php
    // require_once('config/connection.php');

    require_once('views/fixed/head.php');
    require_once('views/fixed/header.php');

    if(!isset($_GET['page'])){

        require_once('views/pages/home.php');


    }else{
        switch($_GET['page']){
            case 'login':
                require_once('views/pages/login.php');
                break;
            case 'register':
                require_once('views/pages/register.php');
                break;
            case 'schedule':
                require_once('views/pages/schedule.php');
                break;
            case 'editSchedule':
                require_once('views/pages/editSchedule.php');
                break;
        }
    }

    require_once('views/fixed/footer.php');



    


?>
