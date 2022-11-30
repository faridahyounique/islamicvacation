<?php 
include 'connect_database.php';
    $print_list='';
    $print_main ='';
    $i =0;
 //$family_email = $_GET['family_email'];
 $sql= "SELECT * FROM islamicvacationcourse_tbl WHERE family_email IS NOT NULL"; 
if ($result = $conn->query($sql)) {
    $i='';     
    while ($row = $result->fetch_assoc()) {
        $i++;
        // $name = $row['Surname'].' '.$row['firstname']. ' '.$row['middlename'];
        // echo $i." ".$name."<br>";
    
    $print_list .='
    <tr>
        <td>' .$i. '</td>
        <td>' .$row['Surname']. '</td>
        <td>' .$row['firstname']. '</td>
        <td>' .$row['middlename']. '</td>
       <td>' .$row['gender']. '</td>
       <td>' .$row['volunteer2']. '</td>
       <td>' .$row['volunteer4']. '</td>
    </tr>
';
}
}
else{
echo "Sql Error [' . $conn->error . ']'";
}
$print_main .= '
<h3 text-center>LIST OF FAMILY MEMBERS</h3>
        <table>
            <thead>
                <tr>
                    <th> S/N</th>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Gender</th>
                    <th>past volunteer</th>
                    <th>present volunteer</th>
                    
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
<title>LIST OF FAMILY MEMBERS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<div class="container">
<div class="nav justify-content-center  rounded">
  <h1 class="text-success">LIST OF FAMILY MEMBERS</h1>
</div>
<div class="row">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
<th> S/N</th>
<th>NAME</th>
<th>GENDER</th>
<th>PRINCIPAL APPLICANT EMAIL</th>
<th>VOLUNTEER</th>
    </thead>   
<tr class="table table-bordered table-hover table-info">
<?php
include 'connect_database.php';
$i =0;
$sql= "SELECT * FROM islamicvacationcourse_tbl WHERE family_email IS NOT NULL"; 
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
            <td class="profile"><?php echo $row['family_email']; ?></td>
            <td class="profile"><?php echo $row['volunteer4']; ?></td>
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
 <button type="button" class="btn btn-primary" ><a class="text-white" href="applicantlist.php">Back </a></button>
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

?>
