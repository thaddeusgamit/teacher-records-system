<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('connection.php');

if (isset($_GET['sid'])) {

    $sid = $_GET['sid'];

    if (empty($_GET['sid'])) {    //lrn verification starts here

        echo "

              <script type = 'text/javascript'>

              window.location = 'inbox_teacher.php';

              </script>";

        exit();
    }


    $verify_name = "SELECT sid FROM `sent` WHERE sid = '$sid'";

    $query_name = mysqli_query($conn, $verify_name) or die(mysqli_error($conn));

    if (mysqli_num_rows($query_name) == 0) {

        echo "

              <script type = 'text/javascript'>

              window.location = 'inbox_teacher.php';

              </script>";

        exit();
    } else {



        $delete_inbox = "DELETE FROM `sent` WHERE sid = '$sid'";

        $query_delete = mysqli_query($conn, $delete_inbox);



        if ($query_delete) {



            echo "

              <script type = 'text/javascript'>

              alert('SuccesFully Delete');

              window.location = 'inbox_teacher.php';

              </script>";

            exit();
        }
    }
}
