<?php
$conn = new mysqli("localhost", "root", "", "trms");
if ($conn == false) {
    echo "error" . $conn->error;
}

// $conn = new mysqli("sql307.epizy.com", "epiz_34029273", "GPrXUgDYiIdvw", "epiz_34029273_trms");
// if ($conn == false) {
//     echo "error" . $conn->error;
// }