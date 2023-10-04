<?php 

include 'includes/db.php';

class booking extends database{
    public function insert(){
        $Driver  =  ($_POST['Driver']);
        $DriverNumber = ($_POST['DriverNumber']);
        $Car = ($_POST['Car']);

        $sql = "INSERT INTO drivers (`Driver`,`DriverNumber`,`Car`)
        VALUES('$Driver','$DriverNumber','$Car')";
        
$conn = mysqli_connect($this->servername,$this->username, $this->password,$this->db_name);

if (mysqli_query($conn,$sql)){
    header("location: print.php");
        $success_msg[] = "Saved Successfully!";
        }
        else{
        echo"error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>