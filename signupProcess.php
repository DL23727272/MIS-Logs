<?php
session_start();
header('Content-Type: application/json');
include 'dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the POST data exists
    if (!isset($_POST['signupUsername']) || !isset($_POST['signupPassword'])) {
        echo json_encode(["status" => "error", "message" => "Invalid request. Missing required fields."]);
        exit();
    }

    $username = trim($_POST['signupUsername']);
    $password = trim($_POST['signupPassword']);
    $userType = 'user'; // Default user type

    // Validate if username and password are not empty
    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Please fill in all fields."]);
        exit();
    }

    // Check if username already exists
    $stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Employee id already taken."]);
        exit();
    }

    // Encrypt password using MD5 (⚠️ Not secure, use at your own risk)
    $hashedPassword = md5($password);

    // Insert new user
    $stmt = $con->prepare("INSERT INTO users (username, password, userType) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $userType);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Account created successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Signup failed. Please try again."]);
    }

    $stmt->close();
    $con->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
