<?php
    session_start();

    $username = $_SESSION['userName'];
    $tbnum = $_POST['table-number'];
    $orders =  $_POST['orders'];
    $amount = $_POST['amount'];

    include "dbConnect.php";


    $query1 = "INSERT INTO order_queue (userName, tableNumber, orderDescript, orderTtlAmount, orderStatus) VALUES ('$username','$tbnum','$orders','$amount', 'Queued')";
    if(mysqli_query($conn, $query1)){ // get the variable from dbConn.php and the query variable
        header("location:order_receipt.php?tbnum=$tbnum&orders=$orders&amount=$amount"); // redirects to all records page
        exit;
    }
    else {
        echo 'MySQL Error: Table not found!'; // output if unsuccessful
    }
?>