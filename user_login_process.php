<?php
    session_start();

    $useremail = $_POST['userEmail'];
    $userpass =  $_POST['userPass'];

    include "dbConnect.php";

    $query1 = "SELECT * from users where userEmail = '$useremail' and userPass = '$userpass' ";  
    $result = mysqli_query($conn, $query1);
    
    $row = mysqli_fetch_array($result);

    if($row['userEmail'] == $useremail && $row['userPass'] == $userpass){
        mysqli_close($conn); // Close connection
        // header("location:admin_cms_dashboard.php?s=$adminname"); // redirects to all records page
        $_SESSION['userName'] = $row['userName'];
        header("location:ordering_menu.php");
        exit;
    }
    else{
        mysqli_close($conn); // Close connection
        header("location:user_login.php?s=failed"); // redirects to all records page
        exit;
    }

?>