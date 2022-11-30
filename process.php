<?php
    session_start();
    require 'connect_database.php';
    if(isset($_POST['submit']))
    {
        //$pId=$_POST['id'];
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
            $sql ="INSERT INTO `family_tbl` (id,surname,firstname, middlename,phonenumber,gender) VALUES('$id','$surname','$firstname', '$middlename','$phonenumber','$gender')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['message']= "Data submitted successfully";
            $_SESSION['msg_type']= "success";
            //echo "Data submitted successfully";
            header('location:family.php');
        }
        else{
            echo "Data not submitted' .[$conn->error].'";
        }
    }

   
?>