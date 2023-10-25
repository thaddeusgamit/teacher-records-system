 <?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    include('./connection.php');
    include('./session.php');
    $email = $_SESSION['email'];
    $id = $_SESSION['ID'];



    $query = 'SELECT COUNT(Query) as inbox FROM tblquery WHERE teacherId = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $num_of_rows = $result->num_rows;
    $row = $result->fetch_assoc();
    echo '<pclass="card-title>' . $row['inbox'] . ' </p>';
    ?>