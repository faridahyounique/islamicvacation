
<?php 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<center>
<body>
<script>
function myFunction() {
  var x, text;

  // Get the value of the input field with id="numb"
  x = document.getElementById("username").value;

  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x)) {
    text = "";
  } else {
    text = "Please enter your username";
  }
  document.getElementById("username1").innerHTML = text;
}
</script>
    <div class="container">
            <div class="nav justify-content-center  rounded">
            <h1 class="text-success">Islamic Vacation Course</h1>
            </div>
          
                <header>Admin Login Here</header>
                <form action="login.php" method="POST" class="ml-2 mt-2">
                <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
            <div class="col-sm-4 col-sm-offset-4">
                <div class="row">
                    <div class="ml-2 mt-2"> 
                    <div class="form-group">
                        <label class="">Username/Email Address:</label>
                        <input type="text" class="form-control" placeholder="" id="username" name="username">
                        <span id="username1"></span>
                    </div>
                    </div> 
                    </div>
                    <div class="row">
                    <div class="ml-2 mt-2"> 
                    <div class="form-group">
                        <label class="">Password:</label>
                        <input type="password" class="form-control" placeholder="" id="password" name="password">
                    </div>
                    </div> 
                    </div>
                <div class="row">
               <div class="ml-2 mt-2">
                    <button type="submit" class="btn btn-primary w-80" name="submit" onclick="myFunction()">Sign In</button>
                </div>
                </div>  
                </div>       
</body>
</center>

</html>


  