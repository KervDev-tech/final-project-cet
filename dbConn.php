<?php
    // the connection code to determine if connected to db

    $conn = mysqli_connect('localhost','root','','proj_proto_db');
    // $conn is the query variable 
    // mysqli_connect('localhost','root','','proj_proto_db') is the buil in function of mysql to connect to our db
    // 'proj_proto_db' is the name of our db
    if(mysqli_connect_error()){ // returns a boolean if the argument is true or false 

        //mysqli_connect_error() it a built in function of mysql to determine if connection was successful or not

        echo 'MySQL Error: ' . mysqli_connect_error();
        echo "<br>";
        die('Could not connect to MySQL server.'); // close the connecttion from our db
    }
?>