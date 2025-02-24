<?php
require 'dbconnection.php';

if (!isset($_GET['empID'])) {
    echo "<tr><td colspan='9' class='text-center'>No employee ID provided.</td></tr>";
    exit();
}

$empID = $_GET['empID'];

$query = "SELECT employees.*, offices.officeName 
          FROM employees 
          LEFT JOIN offices ON employees.officeID = offices.officeID
          WHERE employees.empID = '$empID'";

$query_run = mysqli_query($con, $query);

if ($query_run && mysqli_num_rows($query_run) > 0) {
    $employee = mysqli_fetch_assoc($query_run);
    ?>
    <tr><td colspan='9' class='text-center'>You've already have a record.</td></tr>
    
    <?php
} else {
    echo "<tr><td colspan='9' class='text-center'>No records found.</td></tr>";
}
?>
