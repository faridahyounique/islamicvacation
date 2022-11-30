<?php 
    session_start();
    include 'config/connect_database.php';
    $fullname=$institution=$volunteer=$volunteer3=$volunteer4=''; 
    if(isset($_POST['save_family']))
    {
        //$pId=$_POST['id'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $zone = $_POST['zone'];
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $street = $_POST['street'];
        $town = $_POST['town'];
        $localgovernment = $_POST['localgovernment'];
        $state = $_POST['state'];
        $nextofkin = $_POST['nextofkin'];
        $contactofnextofkin = $_POST['contactofnextofkin'];
        // $email = $_POST['email'];
        $relationship = $_POST['relationship'];
        $family_email = $_POST['family_email'];
        $category = $_POST['category'];
        $institution = $_POST['institution'];
        $volunteer = $_POST['volunteer'];
        $volunteer = $_POST['volunteer'];
        if(isset($_POST['volunteer2'])){
            $volunteer2 =$_POST['volunteer2'];
        }
        else{
            $volunteer2 ="";
        }
        $volunteer3 =$_POST['volunteer3'];
        if(isset($_POST['volunteer4'])){
          $volunteer4 =$_POST['volunteer4'];
      }
      else{
          $volunteer4 ="";
      }
      if(isset($_POST['aspect'])){
          $aspect =$_POST['aspect'];
      }
      else{
          $aspect ="";
      }
      if(isset($_POST['aspect2'])){
          $aspect2 =$_POST['aspect2'];
      }
      else{
          $aspect2 ="";
      }

        $sql ="INSERT INTO `islamicvacationcourse_tbl` (title,type,zone,surname,firstname, middlename,phonenumber,email,gender, street,town,localgovernment,state,nextofkin,contactofnextofkin,relationship,category,institution,volunteer,volunteer2,volunteer3,volunteer4,aspect,aspect2, family_email, attached_family) VALUES('$title','$type','$zone','$surname','$firstname', '$middlename','$phonenumber', 'See family email', '$gender', '$street','$town','$localgovernment','$state','$nextofkin','$contactofnextofkin','$relationship','$category','$institution','$volunteer','$volunteer2','$volunteer3','$volunteer4','$aspect','$aspect2', '$family_email', 'Neutral')";
        if(mysqli_query($conn, $sql)){
          $update = "UPDATE islamicvacationcourse_tbl SET attached_family = 'Yes', no_of_attached_family = (no_of_attached_family+1) WHERE email='$family_email'";
          if(mysqli_query($conn, $update)){
            $_SESSION['message']= "Data submitted successfully";
            $_SESSION['msg_type']= "success";
            //echo "Data submitted successfully";
          }
          else{
            $_SESSION['message']= "Record not successfuly updated' .[$conn->error].'";
            $_SESSION['msg_type']= "warning";
          }
        }
        else{
            $_SESSION['message']= "Family application not successful' .[$conn->error].'";
            $_SESSION['msg_type']= "danger";
        }
        
    }
   
