<?php
 include '../config/connect_database.php';
if(isset($_GET['view'])){
    $viewid = $_GET['view'];
    $selectsql = "SELECT * FROM islamicvacationcourse_tbl WHERE id='$viewid'";
    if ($result = $conn->query($selectsql)) {
        while ($row = $result->fetch_assoc()) {
            $personalId = $row['id'];
            $surname = $row['surname'];
            $firstname = $row['firstname'];
            $middlename = $row['middlename'];
            $phonenumber = $row['phonenumber'];
            $gender = $row['gender'];
            $contactaddress = $row['contactaddress'];
            $nextofkin = $row['nextofkin'];
            $email = $row['email'];
            $state = $row['state'];
            $category = $row['category'];
            $institution = $row['institution'];
            $volunteer = $row['volunteer'];
            $volunteer2 =$row['volunteer2'];
            $volunteer3 =$row['volunteer3'];
            $volunteer4 = $row['volunteer4'];


        }
    }
}
?>
<div class="table-responsive">
  <table class="table">
   <thead>
    <tr>
    <th>S/N</th>
    <th>Surname </th>
    <th>Firstname</th>
    <th>Middlename</th>
    <th>Date of Birth</th>
    <th>Phone Number</th>
    <th>Gender</th>
    <th>Contact Address</th>
    <th>Next of Kin</th>
    <th>Email</th>
    <th>State</th>
    <th>Category</th>
    <th>Institution</th>
    <th>Have you ever volunteered on Camp?</th>
    <th>Previous Department Volunteered for</th>
    <th>Will you be willing to volunteer on camp this year?</th>
    <th>Department to volunteer for</th>
</tr>
   </thead>
   <tbody>
   <th><?php echo $PersonalId; ?></th>
   <th><?php echo $surname; ?></th>
   <th><?php echo $firstname; ?></th>
   <th><?php echo $middlename; ?></th>
   <th><?php echo $gender; ?></th>
   <th><?php echo $contactaddress; ?></th>
   <th><?php echo $nextofkin; ?></th>
   <th><?php echo $email; ?></th>
   <th><?php echo $state; ?></th>
   <th><?php echo $category; ?></th>
   <th><?php echo $institution; ?></th>
   <th><?php echo $volunteer; ?></th>
   <th><?php echo $volunteer2; ?></th>
   <th><?php echo $volunteer3; ?></th>
   <th><?php echo $volunteer4; ?></th>
   </tbody>
  </table>
</div>
</table>



