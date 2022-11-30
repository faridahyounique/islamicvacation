<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tester</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
  ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
}

/* Display list items side by side */
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
}

/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li+li:before {
  padding: 8px;
  color: blue;
  content: "/\00a0";
}

/* Add a color to all links inside the list */
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}

/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}
</style>
<body>
<ul class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li><a href="MSSN.php">MSSN in a glance</a></li>
  <li><a href="#">Library</a></li>
</ul>
<div class="card-deck">
  <div class="card bg-success text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF APPLICANTS</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="applicantlist.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(id) AS total FROM `islamicvacationcourse_tbl`";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div>
  <div class="card bg-primary text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF PREVIOUS VOLUNTEERS</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="previousvolunteerlist.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(volunteer) AS total FROM `islamicvacationcourse_tbl` WHERE `volunteer`='yes'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div>
  <div class="card bg-warning text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF VOLUNTEERS</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="volunteerlist.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(volunteer3) AS total FROM `islamicvacationcourse_tbl` WHERE `volunteer3`='yes'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div>
</div>
<fieldset class="border p-2">
                  <legend class="w-auto">Next of kin</legend>
               
                    <label class="">Name:</label>
                    <input type="text" class="form-control" placeholder="" id="nextofkin" name="nextofkin">
                  </div>
               
                    <label class="">Phone number:</label>
                    <input type="text" class="form-control" placeholder="" id="contactofnextofkin" name="contactofnextofkin">
                  </div>
          </fieldset>

</body>
</html>
