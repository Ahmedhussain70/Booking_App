<?php
include "./includes/conn.php";
require_once 'SimpleXLSXGen.php';

$sql = "SELECT * FROM booking_user where CURRENT_DATE";
$result = mysqli_query($conn, $sql);
// $result = $row = mysqli_fetch_array($result);
    while($row = mysqli_fetch_array($result)){
        if ($row > 0 ){
            $xlsx = Shuchkin\SimpleXLSXGen::fromArray( $row );
            $xlsx->downloadAs("Booking_data.xlsx");
        }else{
            echo "Data Not Found";
        }
    }
?>
