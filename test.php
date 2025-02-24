<?php
include 'dbconnection.php'; // Ensure correct DB connection

$username = "adminDL";
$password = "DL@123";

// Fetch user data
$stmt = $con->prepare("SELECT userID, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if ($row) {
    if (md5($password) === $row['password']) {
        echo "✅ Login successful!";
    } else {
        echo "❌ Password is incorrect!";
    }
} else {
    echo "❌ User not found!";
}

$con->close();
?>
