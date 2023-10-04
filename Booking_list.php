<?php
include "./includes/conn.php";
session_start();

$sql = "SELECT * FROM booking_user order by ID desc";

$result = mysqli_query($conn, $sql);
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
<div class=" mb-5 mt-3">
    <div class="container">
        <h1>Booking List</h1>
        <hr />
        <button onclick="location.href='Export.php'" class="btn btn-success" >Export To Excel</button>
        <input class="form-control mt-5" list="datalistOptions" id="search" placeholder="Search by date...">

    </div>
    <div id="display">



<table class="table mt-3 table-columns " >
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
// var_dump($result);
//if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // while($row = mysqli_fetch_assoc($result)) {
    //     echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["created_at"]. "<br>";
    // }
    while($row = mysqli_fetch_array($result)) {
    	echo "<tr>";
    	?>
    	<td><?php echo $row[0];?></td>
    	<td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
        <td><?php echo $row[3];?></td>
        <td><?php echo $row[4];?></td>
        <td><?php echo $row[5];?></td>
        <td><?php echo $row[6];?></td>
        <td><?php echo $row[7];?></td>
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
    <input name="Driver" type="text" value="" class="form-control" id="driver" aria-describedby="emailHelp" Required>
    <label for="exampleInputPassword1" class="form-label mt-2">Driver Number</label>
    <input name="DriverNumber" type="text" class="form-control" id="driverNumber" Required>
    <label for="exampleInputPassword1" class="form-label mt-2">Car</label>
    <input name="Car" type="text" class="form-control" id="car" Required>
    <div class="d-flex justify-content-between">
      <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        <a id="mail" class="accep mt-3 btn btn-primary">Mail To</a>
    </div>
  </div>
</form>
    </div>
  </div>
</div>

<script>
  $('.modelacc').on("click",function(){
    $("td").css('background-color','#FFFFCC');
    var ID=$(this).data('id');
    var subject = 'Booking Accept';
    $('#mail').on("click", function(){
      var driver = $( "#driver" ).val();
    var driverNumber = $( "#driverNumber" ).val();
    var car = $("#car" ).val();
    $('#mail').attr('href','mailto:'+ID+'?subject=' + subject + '&body=' + "Driver Name:     " + driver +  "       Phone Number:     " + driverNumber + "       Car:     " + car );
  })
});

$('.modelrej').click(function(){
    var ID=$(this).data('id');
    var subject = 'Booking Rejected';
    var body = 'Your Booking Date Not Avalible Please Select Another Date';
    $('.modelrej').attr('href','mailto:'+ID+'?subject=' + subject +'&body=' + body);
});
</script>

        <a href="#exampleModalToggle" data-id="<?php echo $row[2]; ?>" class="modelacc btn btn-primary" data-bs-toggle="modal"  role="button">
          Accept
        </a>

         <a class="modelrej btn btn-danger" data-id="<?php echo $row[2]; ?>">Reject</a>
   </td>
            <?php
        echo "</tr>";
    }
?>
</div>
</div>
    <!-- <label for="exampleDataList" class="form-label">Search Data</label> -->
<script src="js/search.js"></script>
</div>