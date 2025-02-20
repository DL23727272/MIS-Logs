<?php
require 'dbconnection.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM employees WHERE empID='$id'";
    if(mysqli_query($con, $query)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
