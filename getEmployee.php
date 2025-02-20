<?php
require 'dbconnection.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT employees.*, offices.officeName FROM employees 
              LEFT JOIN offices ON employees.officeID = offices.officeID 
              WHERE employees.empID = '$id'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $employee = mysqli_fetch_assoc($result);
        echo json_encode($employee);
    } else {
        echo json_encode(["error" => "Employee not found"]);
    }
}
?>
