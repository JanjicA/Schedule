<?php

//load.php

require_once "../config/connection.php";

header("Content-Type: application.json");

$data = array();

$statement = $conn->query("SELECT * FROM calendar");

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row->id,
  'title'   => $row->title,
  'start'   => $row->start_event
 );
}

echo json_encode($data);

?>