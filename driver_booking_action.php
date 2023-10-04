<?php 
    require 'includes/conn.php';
    include 'driver_booking.php';
    
    $Driver  =  $_POST['Driver'];
    $DriverNumber = $_POST['DriverNumber'];
    $Car = $_POST['Car'];

    $booking = new booking();
    $con = $booking->connect();
    $booking->insert($con,$Driver,$DriverNumber);
?>