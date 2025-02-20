<?php
require 'dbconnection.php';

$query = "SELECT officeID, officeName FROM offices";
$result = mysqli_query($con, $query);

$offices = [];
while ($row = mysqli_fetch_assoc($result)) {
    $offices[] = $row;
}

echo json_encode($offices);
?>
