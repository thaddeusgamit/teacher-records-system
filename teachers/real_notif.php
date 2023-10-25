 <?php
   session_start();
   date_default_timezone_set('Asia/Manila');
   include('./connection.php');
   include('./session.php');
   $email = $_SESSION['email'];
   $id = $_SESSION['ID'];



   $query = 'SELECT COUNT(view) as notif FROM sent WHERE receiver = ? AND view = 0 ';
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s', $email);
   $stmt->execute();
   $result = $stmt->get_result();

   $num_of_rows = $result->num_rows;
   $row = $result->fetch_assoc();
   if ($row['notif'] >= 1) {
      echo '<pclass="card-title>' . $row['notif'] . ' </p>';
   } else {
      echo ' <span id="notification" class=" invisible position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">';
   }

   ?>