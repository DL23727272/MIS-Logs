<?php
require 'dbconnection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $officeName = trim($_POST['officeName']);

    // Check if office name already exists
    $checkQuery = "SELECT * FROM offices WHERE officeName = ?";
    $stmt = $con->prepare($checkQuery);
    $stmt->bind_param("s", $officeName);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "duplicate"; // Office already exists
    } else {
        // Insert the new office
        $insertQuery = "INSERT INTO offices (officeName) VALUES (?)";
        $stmt = $con->prepare($insertQuery);
        $stmt->bind_param("s", $officeName);

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
