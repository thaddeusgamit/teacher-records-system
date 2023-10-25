<?php
// Connect to database and fetch data
include './teachers/connection.php';


$result = mysqli_query($conn, "  SELECT `Name`, `Picture`, `Email`, `Qualifications`, `Address`,`teachingExp` FROM `tblteacher` WHERE isPublic = '1' ");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Output data as JSON
header('Content-Type: application/json');
echo json_encode(array('data' => $data));
