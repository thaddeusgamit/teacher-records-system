<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');
include('./connection.php');
include('./session.php');


$email = $_SESSION['email'];

use FontLib\Table\Type\name;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require("PHPMailer.php");
require("SMTP.php");
require("Exception.php");









?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/css/bootstrap.css" rel="stylesheet">
    <link href="../src/css/bootstrap.min.css" rel="stylesheet">
    <link href="../src/sweetalert2/dist/sweetalert2.min.js">
    <link href="../src/css/demo.css" rel="stylesheet">
    <link href="../src/css/paper-dashboard.css" rel="stylesheet">
    <link href="../src/css/bootstrap-icons-1.10.3" rel="stylesheet">
    <link href="../src/css/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/tokenfield-typeahead.min.css" integrity="sha512-H/gN8SW/eoKFxSD8X2Q1LP28kflxKFoefaeWibduU5oaXSzblCH2LI5YcLAAg2Q0z+MKtvWP0QkUuQL5Mc8mjA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css" integrity="sha512-YWDtZYKUekuPMIzojX205b/D7yCj/ZM82P4hkqc9ZctHtQjvq3ei11EvAmqxQoyrIFBd9Uhfn/X6nJ1Nnp+F7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <title>Send Files</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="dashboard.php" class="simple-text logo-normal">
                    Welcome To TRMS
                    <!-- <div class="logo-image-big">
                        <img src="../assets/img/logo-big.png">
                    </div> -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                </svg>
                            </i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="inbox.php">
                            <i> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                                    <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                                </svg></i>
                            <p>Queries</p>
                        </a>
                    </li>



                    <li class="active">
                        <a href="sendfiles.php">
                            <i> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></i>
                            <p>Send files</p>
                        </a>
                    </li>

                    <li>
                        <a href="inbox_teacher.php">
                            <i> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                                    <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                                </svg></i>
                            <p>Inbox</p>
                        </a>
                    </li>
                    <li>

                        <a href="sent.php">
                            <i> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg></i>
                            <p>Sent</p>
                        </a>
                    </li>

                    <li>
                        <a href="profile.php">
                            <i> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                </svg></i>
                            <p>Profile</p>
                        </a>
                    </li>

                    <li>
                        <a href="change-pass.php">
                            <i> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg></i>
                            <p>Change Password</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;"></a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">


                            <li>
                                <div class="btn-group">
                                    <!-- <a type="button" class="btn btn-danger">
                                        <div class="container" id="notification"></div>
                                    </a> -->

                                    <button type="button" class="btn btn-danger dropdown-toggle d-flex position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually d-flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                            </svg>


                                        </span>
                                        <span id="notification" class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <?php
                                        $query = 'SELECT * FROM sent WHERE receiver = ? AND view = 0';
                                        $stmt = $conn->prepare($query);
                                        $stmt->bind_param('s', $email);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $data = $result->fetch_all(MYSQLI_ASSOC);
                                        foreach ($data as $row) {

                                        ?>

                                            <li><a class="dropdown-item" href="view_received.php?sid=<?php echo $row['sid']; ?>"> You have new Message From <?php echo $row['sender'] ?> </a></li>
                                        <?php
                                        }
                                        ?>


                                    </ul>
                                </div>
                            </li>
                            <a href="logout.php"> <button type="button" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                        <path d="M7.5 1v7h1V1h-1z" />
                                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                    </svg> </button></a>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card p-5 shadow" style="border: none;">
                                            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                                                <span class="d-flex align-items-center mb-3">
                                                    <label for="" style="margin-right: 12px;">From:</label>
                                                    <input type="text" class="form-control w-100 ms-2" name="from" value=" <?php echo $email ?>" readonly>
                                                </span>
                                                <span class="d-flex align-items-center mb-3">
                                                    <label for="" style="margin-right: 12px;">To:</label>
                                                    <input type="text" class="form-control w-100 ms-2" id="teacher" name="to" maxlength="30" required>
                                                </span>
                                                <span class=" d-flex mb-2">
                                                    <label for="">Subject:</label>
                                                    <input type="text" class="form-control w-100 ms-2" maxlength="50" name="subject" required>
                                                </span>
                                                <div>
                                                    <label for="">Body:</label>
                                                    <textarea class="form-control" id="textAreaExample2" name="body" rows="10"></textarea>
                                                </div>

                                                <input type="file" class="form-control mt-2" name="files[]" id="" multiple="multiple" accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,image/png,image/jpg" />


                                                <span class="d-flex justify-content-end align-items-center mt-3">
                                                    <input type="submit" class="btn btn-primary btn-md" name="send" value="Submit">
                                                    <!-- <input type="submit" class="btn btn-danger btn-md ms-2" name="draft" value="Save as Draft"> -->
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="../src/js/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js" integrity="sha512-lUZZrGg8oiRBygP81yUZ4XkAbmeJn7u7HW5nq7npQ+ZXTRvj3ErL6y1XXDq6fujbiJlu6gHsgNUZLKE6eSDm8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
        <script src="../src/js/bootstrap.bundle.min.js"></script>
        <script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>

        <!-- <script>
            $('#teacher').tokenfield({
                autocomplete: {
                    source: function(data, response) {
                        $.ajax({
                            url: 'teacher.php',
                            method: 'GET',
                            dataType: 'json',
                            data: {
                                name: data.term
                            },
                            success: function(res) {
                                // response(res)
                                var usr = $.map(res, function(name) {
                                    return {
                                        label: name,
                                        value: name
                                    }
                                })
                                var results = $.ui.autocomplete.filter(usr, data.term)
                                response(results)

                            }
                        })
                    },
                    delay: 100
                },
            })
        </script> -->

