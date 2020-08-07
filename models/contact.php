<?php
   session_start();
   require_once(__DIR__.'/../config/connection.php');

   if(isset($_POST['status'])) {
    $contact = $conn->query("SELECT * FROM calendar");
    foreach($contact as $c){
        $ex = $c->start_event;
        echo date($c->start_event) ."<br>";
    }
   }
  