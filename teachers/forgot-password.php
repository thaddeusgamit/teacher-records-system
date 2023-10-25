<?php
date_default_timezone_set('Asia/Manila');
session_start();
include "./connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("PHPMailer.php");
require("SMTP.php");
require("Exception.php");



function sendMail($email, $otp)
{

    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'miragurogamit@gmail.com';    //don't forget the email                 //SMTP username // email username
        $mail->Password   = 'cuejidllzdenulif';     // passowrd                          //SMTP // email password password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->SetFrom('miragurogamit@gmail.com');
        $mail->addAddress($email);
        //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "OTP";
        $mail->Body    = "This is your otp " . $otp . " Please don't reply";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../src/css/bootstrap.css" rel="stylesheet">
    <link href="../src/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../src/sweetalert2/dist/sweetalert2.min.js">

    <title>Forgot Password</title>
</head>

<body>

    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="../src/image/forgot.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="post" action="">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>

                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forgot-Password</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" maxlength="30" required />
                                            <label class="form-label" for="form2Example17">Email</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <input type="submit" class="btn btn-secondary" name="reset" value="Reset">
                                        </div>

                                    </form>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Already Registered? <a href="login.php" style="color: #393f81;">Login here</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../src/js/bootstrap.bundle.min.js"></script>
    <script src="../src/js/jquery-3.6.1.min.js"></script>
    <script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>
</body>

</html>

<?php

if (isset($_POST['reset'])) {

    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT count(*) FROM tblteacher WHERE Email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {


        $otp = mt_rand(100000, 999999);
        $hashed_otp = password_hash($otp, PASSWORD_DEFAULT);

        $query_otp  = $conn->prepare("UPDATE `tblteacher` SET `otp`= ? WHERE Email = ? ");
        if ($query_otp) {

            sendMail($email, $otp);

            $query_otp->bind_param('ss', $hashed_otp, $email);
            $query_otp->execute();
        }
        $timestamp =  $_SERVER["REQUEST_TIME"];  // generate the timestamp when otp is forwarded to user email/mobile.
        $_SESSION['time'] = $timestamp;
        $_SESSION['email_otp'] = $email;

        echo "<script>window.location.href='otp.php' </script>";
    } else {

        echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'The Email is not valid',
                        })
                        </script>
                        ";
    }
}



?>