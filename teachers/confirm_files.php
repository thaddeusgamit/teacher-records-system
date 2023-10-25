<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../src/sweetalert2/dist/sweetalert2.min.js">
  <title>Delete</title>
</head>

<body>
  <script src="../src/js/bootstrap.bundle.min.js"></script>
  <script src="../src/js/jquery-3.6.1.min.js"></script>
  <script src="../src/js/datatables.min.js"></script>
  <script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>
</body>

</html>


<?php

session_start();
date_default_timezone_set('Asia/Manila');
include('connection.php');




if (isset($_GET['filename'])) {
  $filename = $_GET['filename'];



  if (empty($_GET['filename'])) {    //lrn verification starts here
    echo "
              <script type = 'text/javascript'>
              window.location = 'dashboard.php';
              </script>";
    exit();
  }

  $verify_name = "SELECT files FROM `files` WHERE files = '$filename'";
  $query_name = mysqli_query($conn, $verify_name) or die(mysqli_error($conn));
  if (mysqli_num_rows($query_name) == 0) {
    echo "
              <script type = 'text/javascript'>
              window.location = 'dashboard.php';
              </script>";
    exit();
  } else {

    echo "
    <script>
    Swal.fire({
  title: 'Are you sure?',
  text: 'You want to delete this file ?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  allowOutsideClick: false,
allowEscapeKey: false,
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.cancel) {
 window.location = 'dashboard.php';
    
  }
  if (result.isConfirmed) {
    window.location = 'delete-files.php?filename=$filename ';
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
  
  
})
    </script>
    
    
    
    ";




    // $delete_file = "DELETE FROM `files` WHERE files  = '$filename'";
    // $query_delete = mysqli_query($conn, $delete_file) or die(mysqli_error($conn));
    // if ($query_delete) {
    //     if (unlink("files/" . $filename)) {

    //         echo "
    //       <script type = 'text/javascript'>
    //       window.location = 'dashboard.php';
    //       </script>";
    //         exit();
    //     }
    // }
  }
}
