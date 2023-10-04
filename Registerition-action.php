<?php 
    require 'includes/conn.php';
    include 'Register-ition.php';
    
    $name  =  $_POST['DeviceName'];
    $email = $_POST['Email'];
    $Management =  $_POST['Management'];
    $location  =  $_POST['location'];
    $Day  =  $_POST['Day'];
    $TimeFrom  =  $_POST['TimeFrom'];
    $TimeTO  =  $_POST['TimeTo'];

    $booking = new booking();
    $con = $booking->connect();
    $booking->insert($con,$name,$email,$Management,$location,$Day,$TimeFrom,$TimeTO);
?>