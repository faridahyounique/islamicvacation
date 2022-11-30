<?php 
session_start();
include 'connect_database.php';

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $print_list='';
    $print_main ='';
    $i =0;
    $sql="SELECT * FROM `islamicvacationcourse_tbl` WHERE `type`= 'national'";
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
                   <td>' .$row['zone']. '</td>
                </tr>
            ';
        }
    }
    else{
        echo "Sql Error [' . $conn->error . ']'";
    }
    $print_main .= '
    <h3 text-center>LIST OF NATIONAL IVC APPLICANTS</h3>
                    <table>
                        <thead>
                            <tr>
                                <th> S/N</th>
                                <th>Surname</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Gender</th>
                                <th>Camp Location</th>
                                
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
  <title>LIST OF NATIONAL IVC APPLICANTS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <div class="container">
   <div class="nav justify-content-center  rounded">
              <h4 class="text-success">LIST OF NATIONAL IVC APPLICANTS</h4>
        </div>
        <center>
            <br><form action="" method="POST">
                    <div class="row">
                   
                        <div class="col-sm-2 font-weight-bolder">Select State</div>
                            <div class="col-sm-3">
                                <Select class="form-control font-weight-bold" id="national" name="state_location" required>
                                    <option value="all_state"> All State</option>
                                    <?php
                                        $sql = "SELECT * FROM states ORDER BY name ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                            while($row = $result->fetch_assoc()) {?>
                                                <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                                    <?php
                                            } 
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" name="fetch_state" class="btn btn-info">Fetch</button>
                            </div>
                    </div>
            </form>
        </center>
        <?php
            if(isset($_POST['fetch_state'])){
                $state = $_POST['state_location'];
                if($state=='all_state'){
        ?>
        <div class="row">
                <center><h5 class="text-success">List of National Applicants From All Camps</h5></center>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
           <th> S/N</th>
            <th>NAME</th>
            <th>GENDER</th>
            <th>CAMP LOCATION</th>
                    </thead>   
        <tr class="table table-bordered table-hover table-info">
            <?php
                //include 'connect_database.php';
                $i =0;
                $sql="SELECT * FROM `islamicvacationcourse_tbl` WHERE `type`= 'national'";
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
                            <td class="profile"><?php echo $row['zone']; ?></td>
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
          <?php      }
          else{ 
            
       ?>
                <div class="row">
               <center><h5 class="text-success">List of National Applicants From <?=$state?> Camp</h5></center> 
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
           <th> S/N</th>
            <th>NAME</th>
            <th>GENDER</th>
            <th>CAMP LOCATION</th>
                    </thead>   
        <tr class="table table-bordered table-hover table-info">
            <?php
                //include 'connect_database.php';
                $i =0;
                $sql="SELECT * FROM `islamicvacationcourse_tbl` WHERE `type`= 'national' AND zone='$state'";
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
                            <td class="profile"><?php echo $row['zone']; ?></td>
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
        <?php 
             
            }       
            ?>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="PrintDiv();">Print</button>
                 <button type="button" class="btn btn-primary" ><a class="text-white" href="home.php">Back </a></button>
            </div>
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
    
         //header("Location: index.php");
    
         exit();
    
    }
    
            }
        ?>
        
       