
<?php 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="nav justify-content-center bg-secondary rounded">
              <h1 class="text-danger">Islamic Vacation Course</h1>
            </div>
                <header>Sign Up</header>
                <form action="saveformm.php" method="POST" class="ml-2 mt-2">
                <div class="row">
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Username/Email Address:</label>
                        <input type="email" class="form-control" placeholder="" id="username" name="username">
                    </div>
                    </div> 
                    </div>
                    <div class="row">
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Firstname:</label>
                        <input type="name" class="form-control" placeholder="" id="firstname" name="firstname">
                    </div>
                    </div> 
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Othernames:</label>
                        <input type="name" class="form-control" placeholder="" id="othernames" name="othernames">
                    </div>
                    </div>
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Phone number:</label>
                        <input type="number" class="form-control" placeholder="" id="phonenumber" name="phonenumber">
                    </div>
                    </div> 
                    </div>
                    <div class="row">
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Address:</label>
                        <input type="address" class="form-control" placeholder="" id="address" name="address">
                    </div>
                    </div>
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">State of Origin:</label>
                        <input type="name" class="form-control" placeholder="" id="stateoforigin" name="stateoforigin">
                    </div>
                    </div> 
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Home Town:</label>
                        <input type="name" class="form-control" placeholder="" id="hometown" name="hometown">
                    </div>
                    </div>  
                    </div>
                    <div class="row">
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Enter Password:</label>
                        <input type="password" class="form-control" placeholder="" id="username" name="password">
                    </div>
                    </div> 
                    <div class="col-sm-4"> 
                    <div class="form-group">
                        <label class="">Enter Password Again:</label>
                        <input type="password" class="form-control" placeholder="" id="password2" name="password2">
                    </div>
                    </div>
                    </div>
                <div class="row">
                <div class="col-sm-4"> 
                    <button type="submit" class="btn btn-primary w-25" name="register">Register</button>
                </div>
                <div>
                </form>
        </div>
    </div>
</body>
</html>

  