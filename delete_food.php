<?php

include "dbConnect.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from fooditems where FoodID = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:display_foods.php"); // redirects to all records page
    exit;	
}
else
{
    echo "alert('Error deleting record')"; // display error message if not delete
}
?>