</body>

</html>

<?php




if (isset($_POST['send'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $view = 0;

    $date_created = date('Y-m-d H:i:s');




    if (empty($subject)) {
        $subject = "  ";
    }


    if (empty($body)) {
        $body = "      ";
    }






    $stmt = $conn->prepare("SELECT count(*) FROM tblteacher WHERE Email=?");
    $stmt->bind_param('s', $to);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {

        //validate sid 

        if (isset($_FILES['files']['name'])) {
            $filename = $_FILES['files']['name'];
            $file_tmp = $_FILES['files']['tmp_name'];

            //Content


            foreach ($file_tmp as $key => $tmp_name) {
                if (!empty($tmp_name)) {
                    $name = $filename[$key];
                }
            }






            $validate_report = "SELECT * FROM sent ORDER BY sid DESC LIMIT 1";
            $run_validate_report = mysqli_query($conn, $validate_report);


            if (mysqli_num_rows($run_validate_report) > 0) {

                foreach ($run_validate_report as $row) {
                    $sid = $row['sid'];
                    $get_number = str_replace("SID", "", $sid);
                    $id_increment = $get_number + 1;
                    $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

                    $sid = "SID" . $get_string;

                    for ($i = 0; $i < count($filename); $i++) {
                        $f_name = $_FILES['files']['name'][$i];
                        $insert_file = "INSERT INTO filessent (`sid`, `files`) VALUES ('$sid', '$f_name')";
                        $query_file = mysqli_query($conn, $insert_file);
                        $history_file = "INSERT INTO fileshistory (`sid`, `files`) VALUES ('$sid', '$f_name')";
                        $query_history_file = mysqli_query($conn, $history_file);
                        move_uploaded_file($file_tmp[$i], "files/" . $filename[$i]);
                    }




                    //query to send
                    $query_sent = $conn->prepare("INSERT INTO `sent`(`sid`, `sender`, `receiver`, `subject`, `body`, `view`, `date_time_created`) VALUES (?,?,?,?,?,?,?)");
                    $query_sent->bind_param("sssssis", $sid, $email, $to, $subject, $body, $view, $date_created);
                    if ($query_sent->execute()) {
                        $query_history = $conn->prepare("INSERT INTO `history`(`sid`, `sender`, `receiver`, `subject`, `body`, `date_time_created`) VALUES (?,?,?,?,?,?)");
                        $query_history->bind_param("ssssss", $sid, $email, $to, $subject, $body, $date_created);
                        if ($query_history->execute()) {
                            echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sent',
                            text: 'Succesfully send',
                        })
                        </script>
                        ";

                            $query_history->close();
                            $query_sent->close();
                            echo "<script>window.location.href='sendfiles.php' </script>";
                        }
                    }
                }
            } else {




                $sid = "SID00001";
                for ($i = 0; $i < count($filename); $i++) {
                    $f_name = $_FILES['files']['name'][$i];
                    $insert_file = "INSERT INTO filessent (`sid`, `files`) VALUES ('$sid', '$f_name')";
                    $query_file = mysqli_query($conn, $insert_file);

                    $history_file = "INSERT INTO fileshistory (`sid`, `files`) VALUES ('$sid', '$f_name')";
                    $query_history_file = mysqli_query($conn, $history_file);

                    move_uploaded_file($file_tmp[$i], "files/" . $filename[$i]);
                }

                $query_sent = $conn->prepare("INSERT INTO `sent`(`sid`, `sender`, `receiver`, `subject`, `body`, `view`, `date_time_created`) VALUES (?,?,?,?,?,?,?)");
                $query_sent->bind_param("sssssis", $sid, $email, $to, $subject, $body, $view, $date_created);
                if ($query_sent->execute()) {

                    $query_history = $conn->prepare("INSERT INTO `history`(`sid`, `sender`, `receiver`, `subject`, `body`, `date_time_created`) VALUES (?,?,?,?,?,?)");
                    $query_history->bind_param("ssssss", $sid, $email, $to, $subject, $body, $date_created);
                    if ($query_history->execute()) {
                        echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sent',
                            text: 'Succesfully send',
                        })
                        </script>
                        ";

                        $query_history->close();
                        $query_sent->close();
                        echo "<script>window.location.href='sendfiles.php' </script>";
                    }
                }
            }
        }


        //if sset files
        else {
            $validate_report = "SELECT * FROM sent ORDER BY sid DESC LIMIT 1";
            $run_validate_report = mysqli_query($conn, $validate_report);


            if (mysqli_num_rows($run_validate_report) > 0) {

                foreach ($run_validate_report as $row) {
                    $sid = $row['sid'];
                    $get_number = str_replace("SID", "", $sid);
                    $id_increment = $get_number + 1;
                    $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

                    $sid = "SID" . $get_string;

                    //query to send
                    $query_sent = $conn->prepare("INSERT INTO `sent`(`sid`, `sender`, `receiver`, `subject`, `body`, `view` ,`date_time_created`) VALUES (?,?,?,?,?,?,?)");
                    $query_sent->bind_param("sssssis", $sid, $email, $to, $subject, $body, $view, $date_created);
                    if ($query_sent->execute()) {
                        $query_history = $conn->prepare("INSERT INTO `history`(`sid`, `sender`, `receiver`, `subject`, `body`, `date_time_created`) VALUES (?,?,?,?,?,?)");
                        $query_history->bind_param("ssssss", $sid, $email, $to, $subject, $body, $date_created);
                        if ($query_history->execute()) {
                            echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sent',
                            text: 'Succesfully send',
                        })
                        </script>
                        ";

                            $query_history->close();
                            $query_sent->close();
                            echo "<script>window.location.href='sendfiles.php' </script>";
                        }
                    }
                }
            } else {
                $sid = "SID00001";
                $query_sent = $conn->prepare("INSERT INTO `sent`(`sid`, `sender`, `receiver`, `subject`, `body`, `view` ,`date_time_created`) VALUES (?,?,?,?,?,?,?)");
                $query_sent->bind_param("sssssis", $sid, $email, $to, $subject, $body, $view, $date_created);
                if ($query_sent->execute()) {
                    $query_history = $conn->prepare("INSERT INTO `history`(`sid`, `sender`, `receiver`, `subject`, `body`, `date_time_created`) VALUES (?,?,?,?,?,?)");
                    $query_history->bind_param("ssssss", $sid, $email, $to, $subject, $body, $date_created);
                    if ($query_history->execute()) {
                        echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sent',
                            text: 'Succesfully send',
                        })
                        </script>
                        ";

                        $query_history->close();
                        $query_sent->close();
                        echo "<script>window.location.href='sendfiles.php' </script>";
                    }
                }
            }
        }
    } else {
        echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'oops...',
                            text: 'The email is not register in the system',
                        })
                        </script>
                        ";
    }
}


?>



<!-- $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'miragurogamit@gmail.com'; //don't forget the email //SMTP username // email username
        $mail->Password = 'cuejidllzdenulif'; // passowrd //SMTP // email password password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->SetFrom($from, $name);
        $mail->addAddress($to);
        //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = ($subject);
        $mail->Body = ($body);

   
        foreach ($file_tmp as $key => $tmp_name) {
            if (!empty($tmp_name)) {
                $name = $filename[$key];
                $mail->addAttachment($tmp_name, $name);
            }
        }


        if ($mail->send()) {
        } -->







<!--  -->