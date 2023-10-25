<?php
session_start();
include "./connection.php";
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

    <title>Login</title>

    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }
    </style>
</head>

<body>


    <section class="vh-85" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="../src/image/login1.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="post" action="">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>

                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" maxlength="30" />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" maxlength="30" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <input type="submit" class="btn btn-secondary" name="login" value="Login">
                                        </div>
                                        <a class="small text-muted" href="../index.php">Not Teacher?</a>
                                        <a class="small text-muted" href="forgot-password.php">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>
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
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT `Email`, `password`,`ID` FROM `tblteacher` WHERE Email = ? ");


    if ($stmt) {



        $stmt->bind_param('s', $email);

        $stmt->execute();

        // Get query results
        $stmt->bind_result($email, $hashedpassword, $id);
        $stmt->store_result();

        // Fetch the query results in a row
        $stmt->fetch();

        // Verify user's password $password being input and $hash being the stored hash
        if (password_verify($password, $hashedpassword)) {
            //success
            echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Successfuly Login',
                        })
                        </script>
                        ";
            $_SESSION['email'] = $email;
            $_SESSION['ID'] = $id;

            echo "<script>window.location.href='dashboard.php' </script>";
        } else {

            echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please Check your Credentials ',
                        })
                        </script>
                        ";
        }
    }
}
?>