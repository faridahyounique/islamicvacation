<?php
if(isset($_POST['register']))
    {
       // echo "Success";
       $PersonalId= $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];    
    
    $sql ="INSERT INTO users (username, password) VALUES('$username', '$password')";
    if(mysqli_query($conn, $sql)){
        // echo "Data submitted successfully";
        header('location:index.php');
    }
    else{
        echo "Data not submitted' .[$conn->error].'";
    }
    }
    ?>