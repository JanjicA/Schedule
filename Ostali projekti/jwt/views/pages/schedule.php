<?php
    if(!isset($_SESSION["user"])){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Only registered users can schedule event, please register yourself!');
                window.location.href='index.php?page=register';
            </script>");
    }
?>
<div class="container">
   <div id="calendar"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center goforward">
            <div class="crud">
                <a href="index.php?page=editSchedule" class="btn text-center">Edit Schedule</a>
            </div>
        </div>
    </div>
</div>
    