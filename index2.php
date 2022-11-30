<?php 
session_start();
include 'config/connect_database.php';
$title=$type=$nationalzone=$zonalzone=$surname=$firstname=$middlename=$phonenumber=$gender=$street=$nextofkin=$contactofnextofkin=$relationship=$email=$category=$institution=$volunteer=$volunteer2=$volunteer3=$volunteer4=$aspect=$aspect2='';
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
  <style>
    legend{
      font-style: italic;
      color: #4dff4d;

    }
    fieldset{
      background-color: #f3f3f3;
    }
  </style>
    <div class="container-fluid">
    <center><img src="mssnlogo2.jpg" class="rounded" alt="Cinque Terre" width="100" height="100"></center>
        <div class="container">
            <div class="nav justify-content-center rounded bg-success">
              <h3 class="text-light font-weight-bolder">2022 Islamic Vacation Course</h3>
          </div>
          <center><h5 class="text-danger">(Registration Form)</h5></center>
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
          <?php endif ?>
    <form action="config/saveform.php" name="myform" method="POST" class="ml-2 mt-5">
              <fieldset class="border p-2">
                  <legend class="w-auto"><h6>Zonal Selection</h6></legend>
                  <div class="row">
                    <div class="col-sm-4"> 
                        <label class="form-check-inline" >Type:</label><br>
                        <label class="btn btn-default mx-3">National &nbsp; 
                            <input type="radio"id="type" name="type"  value="national"  onclick='checkIfzone1()' required>
                        </label>
                        <label class="btn btn-default mx-1">Zonal &nbsp;                                                
                            <input   type="radio" id="type" name="type"  value="zonal"  onclick='checkIfzone1()' required> 
                        </label>   
                    </div>
                    <div class="col-sm-8">
                          <div class="row">
                            <div class="col-sm-6"> 
                              <div class="form-group" id="national" style="display: none;">
                                <label class="">Location:</label>
                                <Select class="form-control" id="national" name="zone" required>
                                  <option value="" selected> Choose</option>
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
                            </div>
                          </div>
                    </div>
                </div>
            </fieldset >
          <fieldset class="border p-2">
              <legend class="w-auto"><h6>Personal Profile</h6></legend>
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
                      <input type="text" class="form-control" placeholder="" id="surname" name="surname" required>
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
                    <label class="form-check-inline" >Gender:</label><br>
                    <label class="btn btn-default mx-3">Male &nbsp; 
                      <input type="radio"id="gender" name="gender"  value="Male" required> 
                    </label>
                    <label class="btn btn-default mx-1">Female &nbsp;                                                 
                      <input   type="radio" id="gender" name="gender"  value="Female" required> 
                    </label>   
                  </div> 
                  <div class="col-sm-4"> 
                    <div class="form-group">
                      <label class="">Phone Number:</label>
                      <input type="text" class="form-control" placeholder="" id="phonenumber" name="phonenumber" required>
                    </div>
                  </div> 
                  <div class="col-sm-4"> 
                    <div class="form-group">
                      <label class="">Email:</label>
                      <input type="email" class="form-control" placeholder="" id="email" name="email" required>
                    </div>
                  </div>
                </div>
            </fieldset>
            <fieldset class="border p-2">
              <legend class="w-auto"><h6>Address</h6></legend>
                <div class="row">
                  <div class="col-sm-3"> 
                    <div class="form-group">
                      <label class="">Street:</label>
                      <input type="text" class="form-control" placeholder="" id="street" name="street" required>
                    </div>
                  </div>
                  <div class="col-sm-3"> 
                    <div class="form-group">
                      <label class="">Town:</label>
                      <input type="text" class="form-control" placeholder="" id="town" name="town" required>
                    </div>
                  </div>
                  <div class="col-sm-3"> 
                    <div class="form-group">
                      <label class="">State:</label>
                      <Select class="form-control" id="state" name="state" id="state" required>
                        <option value="" selected> Choose</option>
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
                  </div> 
                  <div class="col-sm-3"> 
                    <div class="form-group">
                      <label class="">Local Government:</label>
                      <select class="form-control" placeholder="" id="localgovernment" name="localgovernment" required>
                        <option selected disabled>Select State first</option>
                      </select>
                    </div>
                  </div>
                </div>
          </fieldset>
          <fieldset class="border p-2">
            <legend class="w-auto"><h6>Next of Kin</h6></legend>
              <div class="row">
                <div class="col-sm-4"> 
                  <div class="form-group">
                    <label class="">Name:</label>
                    <input type="text" class="form-control" placeholder="" id="nextofkin" name="nextofkin" required>
                  </div>
                </div>
                <div class="col-sm-4"> 
                  <div class="form-group">
                    <label class="">Phone number:</label>
                    <input type="text" class="form-control" placeholder="" id="contactofnextofkin" name="contactofnextofkin" required>
                  </div>
                </div>
                <div class="col-sm-4"> 
                  <div class="form-group">
                    <label class="">Relationship:</label>
                    <Select class="form-control" id="relationship" name="relationship" required>
                        <option value="" selected disabled> Choose</option>
                        <option value="My Brother">My Brother</option>
                        <option value="My Daughter">My Daughter</option>
                        <option value="My Father">My Father</option>
                        <option value="My Husband">My Husband</option>
                        <option value="My Mother">My Mother</option>
                        <option value="My Sister">My Sister</option>
                        <option value="My Son">My Son</option>
                        <option value="My Wife">My Wife</option>
                    </select>
                  </div>
                </div>
              </div>
          </fieldset>
          <fieldset class="border p-2">
            <legend class="w-auto"><h6>Additional Information</h6></legend>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="">Category:</label>
                    <Select class="form-control" id="category" name="category" onchange='checkIfYes()' required>
                      <option value="" selected disabled> Choose</option>
                      <option value="Kids"> 0-5 years</option>
                      <option value="Primary School"> Primary School</option>
                      <option value="Junior Secondary School"> Junior Secondary School</option>
                      <option value="Senior Secondary School">Senior Secondary School</option>
                      <option value="Higher Institution">Higher Institution</option>
                      <option value="Other Adults">Other Adults</option>
                    </select>
                  </div>
                </div> 
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="form-check-inline" >Have you ever volunteered on IVC Camp?:</label><br>
                    <label class="btn btn-default mx-3">Yes &nbsp; 
                      <input type="radio" name="volunteer" id="volunteer"  value="Yes" onclick='checkIfYes1()' required> 
                    </label>
                    <label class="btn btn-default mx-1">No &nbsp;                                                
                      <input   type="radio" name="volunteer" id="volunteer" value="No" onclick='checkIfYes2()' required> 
                    </label>   
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="form-check-inline" >Will you be willing to volunteer during the upcoming IVC Camp?:</label><br>
                    <label class="btn btn-default mx-3">Yes &nbsp;  
                      <input type="radio" name="volunteer3" id="volunteer3"  value="Yes" onclick='checkIfYes3()' required> 
                    </label>
                    <label class="btn btn-default mx-1">No &nbsp;                                              
                      <input   type="radio" name="volunteer3" id="volunteer3" value="No" onclick='checkIfYes4()' required> 
                    </label>
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group" id="inst" style="display:none;">
                      <label class="">Institution:</label>
                      <input type="text" class="form-control" placeholder=" " id="institution" name="institution" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group" id="dept" style="display:none;">
                      <label class="">Please indicate the department:</label>
                      <Select class="form-control" id="volunteer2" name="volunteer2" required>
                        <option value="" selected disabled> Choose</option>
                        <option value="Environmental">Environmental</option>
                        <option value="Kitchen">Kitchen</option>
                        <option value="Medical Assistant"> Medical Assistant</option>
                        <option value="Public Relations">Public Relations</option>
                        <option value="Tutoring">Tutoring</option>
                      </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group" id="dept2" style="display:none;">
                      <label class="">Please indicate the department you want to volunteer for:</label>
                      <Select class="form-control" id="volunteer4" name="volunteer4" required>
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
                      <input type="text" class="form-control" placeholder=" " id="aspect" name="aspect" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group" id="aspect2" style="display:none;">
                      <label class="">Please input the aspect you want to volunteer for:</label>
                      <input type="text" class="form-control" placeholder=" " id="aspect2" name="aspect2" required>
                  </div>
                </div>
              </div>
          </fieldset>
          <button type="submit" class="btn btn-success btn-rounded" >Submit</button>
          <div class="col-sm-4">
              <a href="family.php" class="text-success"><div> Click here to register other members of your family </div></a>
           </div>
      </div>
      <div class="">
      
          <!-- <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="popup()">Preview</button> -->
      </div>
   
</form>
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
              function checkIfzone1() {
                document.getElementById('national').style.display = '';
                document.getElementById('zonal').style.display = 'none';
              }
              function checkIfzone2() {
                  document.getElementById('national').style.display = 'none';
                  document.getElementById('zonal').style.display = '';
              }

             
              
              
              $(document).ready(function() {
                $('#state').on('change', function() {
                  var state = this.value;
                  // window.alert(state_id);
                  console.log(state);
                  $.ajax({
                    url: "selectlga.php",
                    type: "POST",
                    data: {
                      state: state
                    },
                  cache: false,
                  success: function(result){
                      $("#localgovernment").html(result); 
                      // $("#test").html(result); 
                  }
                });
                });  
              
              }); 

            </script>
        </div>
    </div>
  </body>
</html>