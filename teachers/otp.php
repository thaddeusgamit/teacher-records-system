<?php
session_start();
include "./connection.php";

$email = $_SESSION['email_otp'];

if (empty($_SESSION['email_otp'])) {
    echo "<script>window.location.href='login.php' </script>";
}



$timestamp =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
if (($timestamp - $_SESSION['time']) > 120)  // 5 minutes refers to 300 seconds
{
    $otp = "";
    $stmt = $conn->prepare("UPDATE `tblteacher` SET `otp`= ? WHERE Email = ? ");
    $stmt->bind_param('ss', $otp, $email);
    $stmt->execute();

    session_destroy();
    unset($_SESSION['email_otp']);
    unset($_SESSION['time']);
    echo "<script>window.location.href='forgot-password.php'</script>";
    exit();


    // delete the otp in the database and alert the person that the otp is expired
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

    <title>OTP</title>
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

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">One-Time-Password</h5>

                                        <div class="form-outline mb-4">
                                            <p>Countdown: <span id="timer">1:00</span></p>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="number" id="form2Example17" class="form-control form-control-lg" name="otp" min="0" max="999999" oninput="validity.valid||(value='');" size="6" required />
                                            <label class="form-label" for="form2Example17">Enter Your otp</label>

                                        </div>
                                        <div class="pt-1 mb-4">
                                            <input type="submit" class="btn btn-secondary" name="submit" value="Reset">
                                        </div>

                                    </form>


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
    <script>


    
        if (localStorage.getItem('countdown')) {
            // Get the timer value from local storage
            var countdown = localStorage.getItem('countdown');
        } else {
            // Set the timer value to 5 minutes (300 seconds)
            var countdown = 120;
        }



        // Display the initial timer value
        document.getElementById('timer').innerHTML = formatTime(countdown);

        // Start the countdown timer
        var timer = setInterval(function() {
            countdown--;
            document.getElementById('timer').innerHTML = formatTime(countdown);

            // Store the timer value in local storage
            localStorage.setItem('countdown', countdown);

            // When the countdown reaches 0, refresh the page
            if (countdown <= 0) {
                localStorage.clear();
                clearInterval(timer);
                location.reload();
                 Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'The OTP is expired.',
                        });
                window.location.href = forgot-password.php
            }
        }, 1000);

        // Helper function to format the time as mm:ss
        function formatTime(seconds) {
            var minutes = Math.floor(seconds / 60);
            var seconds = seconds % 60;
            return (minutes < 10 ? "0" : "") + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
        }
    </script>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $otp = $_POST['otp'];

    $stmt = $conn->prepare("SELECT `otp` FROM `tblteacher` WHERE Email = ? ");

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $hashed_otp = $row['otp'];
    }
    if (password_verify($otp, $hashed_otp)) {

        echo "<script>window.location.href='otp-change-pass.php' </script>";
    } else {
        echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Otp is not valid, Please request another otp',
                        })
                        </script>
                        ";
    }
}


?>