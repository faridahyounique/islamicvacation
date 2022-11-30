<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
 <!DOCTYPE html>
<html>
  <head>
  <title>Admin page </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #adad85;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #f1f1f1;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color:#818181;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.table {
  font-size: small;
  color: black;

}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="applicantslist.php">Applicants List</a>
  <a href="volunteers.php">Volunteers</a>
  <a href="previousvolunteers.php">Previous Volunteers</a>
  <a href="logout.php">Logout</a>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; <div class="card-deck">
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
<div class="card-deck mt-5">
  <div class="card bg-info text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF MALE</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="noofmales.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `gender`='male'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div> 
  <div class="card bg-danger text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF FEMALES</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="nooffemales.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `gender`='female'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div>
  <div class="card bg-dark text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF ADULTS</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="adultslist.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `category`='Adults'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div>
  </div>
  <div class="card-deck mt-5">
  <div class="card bg-secondary text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF HIGHER INSTITUTION STUDENTS</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="higherinstitutionlist.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `category`='Higher Institution'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div>   
  <div class="card bg-success text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">TOTAL NUMBER OF KIDS</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="kidslist.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `category`='Kids'";
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
      <h3 class="card-text ">TOTAL NUMBER OF SECONDARY SCHOOL STUDENTS</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="secondaryschoollist.php">
      <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `category`='Secondary School'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
</a>
</medium>
    </div>
  </div>   
</div>
<div class="card-deck mt-5">
  <div class="card bg-secondary text-white">
    <div class="card-body text-left">
      <h3 class="card-text ">ZONE</h3>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <medium><a href="zonalselectionlist.php">
    <table> 
      <tr>
      <th>Adults</th>
      <th> </th>
      <th>Children</th>
      </tr>
      <tr>
        <td><?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `category`='Adults' and 'Higher Institution' and 'Senior Secondary School'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?></td>
          <td></td>
          <td>
          <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `category`='Kids' and 'Junior Secondary School' and 'Primary School'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()
                         ?>
          <?php echo $row['total']; ?>
          </td>
      </tr>
    </table>
      <?php
            //include 'connect_database.php';
            //$i =0;
            //$sql="SELECT COUNT(gender) AS total FROM `islamicvacationcourse_tbl`WHERE `zone`='national'";
            //$result=$conn->query($sql);
            //$result=$row=$result->fetch_assoc()
                         ?>
          <!-- <?php echo $row['total']; ?> -->
</a>
</medium>
    </div>
  </div>   
     <?php echo $_SESSION['name']; ?></span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html>
<?php 
}else{

     header("Location: index.php");

     exit();

}

 ?>

    


    