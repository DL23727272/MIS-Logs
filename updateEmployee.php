<?php
require 'dbconnection.php';

if(isset($_POST['id'], $_POST['name'], $_POST['officeID'], $_POST['position'], $_POST['address'], $_POST['phone'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $officeID = $_POST['officeID'];  // Fix: Using officeID instead of officeName
    $position = $_POST['position'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Validate officeID
    $officeCheckQuery = "SELECT officeID FROM offices WHERE officeID = '$officeID'";
    $result = mysqli_query($con, $officeCheckQuery);

    if (mysqli_num_rows($result) > 0) {
        // Update employee record
        $query = "UPDATE employees 
                  SET name='$name', officeID='$officeID', position='$position', address='$address', phone='$phone' 
                  WHERE empID='$id'";

        if(mysqli_query($con, $query)) {
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
