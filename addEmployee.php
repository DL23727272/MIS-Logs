<?php
require 'dbconnection.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empID = $_POST['empID'];
    $name = $_POST['name'];
    $officeID = $_POST['office']; // Ensuring it's taken from the dropdown
    $position = $_POST['position'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $degree = $_POST['degree'];
    $degreeDetails = $_POST['degreeDetails'];

    // Check if empID already exists
    $checkQuery = "SELECT * FROM employees WHERE empID = ?";
    $stmt = $con->prepare($checkQuery);
    $stmt->bind_param("s", $empID);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "duplicate"; // Employee ID already exists
    } else {
        // Insert new employee with degree fields
        $insertQuery = "INSERT INTO employees (empID, name, officeID, position, address, phone, degree, degreeDetails) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($insertQuery);
        $stmt->bind_param("ssisssss", $empID, $name, $officeID, $position, $address, $phone, $degree, $degreeDetails);
        
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
    }
    $stmt->close();
    $con->close();
}
?>
