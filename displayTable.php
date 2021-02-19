<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border='1'>
            <thead>
            <td>ID</td>
            <td>USERNAME</td>
            <td>EMAIL</td>
            <td>PASSWORD</td>
            <td>Date Created</td>
            </thead>
<?php

    include "dbConn.php"; //DB connection

    $query = "SELECT * FROM users"; // $query is the query variable, "SELECT * FROM users" is our query
    $result = mysqli_query($conn,$query);
    //$result is our query connection varibale to determine or db connection

    if ($result){ // returns boolean if the connection from our db is successful or not
        while($row = mysqli_fetch_array($result)){ // mysqli_fetch_array($result) gets the data from our db, $row is whre we store the datas we get from our db
?>
            <tr> 
                <td><?php echo $row['UserID']; ?></td> <!-- $row['UserID']  is one of the column from our table -->
                <td><?php echo "$row[userName]"; ?></td> <!-- different type lang to pre ng pag call out ng column -->
                <td><?php echo "$row[userEmail]"; ?></td> 
                <td><?php echo "$row[3]"; ?></td> <!-- pwede rin ganto pre kung pang ilan yung column na gusto natin i display -->
                <td><?php echo "$row[4]"; ?></td>
                <td><a href="update.php?id=<?php echo $row['UserID']; ?>">Edit</a></td> <!-- eto pre kukunin yung UserID sa db para gawing query string tas malipat sa ibang webpage -->
                <td><a href="delete.php?id=<?php echo $row['UserID']; ?>">Delete</a></td><!-- same lang din dito -->
            </tr>
            <?php
        }
    }
?>
<a href="insertData.html">Create account</a>
</table>
</body>
</html>