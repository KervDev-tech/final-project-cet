<?php
    session_start();

    $username = $_POST['userName'];
    $useremail = $_POST['userEmail'];
    $userpass =  $_POST['userPass'];

    include "dbConnect.php";

    $query = "SELECT * from users where userEmail = '$useremail'";  
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        echo "account already taken";
        mysqli_close($conn); // Close connection
        header("location:user_signup.php?s=EmailAlreadyTaken"); // redirects to all records page
        exit;
    }
    else{
        $query1 = "INSERT INTO users (userName, userEmail, userPass) VALUES ('$username','$useremail','$userpass')";  

        if(mysqli_query($conn, $query1)){
            echo "recorded successfully !";
            $_SESSION['userName'] = $username;
            mysqli_close($conn); // Close connection
            // header("location:admin_cms_dashboard.php?s=$adminname"); // redirects to all records page
            header("location:ordering_menu.php");
            exit;
        }
        else{
            echo"unsuccessful";
            mysqli_close($conn); // Close connection
            header("location:user_signup.php?s=failed"); // redirects to all records page
            exit;
        }
    }

?>