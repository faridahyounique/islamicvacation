<?php
    session_start();
    require 'connect_database.php';
    if(isset($_POST['submit']))
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
        $relationship = $_POST['relationship'];
        $email = $_POST['email'];
        $category = $_POST['category'];
        $institution = $_POST['institution'];
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
        $surname1 = ucwords($surname);
        $sql ="INSERT INTO `islamicvacationcourse_tbl` (title,type,zone,surname,firstname, middlename,phonenumber,gender, street,town,localgovernment,state,nextofkin,contactofnextofkin,relationship,email,category,institution,volunteer,volunteer2,volunteer3,volunteer4, attached_family,aspect,aspect2) VALUES('$title','$type','$zone','$surname','$firstname', '$middlename','$phonenumber','$gender', '$street','$town','$localgovernment','$state','$nextofkin','$contactofnextofkin','$relationship','$email','$category','$institution','$volunteer','$volunteer2','$volunteer3','$volunteer4','No','$aspect','$aspect2')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['message']= "Data submitted successfully!";
            $_SESSION['msg_type']= "success";
            //echo "Data submitted successfully";
            header('location:../index.php');
        }
        else{
            echo "Data not submitted' .[$conn->error].'";
        }
    }

   
?>