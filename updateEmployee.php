<?php
require 'dbconnection.php';

if (isset($_POST['id'], $_POST['name'], $_POST['officeID'], $_POST['position'], $_POST['address'], $_POST['phone'], $_POST['degree'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $officeID = mysqli_real_escape_string($con, $_POST['officeID']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $degree = mysqli_real_escape_string($con, $_POST['degree']); 
    $degreeDetails = mysqli_real_escape_string($con, $_POST['degreeDetails']); // New degree field

    // Validate officeID
    $officeCheckQuery = "SELECT officeID FROM offices WHERE officeID = '$officeID'";
    $result = mysqli_query($con, $officeCheckQuery);

    if (mysqli_num_rows($result) > 0) {
        // Update employee record with degree
        $query = "UPDATE employees 
                  SET name='$name', officeID='$officeID', position='$position', address='$address', phone='$phone', degree='$degree', degreeDetails = '$degreeDetails' 
                  WHERE empID='$id'";

        if (mysqli_query($con, $query)) {
            echo "Success";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: Office not found.";
    }
} else {
    echo "Error: Missing required parameters.";
}
?>
