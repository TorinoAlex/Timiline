<?php
header('Content-Type: application/json');

// Подключение к базе данных
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "shahray_rsvp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из POST-запроса
$guestId = $_POST['guestId'];
$attending = $_POST['attending'];

// Сохранение в базу данных
$sql = "INSERT INTO rsvp_responses (guest_id, attending, response_date) 
        VALUES ('$guestId', '$attending', NOW()) 
        ON DUPLICATE KEY UPDATE attending='$attending', response_date=NOW()";

if ($conn->query($sql) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$conn->close();
?>