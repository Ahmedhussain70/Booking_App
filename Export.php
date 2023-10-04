<?php 
    include 'includes/conn.php';
    include 'SimpleXLSXGen.php';

    $users = [
        ['ID','DeviceName','Email','Management','location','Day','TimeFrom','TimeTo']
    ];

    // $id = 0;
    $sql = "SELECT * FROM booking_user";
    $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            foreach($result as $row)
            // $id++;
            $users= array_merge($users,array(array($id,$row['DeviceName'],$row['Email'],$row['Management'],$row['location'],$row['Day'],$row['TimeFrom'],$row['TimeTo'])));
            $xlsx = SimpleXLSXGen::fromArray($users);
            $xlsx->downloadAs("Booking_data.xlsx");
        }
?>