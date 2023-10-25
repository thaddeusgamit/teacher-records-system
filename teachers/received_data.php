<?php
session_start();
include "./connection.php";
include "./session.php";
$email = $_SESSION['email'];


$result = mysqli_query($conn, "SELECT `sid`,`sender`, `subject`, `body`, `date_time_created`  FROM `sent`  WHERE receiver = '$email' ORDER BY view ASC ");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Output data as JSON
header('Content-Type: application/json');
echo json_encode(array('data' => $data));
