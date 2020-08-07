<?php
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    require_once "../config/connection.php";

    $id = $_GET['id'];

    try {
        $query = $conn->prepare("SELECT * FROM calendar WHERE id = ?");
        $query->execute([$id]);
        $proizvodi = $query->fetch();

        echo json_encode($proizvodi);
    } catch (PDOException $e) {
        $e->getMessage();
        http_response_code(500);
    }
} else {
    http_response_code(400);
}