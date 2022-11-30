<?php 

session_start(); 

include "connect_database.php";

if (isset($_POST['submit'])) {

    //if(empty($_POST['username']) || empty($_POST['password'])) {

       // header("Location: index.php?error=Neither Email nor Password can be null");
        //exit();

    //}
    //else{
        $username = $_POST['username'];

        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: home.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: home.php?error=Incorect User name or password");

            exit();

        }

    //}

}