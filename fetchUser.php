<?php
session_start();
include 'dbconnection.php'; // Ensure you have a connection file

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    $query = "SELECT employees.*, offices.officeName 
              FROM employees 
              LEFT JOIN offices ON employees.officeID = offices.officeID 
              WHERE employees.username = ?";

    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "User not found"]);
    }
    
    $stmt->close();
    $con->close();
} else {
    echo json_encode(["error" => "Username not provided"]);
}
?>
