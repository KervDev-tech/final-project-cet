<?php
    session_start();

    $adminname = $_POST['adminName'];
    $adminpass =  $_POST['adminPass'];

    include "dbConnect.php";

    $query1 = "SELECT * from admins where adminName = '$adminname' and adminPass = '$adminpass' ";  
    $result = mysqli_query($conn, $query1);
    
    $row = mysqli_fetch_array($result);

    if($row['adminName'] == $adminname && $row['adminPass'] == $adminpass){
        mysqli_close($conn); // Close connection
        // header("location:admin_cms_dashboard.php?s=$adminname"); // redirects to all records page
        $_SESSION['adminName'] = $adminname;
        header("location:admin_cms_dashboard.php");
        exit;
    }
    else{
        mysqli_close($conn); // Close connection
        header("location:admin_login.php?s=failed"); // redirects to all records page
        exit;
    }

?>