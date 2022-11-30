<?php 
session_start();
include 'connect_database.php';

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $print_list='';
    $print_main ='';
    $i =0;
    $sql="SELECT * FROM `islamicvacationcourse_tbl` WHERE `volunteer`= 'yes'";
    $counter='';
    if ($result = $conn->query($sql)) {
        $counter=$counter++;     
        while ($row = $result->fetch_assoc()) {
            $i++;
            $print_list .='
                <tr>
                    <td>' .$i. '</td>
                    <td>' .$row['Surname']. '</td>
                    <td>' .$row['firstname']. '</td>
                    <td>' .$row['middlename']. '</td>
                    <td>' .$row['gender']. '</td>
                    <td>' .$row['volunteer2']. '</td>
                </tr>
            ';
        }
    }
    else{
        echo "Sql Error [' . $conn->error . ']'";
    }
    $print_main .= '
    <h3 text-center>LIST OF PREVIOUS VOLUNTEERS</h3>
                    <table>
                        <thead>
                            <tr>
                                <th> S/N</th>
                                <th>Surname</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Gender</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>'
                            .$print_list.
                        '</tbody>
                    </table>   
    ';
    ?>
<!DOCTYPE html>
<html>
  <head>
  <title>LIST OF PREVIOUS VOLUNTEERS</title>
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
  font-size: 20px;
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
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="applicantslist.php">Applicants List</a>
  <a href="volunteers.php">Volunteers</a>
  <a href="previousvolunteers.php">Previous Volunteers</a>
  <a href="logout.php">Logout</a>
</div>

<div id="main">
    <span style="font-size:16px;cursor:pointer" onclick="openNav()">&#9776;  <div class="container">
        <div class="nav justify-content-center  rounded">
              <h1 class="text-success">LIST OF PREVIOUS VOLUNTEERS</h1>
        </div>
        <div class="row">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
       <th> S/N</th>
        <th>NAME</th>
        <th>GENDER</th>
        <th>DEPARTMENT</th>
        </thead>   
    <tr class="table table-bordered table-hover table-info">
        <?php
            include 'connect_database.php';
            $i =0;
            $sql="SELECT * FROM `islamicvacationcourse_tbl` WHERE `volunteer`= 'yes'";
            $counter='';
            if ($result = $conn->query($sql)) {
                $counter=$counter++;     
              
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    $id = $row['id'];
                    
                    ?>
                    
                    <tbody>
                                      
                    <tr>
                        <td class="profile"><?php echo $i; ?></td>
                        <td class="profile"><?php echo $row['Surname']. ' '.$row['firstname']. ' '.$row['middlename']; ?></td>
                        <td class="profile"><?php echo $row['gender']; ?></td>
                        <td class="profile"><?php echo $row['volunteer2']; ?></td>
                        <?php
                }
            }
            else{
                echo "No record found ['.$conn->error.']'";
            }

            
            
        ?>
                </tr>
                </tbody>
          </table>
                <?php echo $_SESSION['name']; ?> 
            </span>
</div>
<div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="PrintDiv();">Print</button>
             <button type="button" class="btn btn-primary" ><a class="text-white" href="home.php">Back </a></button>
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
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>




<div id="divToPrint" style="display:none;">
  <div style="width:200px;height:300px;background-color:teal;">
  <?php echo $print_main; ?>     
  </div>
</div>
</html>
<?php 
}else{

     header("Location: index.php");

     exit();

}

 ?>