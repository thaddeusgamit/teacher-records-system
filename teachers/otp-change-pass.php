<?php
session_start();
include "./connection.php";

$email = $_SESSION['email_otp'];

if (empty($_SESSION['email_otp'])) {
    echo "<script>window.location.href='login.php' </script>";
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

    <title>Change Password</title>
</head>

<body>

    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="../src/image/dontforget.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="post" action="">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>

                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Change Your Password</h5>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example17" class="form-control form-control-lg" name="password" maxlength="30" required />
                                            <label class="form-label" for="form2Example17">Enter your password</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example17" class="form-control form-control-lg" name="password2" maxlength="30" required />
                                            <label class="form-label" for="form2Example17">Confirm your password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <input type="submit" class="btn btn-secondary" name="reset" value="Reset">
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
</body>

</html>
<?php
if (isset($_POST['reset'])) {

    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $otp = "";
    if ($password == $password2) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE `tblteacher` SET `otp`= ?, `password` = ? WHERE Email = ? ");
        $stmt->bind_param('sss', $otp, $hashed_password, $email);
        $stmt->execute();
        echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Successfuly Reset',
                        })
                        </script>
                        ";

        session_destroy();
        unset($_SESSION['email_otp']);
        echo "<script>window.location.href='login.php'</script>";
        exit();
    } else {
        echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'The password does not match ',
                        })
                        </script>
                        ";
    }
}

?>