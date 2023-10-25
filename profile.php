<?php

session_start();
date_default_timezone_set('Asia/Manila');
include('./teachers/connection.php');


if (isset($_GET['profile'])) {
    $name = $_GET['profile'];


    if (empty($_GET['profile'])) {    //lrn verification starts here
        echo "
              <script type = 'text/javascript'>
              window.location = 'index.php';
              </script>";
        exit();
    }

    $verify_name = "SELECT Name FROM `tblteacher` WHERE Name = '$name'";
    $query_name = mysqli_query($conn, $verify_name) or die(mysqli_error($conn));
    if (mysqli_num_rows($query_name) == 0) {
        echo "
              <script type = 'text/javascript'>
              window.location = 'index.php';
              </script>";
        exit();
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/css/paper-dashboard.css" rel="stylesheet">
    <link href="./src/css/bootstrap.css" rel="stylesheet">
    <link href="./src/css/bootstrap.min.css" rel="stylesheet">
    <link href="./src/sweetalert2/dist/sweetalert2.min.js">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="./src/css/bootstrap-icons-1.10.3" rel="stylesheet">
    <link href="./src/css/datatables.min.css" rel="stylesheet">

    <link href="./src/css/font.css" rel="stylesheet">

    <title>Profile</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Teachers Records Management</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="wrapper">



        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                        </div>
                        <div class="card-body">
                            <div class="author">
                                <?php
                                $query = 'SELECT * FROM `tblteacher` WHERE Name = ?';
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('s', $name);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $data = $result->fetch_all(MYSQLI_ASSOC);
                                foreach ($data as $row) {
                                    $teacher_id = $row['ID'];

                                ?>


                                    <a href="#">
                                        <img class="avatar border-gray" src="./teachers/profile/<?php echo $row['Picture'] ?>" alt="No profile">
                                        <h5 class="title"><?= $row['Name'] ?></h5>

                                    </a>
                            </div>

                        </div>

                    </div>
                    <div class="card">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-header">
                                <h5 class="card-title text-center">Message Me </h5>
                            </div>

                            <div class="card-body p-2">

                                <form action="" method="post" class="row">
                                    <div class="">
                                        <div class="col-md-7">
                                            <label for="inputEmail4" class="form-label">Full name:</label>
                                            <input type="text" class="form-control" id="inputEmail4" name="fname" required>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="inputEmail4" class="form-label">MobileNumber:</label>
                                            <input type="text" class="form-control" id="inputEmail4" name="number" maxlength="11" required>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="inputEmail4" class="form-label">Email: </label>
                                            <input type="email" class="form-control" id="inputEmail4" name="email" required>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="inputEmail4" class="form-label">Messages: </label>
                                            <textarea name="message" id="" cols="30" rows="5" required></textarea>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="g-recaptcha" data-sitekey="6LfAZMglAAAAAB4jQPO1NjG-UsMb1WWgw2gqAOEy"></div>
                                        </div>
                                        <input type="submit" class="btn-btn secondary" id="login" name="submit" value="Submit">
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>









                <div class="col-md-8">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title">Edit Profile</h5>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" placeholder="Home Address" name="fname" value="<?php if (empty($row['Name'])) {
                                                                                                                                    echo "";
                                                                                                                                } else {
                                                                                                                                    echo $row['Name'];
                                                                                                                                } ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label>Teacher Qualifications(Sepereted by comma)</label>
                                        <input type="text" class="form-control" placeholder="Qualifications" name="qualifications" value="<?php if (empty($row['Qualifications'])) {
                                                                                                                                                echo "";
                                                                                                                                            } else {
                                                                                                                                                echo $row['Qualifications'];
                                                                                                                                            } ?>" readonly>
                                    </div>
                                </div>
                                <div class=" col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Teaching Experience</label>
                                        <input type="tel" class="form-control" placeholder="Teaching Experience" name="experience" value="<?php if (empty($row['teachingExp'])) {
                                                                                                                                                echo "";
                                                                                                                                            } else {
                                                                                                                                                echo $row['teachingExp'];
                                                                                                                                            } ?>" maxlength="2" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Subjects</label>
                                        <select class="form-select" aria-label="Default select example" id="select" name="subject" disabled>
                                            <option value="<?php echo $row['TeacherSub']; ?>"><?php echo $row['TeacherSub']; ?></option>
                                            <?php
                                            $query = 'SELECT * FROM `tblsubjects`';
                                            $stmt = $conn->prepare($query);
                                            $stmt->execute();
                                            $result1 = $stmt->get_result();
                                            $result2 = $result1->fetch_all(MYSQLI_ASSOC);
                                            foreach ($result2 as $row1) {
                                            ?>
                                                <option value="<?php echo htmlentities($row1['Subject']); ?>"><?php echo htmlentities($row1['Subject']); ?></option>
                                            <?php } ?>



                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Teacher Since</label>
                                        <input type="date" class="form-control" name="date" value="<?php if (empty($row['JoiningDate'])) {
                                                                                                        echo "";
                                                                                                    } else {
                                                                                                        echo $row['JoiningDate'];
                                                                                                    } ?>" readonly>

                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea readonly name="description" class="form-control textarea" name="description"><?php if (empty($row['description'])) {
                                                                                                                                    echo "";
                                                                                                                                } else {
                                                                                                                                    echo $row['description'];
                                                                                                                                } ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>


</div>
</div>

<script src="./src/js/bootstrap.bundle.min.js"></script>
<script src="./src/js/jquery-3.6.1.min.js"></script>
<script src="./src/js/datatables.min.js"></script>
<script src="./src/sweetalert2/dist/sweetalert2.all.js"></script>
<script>
    $(document).on('click', '#login', function() {
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'Please verify you are not a robot',
            })
            return false;
        }
    });
</script>





</body>

</html>

<?php

if (isset($_POST['submit'])) {


    $fname = $_POST['fname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date_created = date('Y-m-d H:i:s');

    $query = $conn->prepare("INSERT INTO `tblquery`(`teacherId`, `fName`, `emailId`, `mobileNumber`, `Query`, `queryDate`) 
    VALUES (?,?,?,?,?,?)");
    if ($query) {
        $query->bind_param("ssssss", $teacher_id, $fname, $email, $number, $message, $date_created);
        $query->execute();
        echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Sent',
                        })
                        </script>
                        ";
    }
}


?>