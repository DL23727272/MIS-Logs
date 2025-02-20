<?php
    $con = mysqli_connect("localhost","root","","mis_logs");

    if(!$con){
        die('Connection Failed'.mysqli_connect_error());
    }
?>