<?php 
    include 'includes/db.php';

    class delete extends database{
        function del (){
            $sql="delete from `booking_user` where ID=".$_GET['ID'];
            $conn = mysqli_connect($this->servername,$this->username, $this->password,$this->db_name);
            if (mysqli_query($conn,$sql)){
                echo("delete success");
                header("Location: print.php");
            }else{
                echo("Error");
            }
        }
    }
?>