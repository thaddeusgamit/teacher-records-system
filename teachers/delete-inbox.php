<?php

session_start();
date_default_timezone_set('Asia/Manila');
include('connection.php');


if (isset($_GET['mid'])) {
    $mid = $_GET['mid'];


    if (empty($_GET['mid'])) {    //lrn verification starts here
        echo "
              <script type = 'text/javascript'>
              window.location = 'inbox.php';
              </script>";
        exit();
    }


    $verify_name = "SELECT fName FROM `tblquery` WHERE id = '$mid'";
    $query_name = mysqli_query($conn, $verify_name) or die(mysqli_error($conn));
    if (mysqli_num_rows($query_name) == 0) {
        echo "
              <script type = 'text/javascript'>
              window.location = 'inbox.php';
              </script>";
        exit();
    } else {

        $delete_inbox = "DELETE FROM `tblquery` WHERE id = '$mid'";
        $query_delete = mysqli_query($conn, $delete_inbox);

        if ($query_delete) {

            echo "
              <script type = 'text/javascript'>
              window.location = 'inbox.php';
              </script>";
            exit();
        }
    }
}
