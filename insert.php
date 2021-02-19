<?php

// get and display inputs through query string from inserData.html
echo 'Submit value: ' . $_POST['submit'] . '<br>';
echo 'Username value: ' . $_POST['userName'] . '<br>';
echo 'Email value: ' . $_POST['userEmail'] . '<br>';
echo 'Password value: ' . $_POST['userPass'] . '<br>';


include "dbConn.php"; //DB connection


//sql command "$query1" is the query variable (the "INSERT INTO" is built in funtion of mysql to insert data to db)
$query1 = "INSERT INTO users (userName, userEmail, userPass) VALUES ('$_POST[userName]','$_POST[userEmail]','$_POST[userPass]')";
// "users" it the name of the table from db
// (userName, userEmail, userPass) is the name of the column from the table 
// VALUES ('$_POST[userName]','$_POST[userEmail]','$_POST[userPass]')" is the values that we get from query string will going to input into db
if(mysqli_query($conn, $query1)){ // get the variable from dbConn.php and the query variable
    echo 'Record added successfully!'; // output if the query is successfuly executed
}
else {
    echo 'MySQL Error: Table not found!'; // output if unsuccessful
} 

?>
