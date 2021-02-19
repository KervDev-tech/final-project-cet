<?php

// wala lang tong file pre practice lang hahahaha

$conn = mysqli_connect('localhost','root','','proj_proto_db');
if(mysqli_connect_error()){
    echo 'MySQL Error: ' . mysqli_connect_error(); // error if not connected to database
}
else{
    $query = "SELECT * FROM person";
    $result = mysqli_query($conn,$query);
    if ($result){
        while($row = mysqli_fetch_row($result)){
            echo $row[0]. ' ',$row[1] . ' ',$row[2] . '<br>';
        }
        mysqli_free_result($result);
    }mysqli_close($conn);
}
?>


