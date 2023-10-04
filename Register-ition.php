<?php 

include 'includes/db.php';
// include 'includes/alert.php';

class booking extends database{
    public function insert(){
        $name  =  ($_POST['DeviceName']);
        $email = ($_POST['Email']);
        $Management =  ($_POST['Management']);
        $location  =  ($_POST['location']);
        $Day  =  ($_POST['Day']);
        $TimeFrom  =  ($_POST['TimeFrom']);
        $TimeTO  =  ($_POST['TimeTo']);

        $sql = "INSERT INTO booking_user (`DeviceName`,`Email`,`Management`,`location`,`Day`,`TimeFrom`,`TimeTo`)
        VALUES('$name','$email','$Management','$location','$Day','$TimeFrom','$TimeTO')";

        $conn = mysqli_connect($this->servername,$this->username, $this->password,$this->db_name);

        if (mysqli_query($conn,$sql)){
        header("location:Home.php");
        $success_msg[] = "Saved Successfully!";
        }
        else{
        // echo"error: " . $sql . "<br>" . mysqli_error($conn);
        $error_msg[] = "Error";
        }
    }
}
?>