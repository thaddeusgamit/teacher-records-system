<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <form action="" autocomplete="off">
        <span class="d-flex align-items-center mb-3">
            <label for="" style="margin-right: 12px;">To:</label>
            <input type="text" class="form-control w-100 ms-2" id="teacher" name="to" maxlength="30">
        </span>
    </form>



</body>

</html>


<?php

if (isset($_POST['sub'])) {
    
    $query_sent = $conn->prepare("INSERT INTO `sent`(`sid`, `sender`, `receiver`, `subject`, `body`, `date_time_created`) VALUES (?,?,?,?,?,?)");
    $query_sent->bind_param("ssssss", $sid, $from, $to, $subject, $body, $date_created);
    if ($query_sent->execute()) {
        echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sent',
                            text: 'Succesfully send',
                        })
                        </script>
                        ";
        $query_sent->close();
        echo "<script>window.location.href='sendfiles.php' </script>";
        exit();
    }
}

?>