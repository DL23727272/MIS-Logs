<?php
session_start();
header('Content-Type: application/json');
include 'dbconnection.php'; // Make sure to include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userLoginName'];
    $password = md5($_POST['userLoginPassword']); // Hash the entered password with MD5

    // Prepare statement to prevent SQL Injection
    $stmt = $con->prepare("SELECT userID, username, password, userType FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userID, $dbUsername, $dbPassword, $userType);
        $stmt->fetch();

        if ($password === $dbPassword) {
            $_SESSION['userID'] = $userID;
            $_SESSION['username'] = $dbUsername;
            $_SESSION['userType'] = $userType;

            echo json_encode(["status" => "success", "message" => "Welcome!", "userID" => $userID, "username" => $dbUsername, "type" => $userType]);
        } else {
            echo json_encode(["status" => "error", "message" => "Incorrect password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }
    $stmt->close();
    $con->close();
}
?>
