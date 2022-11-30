<?php
session_start();
require 'connect_database.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
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
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.ekitistate.gov.ng';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aosasona@ekitistate.gov.ng';                     //SMTP username
            $mail->Password   = 'akprofman@1203';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('swiftdispatch@gmail.com', 'ISLAMIC VACATION COURSE');
            $mail->addAddress($email);     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Islamic Vacation Course Registration';
            $mail->Body    = 'Yippee! We are test running our application';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_SESSION['message']= "Infomation has been sent your email";
            $_SESSION['msg_type']= "success";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            die();
        }
        // $_SESSION['message']= "Data submitted successfully";
        // $_SESSION['msg_type']= "success";
        //echo "Data submitted successfully";
        header('location:../index.php');
    }
    else{
        $_SESSION['message']= "Data not submitted".[$conn->error];
        $_SESSION['msg_type']= "danger";
        //echo "Data submitted successfully";
        header('location:../index.php');
        //echo "Data not submitted' '";
    }
}