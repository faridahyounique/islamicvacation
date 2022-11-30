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
  background-color: #fff;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  /* font-size: 25px; */
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
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn text-danger" onclick="closeNav()">&times;</a>
  <div class="bg-dark rounded mb-1 ml-1 w-100"><a href="applicantslist.php">Applicants List</a></div>
  <div class="bg-dark rounded mb-1 ml-1 w-100"><a href="volunteers.php">Volunteers</a></div>
  <div class="bg-dark rounded mb-1 ml-1 w-100"><a href="previousvolunteers.php">Previous Volunteers</a></div>
  <div class="bg-danger rounded mb-1 ml-1 w-100"><a href="logout.php">Logout</a></div>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; <div class="card-deck">
  <div class="card bg-info text-white">
    <div class="card-body text-left">
      <h6 class="card-text ">Applicants</h6>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <?php
            include 'connect_database.php';

      ?>
      <div class="row">
        <div class="col-sm-3"><span style="font-size: 15px;">
          <?php 
            $sql1="SELECT COUNT(gender) AS male_total FROM `islamicvacationcourse_tbl` WHERE gender ='Male'";
            $result=$conn->query($sql1);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="noofmales.php"><span class="badge bg-success text-light font-weight-bolder"> Male:</span> <?php echo $row['male_total']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 15px;">
          <?php 
            $sql="SELECT COUNT(gender) AS female_total FROM `islamicvacationcourse_tbl` WHERE gender ='Female'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc()  
          ?>
          <a href="nooffemales.php"><span class="badge bg-success text-light font-weight-bolder"> Female: </span> <?php echo $row['female_total']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 15px;">
          <?php 
            $adult="SELECT COUNT(id) AS adult FROM `islamicvacationcourse_tbl` WHERE category IN ('Other Adults', 'Higher Institution', 'Senior Secondary School')";
            $result=$conn->query($adult);
            $row=$result->fetch_assoc()  
          ?>
           <a href="adultslist.php"><span class="badge bg-primary text-light font-weight-bolder">Adult:</span> <?php echo $row['adult']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 15px;">
          <?php 
            $children="SELECT COUNT(id) AS children FROM `islamicvacationcourse_tbl` WHERE category IN ('Kids', 'Junior Secondary School', 'Primary School')";
            $result=$conn->query($children);
            $result=$row=$result->fetch_assoc()  
          ?>
           <a href="childrenlist.php"><span class="badge bg-primary text-light font-weight-bolder">Children:</span> <?php echo $row['children']; ?></a>
        </div>
      </div>
      <div class="row" style="font-size: 15px;">
        <?php 
            $sql="SELECT COUNT(id) AS total FROM `islamicvacationcourse_tbl`";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <div class="col-sm-12" style="text-align: center;">
            <a href="applicantlist.php"><span class="badge bg-info text-light font-weight-bolder">Total:</span> <?php echo $row['total']; ?></a>
          </div>
      </div>
    </div>
  </div>
  <div class="card bg-dark text-white">
    <div class="card-body text-left">
      <h6 class="card-text">Previous Volunteers</h6>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <div class="row">
          <?php 
            $sql1="SELECT COUNT(id) AS enviromental FROM `islamicvacationcourse_tbl` WHERE volunteer ='yes' AND volunteer2  ='Environmental'";
            $result=$conn->query($sql1);
            $result=$row=$result->fetch_assoc()  
          ?>
        <div class="col-sm-3 ml --5"><span style="font-size: 13px;">
          <a href="environmental.php"><span class="badge bg-success text-light font-weight-bolder"> Env.:</span> <?php echo $row['enviromental']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS kitchen FROM `islamicvacationcourse_tbl` WHERE volunteer ='yes' AND volunteer2  ='Kitchen'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="kitchen.php"><span class="badge bg-success text-light font-weight-bolder"> Kitchen: </span> <?php echo $row['kitchen']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS medical FROM `islamicvacationcourse_tbl` WHERE volunteer ='yes' AND volunteer2  ='Medical Assistant'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="medical.php"><span class="badge bg-success text-light font-weight-bolder"> Med. Asst: </span> <?php echo $row['medical']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS public FROM `islamicvacationcourse_tbl` WHERE volunteer ='yes' AND volunteer2  ='Public relations'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="pubrel.php"><span class="badge bg-success text-light font-weight-bolder"> Pub. Rel: </span> <?php echo $row['public']; ?></a>
        </div>
      </div>
      <div class="row" style="font-size: 15px;">
        <?php 
            $sql="SELECT COUNT(id) AS tutoring FROM `islamicvacationcourse_tbl` WHERE volunteer ='yes' AND volunteer2 ='tutoring'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <div class="col-sm-6">
            <a href="tutoring.php"><span class="badge bg-success text-light font-weight-bolder">Tutoring:</span> <?php echo $row['tutoring']; ?></a>
          </div>
        <?php 
            $sql="SELECT COUNT(id) AS total FROM `islamicvacationcourse_tbl` WHERE volunteer ='yes'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
        ?>
          <div class="col-sm-6" style="text-align: center;">
            <a href="previousvolunteerlist.php"><span class="badge bg-info text-light font-weight-bolder">Total:</span> <?php echo $row['total']; ?></a>
          </div>
      </div>
    </div>
  </div>
  <div class="card bg-info text-white">
    <div class="card-body text-left">
      <h6 class="card-text">Volunteers</h6>
    </div>
    <div class="card-footer bg-white text-body text-right">
      <div class="row">
          <?php 
            $sql1="SELECT COUNT(id) AS enviromental FROM `islamicvacationcourse_tbl` WHERE volunteer3 ='yes' AND volunteer4  ='environmental'";
            $result=$conn->query($sql1);
            $result=$row=$result->fetch_assoc()  
          ?>
        <div class="col-sm-3 ml --5"><span style="font-size: 13px;">
          <a href="presentenvironmental.php"><span class="badge bg-success text-light font-weight-bolder"> Env.:</span> <?php echo $row['enviromental']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS kitchen FROM `islamicvacationcourse_tbl` WHERE volunteer3 ='yes' AND volunteer4  ='Kitchen'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="presentkitchen.php"><span class="badge bg-success text-light font-weight-bolder"> Kitchen: </span> <?php echo $row['kitchen']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS medical FROM `islamicvacationcourse_tbl` WHERE volunteer3 ='yes' AND volunteer4  ='medical assistant'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="presentmedical.php"><span class="badge bg-success text-light font-weight-bolder"> Med. Asst: </span> <?php echo $row['medical']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS public FROM `islamicvacationcourse_tbl` WHERE volunteer3 ='yes' AND volunteer4  ='publicrelations'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="presentpubrel.php"><span class="badge bg-success text-light font-weight-bolder"> Pub. Rel: </span> <?php echo $row['public']; ?></a>
        </div>
      </div>
      <div class="row" style="font-size: 15px;">
        <?php 
            $sql="SELECT COUNT(id) AS tutoring FROM `islamicvacationcourse_tbl` WHERE volunteer3 ='yes' AND volunteer4 ='tutoring'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <div class="col-sm-6">
            <a href="presenttutoring.php"><span class="badge bg-success text-light font-weight-bolder">Tutoring:</span> <?php echo $row['tutoring']; ?></a>
          </div>
        <?php 
            $sql="SELECT COUNT(id) AS total FROM `islamicvacationcourse_tbl` WHERE volunteer3 ='yes'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
        ?>
          <div class="col-sm-6" style="text-align: center;">
            <a href="volunteerlist.php"><span class="badge bg-info text-light font-weight-bolder">Total:</span> <?php echo $row['total']; ?></a>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="card-deck mt-5">
  <div class="card bg-info text-white">
    <div class="card-body text-left">
      <h6 class="card-text ">Adults</h6>
    </div>
    <div class="card-footer bg-white text-body text-right">
    <div class="row">
        <div class="col-sm-4"><span style="font-size: 15px;">
          <?php 
            $sql1="SELECT COUNT(id) AS institution FROM `islamicvacationcourse_tbl` WHERE category ='Higher Institution'";
            $result=$conn->query($sql1);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="higherinstitutionlist.php"><span class="badge bg-success text-light font-weight-bolder"> Higher Inst:</span> <?php echo $row['institution']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS senior FROM `islamicvacationcourse_tbl` WHERE category ='Senior Secondary School'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="secondaryschoollist.php"><span class="badge bg-success text-light font-weight-bolder"> SS Class: </span> <?php echo $row['senior']; ?></a>
        </div>
        <div class="col-sm-4"><span style="font-size: 15px;">
          <?php 
            $adult="SELECT COUNT(id) AS adult FROM `islamicvacationcourse_tbl` WHERE category ='Other Adults'";
            $result=$conn->query($adult);
            $result=$row=$result->fetch_assoc()  
          ?>
           <a href="otheradultslist.php"><span class="badge bg-primary text-light font-weight-bolder">Other Adult:</span> <?php echo $row['adult']; ?></a>
        </div>
      </div>
      <div class="row" style="font-size: 15px;">
        <?php 
            $sql="SELECT COUNT(id) AS total FROM `islamicvacationcourse_tbl` WHERE `category` IN ('Other Adults', 'Higher Institution', 'Senior Secondary School')";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <div class="col-sm-12" style="text-align: center;">
            <a href="adultslist.php"><span class="badge bg-info text-light font-weight-bolder">Total:</span> <?php echo $row['total']; ?></a>
          </div>
      </div>
    </div>
  </div>
  <div class="card bg-dark text-white">
    <div class="card-body text-left">
      <h6 class="card-text ">Children</h6>
    </div>
    <div class="card-footer bg-white text-body text-right">
    <div class="row">
        <div class="col-sm-4"><span style="font-size: 15px;">
          <?php 
            $sql1="SELECT COUNT(id) AS kids FROM `islamicvacationcourse_tbl` WHERE category ='0-5 years'";
            $result=$conn->query($sql1);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="kidslist.php"><span class="badge bg-success text-light font-weight-bolder"> 0-5 Years:</span> <?php echo $row['kids']; ?></a>
        </div>
        <div class="col-sm-3"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS junior FROM `islamicvacationcourse_tbl` WHERE category ='Junior Secondary School'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="juniorsecstudentslist.php"><span class="badge bg-success text-light font-weight-bolder"> JS Class: </span> <?php echo $row['junior']; ?></a>
        </div>
        <div class="col-sm-4"><span style="font-size: 15px;">
          <?php 
            $adult="SELECT COUNT(id) AS child FROM `islamicvacationcourse_tbl` WHERE category ='Primary School'";
            $result=$conn->query($adult);
            $result=$row=$result->fetch_assoc()  
          ?>
           <a href="primarystudentslist.php"><span class="badge bg-primary text-light font-weight-bolder">Primary School:</span> <?php echo $row['child']; ?></a>
        </div>
      </div>
      <div class="row" style="font-size: 15px;">
        <?php 
            $sql="SELECT COUNT(id) AS total FROM `islamicvacationcourse_tbl`WHERE `category` IN ('Kids', 'Junior Secondary School', 'Primary School')";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <div class="col-sm-12" style="text-align: center;">
            <a href="childrenlist.php"><span class="badge bg-info text-light font-weight-bolder">Total:</span> <?php echo $row['total']; ?></a>
          </div>
      </div>
    </div>
  </div>
  <div class="card bg-info text-white">
    <div class="card-body text-left">
      <h6 class="card-text ">Type</h6>
    </div>
    <div class="card-footer bg-white text-body text-right">
    <div class="row">
        <div class="col-sm-5"><span style="font-size: 15px;">
          <?php 
            $sql1="SELECT COUNT(id) AS national FROM `islamicvacationcourse_tbl` WHERE type ='national'";
            $result=$conn->query($sql1);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="nationalivclist.php"><span class="badge bg-success text-light font-weight-bolder"> National IVC:</span> <?php echo $row['national']; ?></a>
        </div>
        <div class="col-sm-5"><span style="font-size: 13px;">
          <?php 
            $sql="SELECT COUNT(id) AS zonal FROM `islamicvacationcourse_tbl` WHERE type ='zonal'";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <a href="zonalivclist.php"><span class="badge bg-success text-light font-weight-bolder"> Zonal IVC: </span> <?php echo $row['zonal']; ?></a>
        </div>
      </div>
      <div class="row" style="font-size: 15px;">
        <?php 
            $sql="SELECT COUNT(id) AS total FROM `islamicvacationcourse_tbl`";
            $result=$conn->query($sql);
            $result=$row=$result->fetch_assoc()  
          ?>
          <div class="col-sm-12" style="text-align: center;">
            <a href="applicantlist.php"><span class="badge bg-info text-light font-weight-bolder">Total:</span> <?php echo $row['total']; ?></a>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
  document.getElementById("main").style.marginLeft = "200px";
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

    


    