?>
<!DOCTYPE html>
<html>
<head>
  <title>Islamic Vacation Course</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
    <center><img src="mssnlogo2.jpg" class="rounded" alt="Cinque Terre" width="100" height="100"></center>
        <div class="container">
            <div class="nav justify-content-center rounded">
              <h4 class="text-success">Islamic Vacation Course (Other Family Members Registration)</h4>
          </div>
          <?php if(isset($_SESSION['message'])): ?>
            <div class="w-100 sufee-alert alert with-close alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show">
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?><br>
        <div class="nav justify-content-center rounded bg-danger">
        <h5 class="text-light font-weight-bolder">Add a Family Member!</h5>
          </div>
          <center><div class="row">
              <form class="col-sm-8 ml-5" method="POST" action="family.php">
                  <div class="row">
                      <div class="col-sm-5"> 
                        <div class="form-group">
                          <label class="">Enter Your Email Address:</label>
                          <input type="email" class="form-control" placeholder="" id="email" name="participant_email">
                        </div>
                      </div> 
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class=""></label><br>
                          <button type="submit" name="search_participant" class="btn btn-primary btn-rounded">Search</button>
                        </div>
                      </div>
                    </div>
              </form>
              <?php 
                  if(isset($_POST['search_participant'])){
                    $participant = $_POST['participant_email'];
                    $sql="SELECT * FROM islamicvacationcourse_tbl WHERE email = '$participant'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) != 1) {
                      $fullname= "No record matches your email";?>
                      <span><br><strong><?php echo $fullname; ?></strong></span>
                <?php }
                    else{
                      $row = mysqli_fetch_assoc($result);
                      $fullname = $row['firstname']. ' '.$row['middlename']. ' '.$row['Surname'];               

              ?>
              <span style="color: red;"><br><strong><?php echo $fullname; ?></strong></span>
            </div>
          </center>
            <style>
              /* #details{
                display:none;
              } */
            </style>
            <form action="family.php" method="POST" class="ml-2 mt-2">
              <input type="hidden" name="type" value="<?php echo $row['type']?>">
              <input type="hidden" name="zone" value="<?php echo $row['zone']?>">
              <input type="hidden" name="family_email" value="<?php echo $row['email']?>">
              <input type="hidden" name="nextofkin" value="<?php echo $row['nextofkin']?>">
              <input type="hidden" name="contactofnextofkin" value="<?php echo $row['contactofnextofkin']?>">
              <input type="hidden" name="relationship" value="<?php echo $row['relationship']?>">
              <input type="hidden" name="state" value="<?php echo $row['state']?>">
              <input type="hidden" name="localgovernment" value="<?php echo $row['localgovernment']?>">
              <input type="hidden" name="town" value="<?php echo $row['town']?>">
              <input type="hidden" name="street" value="<?php echo $row['street']?>">
              <input type="hidden" name="type" value="<?php echo $row['type']?>">
              <input type="hidden" name="zone" value="<?php echo $row['zone']?>">
              <div class="row">
                  <div class="col-sm-2"> 
                    <div class="form-group" id="title" required>
                      <label class="">Title:</label>
                      <select class="form-control" id="title" name="title">
                                  <option value="" selected >Select title</option>
                                  <option value="Alhaji">Alhaja</option>
                                  <option value="Alhaja">Alhaji</option>
                                  <option value="Dr.">Dr.</option>
                                  <option value="Engr">Engr.</option>
                                  <option value="Sheikh">Sheikh</option>
                                  <option value="Ustadh">Ustadh</option>
                                  <option value="Brother">Brother</option>
                                  <option value="Sister">Sister</option>
                             </select>
                    </div>
                  </div> 
              </div>
              <div class="row">
                <div class="col-sm-4"> 
                  <div class="form-group">
                    <label class="">Surname:</label>
                    <input type="text" class="form-control" placeholder="" id="surname" name="surname"  id="numb" required>
                  </div>
                </div> 
                <div class="col-sm-4"> 
                  <div class="form-group">
                    <label class="">First Name:</label>
                    <input type="text" class="form-control" placeholder="" id="firstname" name="firstname" required>
                  </div>
                </div> 
                <div class="col-sm-4"> 
                  <div class="form-group">
                    <label class="">Middle Name:</label>
                    <input type="text" class="form-control" placeholder="" id="middlename" name="middlename" required>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-sm-4"> 
                  <div class="form-group">
                    <label class="">Phone Number:</label>
                    <input type="number" class="form-control" placeholder="" id="phonenumber" name="phonenumber" required>
                  </div>
                </div> 
                <div class="col-sm-4"> 
                  <label class="form-check-inline" >Gender:</label><br>
                  <label class="btn btn-default mx-3">Male &nbsp; &nbsp; &nbsp; 
                    <input type="radio"id="gender" name="gender"  value="Male" required> 
                  </label>
                  <label class="btn btn-default mx-1">Female                                                 
                    <input   type="radio" id="gender" name="gender"  value="Female" required> 
                  </label>   
                </div> 
               <div class="col-sm-4"> 
                  <div class="form-group">
                  <label class="">Relationship:</label>
                    <Select class="form-control" id="relationship" name="relationship" required>
                        <option value="" selected disabled> Choose</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Husband">Husband</option>
                        <option value="Wife">Wife</option>
                        <option value="Brother"> Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Child">Child</option>
                    </select>
                  </div>
                </div>
              </div>
        <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                  <label class="">Category:</label>
                  <Select class="form-control" id="category" name="category" onchange='checkIfYes()' required>
                      <option value="" selected disabled> Choose</option>
                      <option value="Kids"> 0-5 years</option>
                      <option value="Primary School"> Primary School</option>
                      <option value="Junior Secondary School"> Kids</option>
                      <option value="Senior Secondary School">Senior Secondary School</option>
                      <option value="Higher Institution">Higher Institution</option>
                      <option value="Other Adults">Other Adults</option>
                  </select>
              </div>
            </div> 
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="form-check-inline" >Have you ever volunteered on Camp?:</label><br>
                    <label class="btn btn-default mx-3">Yes &nbsp; &nbsp; &nbsp; 
                      <input type="radio" name="volunteer" id="volunteer"  value="Yes" onclick='checkIfYes1()' required> 
                    </label>
                    <label class="btn btn-default mx-1">No                                                 
                      <input   type="radio" name="volunteer" id="volunteer" value="No" onclick='checkIfYes2()' required> 
                    </label>   
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="form-check-inline" >Will you be willing to volunteer during the upcoming program?:</label><br>
                    <label class="btn btn-default mx-3">Yes &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="volunteer3" id="volunteer3"  value="Yes" onclick='checkIfYes3()' required> 
                      </label>
                    <label class="btn btn-default mx-1">No                                                 
                        <input   type="radio" name="volunteer3" id="volunteer3" value="No" onclick='checkIfYes4()' required> 
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group" id="inst" style="display:none;">
                <label class="">Institution:</label>
                <input type="text" class="form-control" placeholder=" " id="institution" name="institution">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group" id="dept" style="display:none;">
                <label class="">Please indicate the department:</label>
                <Select class="form-control" id="volunteer2" name="volunteer2">
                  <option value="" selected disabled> Choose</option>
                  <option value="Environmental">Environmental</option>
                  <option value="Kitchen">Kitchen</option>
                  <option value="Medical assistant"> Medical Assistant</option>
                  <option value="Public relations">Public Relations</option>
                  <option value="Tutoring">Tutoring</option>
                </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group" id="dept2" style="display:none;">
                <label class="">Please indicate the department you want to volunteer for:</label>
                <Select class="form-control" id="volunteer4" name="volunteer4">
                    <option value="" selected disabled> Choose</option>
                    <option value="environmental">Environmental</option>
                    <option value="kitchen">Kitchen</option>
                    <option value="medical assistant"> Medical Assistant</option>
                    <option value="publicrelations">Public Relations</option>
                    <option value="tutors">Tutoring</option>
                </select>
            </div>
          </div>
        </div>
        <div class="row">
              <div class="col-sm-4">
                  
                </div>
                <div class="col-sm-4">
                  <div class="form-group" id="aspect" style="display:none;">
                      <label class="">Please input the aspect you volunteered for:</label>
                      <input type="text" class="form-control" placeholder=" " id="aspect" name="aspect">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group" id="aspect2" style="display:none;">
                      <label class="">Please input the aspect you want to volunteer for:</label>
                      <input type="text" class="form-control" placeholder=" " id="aspect2" name="aspect2">
                  </div>
                </div>
              </div>
        
          <center><button type="submit" name="save_family" class="btn btn-primary btn-rounded" >Save</button></center>
              
      </div>
    </form>
  <?php }} ?>
    </div>          
    </div>
        <script>      
                function checkIfYes() {
                    if (document.getElementById('category').value != 'Other Adults' ) {
                      document.getElementById('inst').style.display = '';
                      // document.getElementById('auth_by').disabled = false;
                      // document.getElementById('desc').disabled = false;
                    } else {
                      document.getElementById('inst').style.display = 'none';
                }
              }
              
              function checkIfYes1() {
                    if (document.getElementById('volunteer').value = 'Yes' ) {
                      document.getElementById('dept').style.display = '';
                      document.getElementById('aspect').style.display = '';
                      // document.getElementById('desc').disabled = false;
                    } else {
                      document.getElementById('dept').style.display = 'none';
                }
              }

              function checkIfYes2() {
                    if (document.getElementById('volunteer').value = 'No' ) {
                      document.getElementById('dept').style.display = 'none';
                      document.getElementById('aspect').style.display = 'none';
                      // document.getElementById('desc').disabled = false;
                    } else {
                      document.getElementById('dept').style.display = '';
                }
              }
              
              function checkIfYes3() {
                    if (document.getElementById('volunteer3').value = 'Yes' ) {
                      document.getElementById('dept2').style.display = '';
                      document.getElementById('aspect2').style.display = '';
                      // document.getElementById('desc').disabled = false;
                    } else {
                      document.getElementById('dept2').style.display = 'none';
                }
              }
              function checkIfYes4() {
                    if (document.getElementById('volunteer3').value = 'No' ) {
                      document.getElementById('dept2').style.display = 'none';
                      document.getElementById('aspect2').style.display = 'none';
                      // document.getElementById('desc').disabled = false;
                    } else {
                      document.getElementById('dept2').style.display = '';
                }
              }
        </script>
  </body>
</html>