<?php
include 'dbconnection.php'; // Ensure database connection is set up correctly

$username = "adminDL";
$password = "DL@123";
$hashedPassword = md5($password); // Hash the password
$userType = "admin";

// Prepare SQL statement
$stmt = $con->prepare("INSERT INTO users (username, password, userType) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $hashedPassword, $userType);

if ($stmt->execute()) {
    echo "Admin user inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
