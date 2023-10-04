<?php 
    include 'includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Booking</title>
         <!-- basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- owl stylesheets --> 
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"></script> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/alert.css">
    
    <style>
        body {
            background: rgb(190, 171, 196)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #a992ae;
        }

        .profile-button {
            background: rgb(170, 140, 181);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #dab7e0
        }

        .profile-button:focus {
            background: #b769c4;
            box-shadow: none
        }

        .profile-button:active {
            background: #9a8670;
            box-shadow: none
        }

        .back:hover {
            color: #837386;
            cursor: pointer
        }

        .labels {
            font-size: 11px;
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        #manage{
            display: none;
        }

        #department{
            display: none;
        }

    </style>
    </head>
  <body>
      <ul class="notifications"></ul>
      <?php include 'includes/alert.php'; ?>
      <div class="container rounded bg-white mt-3 mb-3">
          <div class="row">
        <div class="col-lg-12 col-md-7 ">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Booking</h4>
                </div>
                <form action="Registerition-action.php" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Device</label><input Required name="DeviceName" type="text" class="form-control" placeholder="" value="<?php echo shell_exec("wmic computersystem get username");?>"></div>
                    <div class="col-md-6"><label class="labels">Email</label><input type="Email" Required class="form-control" name="Email" placeholder="Enter Email" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Choose a Management:</label><br/>
                        <select Required id="otherd"  name="Management" class="form-select" aria-label="Default select example">
                            <option selected value="">Open this select menu</option>

                            <?php 
                                $query ="SELECT Distinct dept_name FROM dept";
                                $result = $conn->query($query);
                                    if($result->num_rows> 0){
                                    while($optionData=$result->fetch_assoc()){
                                    $option =$optionData['dept_name'];
                            ?>

                            <?php
                                //selected option
                                if(!empty($dept) && $dept == $option){
                                // selected option
                            ?>
                            <option value="<?php $option ?>"><?php echo $option; ?> </option>
                            <!-- <option value="IT">IT</option> -->
                            <?php 
                                continue;
                             }?>
                            <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                            <?php
                                }}
                            ?>
                        <option value="other">Other</option>
                        </select>
                    </div>
                    <div id="department" class="col-md-6"><label class="labels">Management</label><input Required id="input-disabledd" disabled type="text" name="Management" class="form-control" placeholder="Enter Your Management"></div>
                </div>
                <div class="row mt-3">
                    <!-- <div class="col-md-12"><label class="labels">Location</label><input Required type="text" name="location" class="form-control" placeholder="Enter location"></div> -->
                    <div class="col-md-6">
                        <label class="labels">Choose a Location:</label><br/>
                        <select Required id="other" name="location" class="form-select" aria-label="Default select example">
                            <option selected value="">Open this select menu</option>
                            <?php 
                                $query ="SELECT Distinct location_name FROM locations";
                                $result = $conn->query($query);
                                    if($result->num_rows> 0){
                                    while($optionData=$result->fetch_assoc()){
                                    $option2 =$optionData['location_name'];
                            ?>

                            <?php
                                if(!empty($location) && $location == $option2){
                            ?>
                            <option value="<?php $option2 ?>"><?php echo $option2; ?> </option>
                            <?php 
                                continue;
                             }?>
                            <option value="<?php echo $option2; ?>" ><?php echo $option2; ?> </option>
                            <?php
                                }}
                            ?>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div id="manage" class="col-md-6"><label class="labels">Location</label><input Required id="input-disabled" disabled type="text" name="location" class="form-control" placeholder="Enter Your Location"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Day</label><input Required type="date" name="Day" class="form-control" placeholder="Enter Day"></div>
                </div>
                <!-- <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Time</label><input Required type="time" name="Time" class="form-control" placeholder="Enter Time"></div>
                </div> -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="col-md-12"><label class="labels">Time From</label><input Required type="time" name="TimeFrom" class="form-control" placeholder="Enter Time From"></div>
                    </div>
                    <div class="col-md-6"><label class="labels">Time To</label><input Required type="Time" name="TimeTo" class="form-control" placeholder="Enter Time To"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save</button>
            </div>
            </form>
            <div class="mt-4">
                <p style="color: blue; font-weight: 500;">Powered By Dakahlia Group @ Ahmed Hussain</p>
                <!-- <button onclick="location.href='print.php'" class="btn btn-info" >Go To Report</button> -->
                <!-- <button id="btn-print" class="ms-3 btn btn-info" >Print Report</button> -->
                </div>
            </div>
        </div>
</div>
</div>
</div>
  </body>
    <script src="js/home.js"></script>
    <script src="js/search.js"></script>
    <script src="js/alert.js"></script>
</html>