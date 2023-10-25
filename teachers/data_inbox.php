<?php
session_start();
include "./connection.php";
include "./session.php";
$email = $_SESSION['email'];
$id = $_SESSION['ID'];

$result = mysqli_query($conn, "SELECT `id`, `fName`, `emailId`, `mobileNumber`, `Query`, `queryDate` FROM `tblquery` WHERE teacherId = '$id' ");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Output data as JSON
header('Content-Type: application/json');
echo json_encode(array('data' => $data));
