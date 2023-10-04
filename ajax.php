<table class="table table-hover mt-3 my-10">
           <!-- <th class="bg-light">id </th> -->
            <th>ID </th>
            <th>Device Name</th>
            <th>Email</th>
            <th>Management</th>
            <th>Location</th>
            <th>Day</th>
            <th>From</th>
            <th>To</th>
            <th>Action</th>
<?php

include "./includes/conn.php";

if (isset($_POST['search'])) {

   $Day = $_POST['search'];

   $Query ="SELECT * FROM booking_user where Day like '%$Day%'";

   $ExecQuery = MySQLi_query($conn, $Query);

   while ($Result = MySQLi_fetch_array($ExecQuery)) {
      echo '
<tr>
   ';
       ?>

    <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['ID']; ?>
   </td></a>
   <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['DeviceName']; ?>
   </td></a>
   <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['Email']; ?>
   </td></a>
   <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['Management']; ?>
   </td></a>
   <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['location']; ?>
   </td></a>
   <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['Day']; ?>
   </td></a>
   <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['TimeFrom']; ?>
   </td></a>
   <td onclick='fill("<?php echo $Result['Day']; ?>")'>
   <a>

       <?php echo $Result['TimeTo']; ?>
   </td></a>
   <td>
   <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered col-12">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Accept Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="driver_booking_action.php" method="post">
  <div class="container mb-3">
    <label for="exampleInputEmail1" class="form-label mt-2">Driver</label>
    <input name="Driver" type="text" class="form-control" id="driver" aria-describedby="emailHelp" Required>
    <label for="exampleInputPassword1" class="form-label mt-2">Driver Number</label>
    <input name="DriverNumber" type="text" class="form-control" id="driverNumber" Required>
    <label for="exampleInputPassword1" class="form-label mt-2">Car</label>
    <input name="Car" type="text" class="form-control" id="car" Required>
    <!-- <input type="submit" class="mt-3 btn btn-primary"> -->
    <div class="d-flex justify-content-between">
      <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        <a id="accept" class="mt-3 btn btn-primary">Mail To</a>
    </div>
  </div>
</form>
    </div>
  </div>
</div>

<script>
  $('.modelacc').on("click",function(){
    var ID=$(this).data('id');
    var subject = 'Booking Accept';
    $('#accept').on("click", function(){
    var driver = $( "#driver" ).val();
    var driverNumber = $( "#driverNumber" ).val();
    var car = $( "#car" ).val();
    $('#accept').attr('href','mailto:'+ID+'?subject=' + subject+ '&body=' + driver + driverNumber + car );
  })
});

$('.modelrej').click(function(){
    var ID=$(this).data('id');
    var subject = 'Booking Rejected';
    var discription = 'Booking Rejected';
    $('.modelrej').attr('href','mailto:'+ID+'?subject=' + subject);
});
</script>

        <a href="#exampleModalToggle" data-id="<?php echo $Result['Email'] ?>" class="modelacc btn btn-primary" data-bs-toggle="modal"  role="button">
          Accept
        </a>
         <a class="modelrej btn btn-danger" data-id="<?php echo $Result['Email']?>" href="delete-action.php?ID=<?php echo $row[0];?>">Reject</a>
   </td>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
</tr>
