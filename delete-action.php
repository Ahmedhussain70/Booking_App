<?php 
    require 'includes/conn.php';
    include 'delete.php';

    $del = new delete();
    $con = $del->connect();
    $del->del($con);
?>