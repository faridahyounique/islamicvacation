<?php 
session_start();
include 'connect_database.php';

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $print_list='';
    $print_main ='';
    $i =0;
    $sql="SELECT * FROM islamicvacationcourse_tbl ORDER BY surname ASC";
    $counter='';
    if ($result = $conn->query($sql)) {
        $counter=$counter++;     
        while ($row = $result->fetch_assoc()) {
            $i++;
            $print_list .='
                <tr>
                    <td>' .$i. '</td>
                    <td>' .$row['type']. '</td>
                    <td>' .$row['title']. '</td>
                    <td>' .$row['Surname']. '</td>
                    <td>' .$row['firstname']. '</td>
                    <td>' .$row['middlename']. '</td>
                    <td>' .$row['phonenumber']. '</td>
                    <td>' .$row['gender']. '</td>
                    <td>' .$row['category']. '</td>
                </tr>
            ';
        }
    }
    else{
        echo "Sql Error [' . $conn->error . ']'";
    }
    $print_main .= '
                    <h3 text-center>LIST OF APPLICANTS</h3>
                        <table>
                        <thead>
                            <tr>
                                <th> S/N</th>
                                <th>Title</th>
                                <th>Surname</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>phonenumber</th>
                                <th>Gender</th>
                                <th>Category</th>
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
  <title>LIST OF APPLICANTS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="nav justify-content-center  rounded">
             <h1 class="text-success">LIST OF APPLICANTS</h1>
        </div>
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th> S/N</th>
                                <th>Title</th>
                                <th>Surname</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>phonenumber</th>
                                <th>Gender</th>
                                <th>Category</th>
                    </tr>
                </thead> 
                <tbody>  
                    <tr class="table table-bordered table-hover table-info">
                        <?php
                            include 'connect_database.php';
                            $i =0;
                            $sql="SELECT * FROM islamicvacationcourse_tbl ORDER BY surname ASC";
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
                                        <td class="profile"><?php echo $row['Surname']; ?></td>
                                        <td class="profile"><?php echo $row['firstname']; ?></td>
                                        <td class="profile"><?php echo $row['middlename']; ?></td>
                                        <td class="profile"><?php echo $row['phonenumber']; ?></td>
                                        <td class="profile"><?php echo $row['gender']; ?></td>
                                        <td class="profile"><?php echo $row['category']; ?></td>
                                        <td class="profile" style="text-align: center;">
                                        </td>
                                        <td class="profile">
                                            <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg-<?php echo $id?>">View</button>
                                        </td>
                                    </tr>
                                    <!--modal begin-->
                                <div class="modal fade bd-example-modal-lg-<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Applicant's Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-sm-3">
                                                        Name:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['Surname']. ' '.$row['firstname']. ' '.$row['middlename']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-sm-3">
                                                    Phone Number:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['phonenumber']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        Gender:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['gender']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        Contact Address:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['street']. ', '.$row['town'].', '.$row['localgovernment'].', '.$row['state'].' State'; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    Next of Kin:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['nextofkin']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        Contact of Next of Kin:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['contactofnextofkin']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        Email:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['email']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    State:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['state']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    Category:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['category']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    Institution:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['institution']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    Have you ever volunteered on Camp?:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['volunteer']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    If yes, please indicate the department:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['volunteer2']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    Will you be willing to volunteer during the upcoming program?:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['volunteer3']; ?>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    Department volunteering for:
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php echo $row['volunteer4']; ?>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
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
</div>
            <div class="modal-footer">
             <button type="button" class="btn btn-success" onclick="PrintDiv();">Print</button>
             <button type="button" class="btn btn-primary" ><a class="text-white" href="home.php">Exit </a></button>
        </div>
        </div>
</body>
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('width=100%,height=100%');
       popupWin.document.open('width=100%,height=100%');
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>




<div id="divToPrint" style="display:none;">
  <div>
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