 <?php

    session_start();
    date_default_timezone_set('Asia/Manila');
    include('./connection.php');
    include('./session.php');
    $email = $_SESSION['email'];
    $id = $_SESSION['ID'];

    $query_mb = 'SELECT sum(length(files)/ 1024*1024 ) AS MB FROM files WHERE email = ?';
    $stmt = $conn->prepare($query_mb);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $num_of_rows = $result->num_rows;
    $row = $result->fetch_assoc();
    echo  ' <p class="card-title">' . $row['MB'] . 'MB </p>';

    ?>