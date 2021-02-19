<?php

    include "dbConn.php";

    if(isset($_POST['upload'])){
        $target = "images/" . basename($_FILES['image']['name']);


        $image = $_FILES['image']['name'];
        $text = $_POST['descript'];

        $query1 = "INSERT INTO imagesupload (imageUploaded, imageDescript) VALUES ('$image', '$text')";
        mysqli_query($conn, $query1);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            echo "successfully uploaded";
        }
        else {
            echo "unsuccessful upload!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    #content{
        width: 50vw;
        height: 20vh;
        margin: 10vh auto;
    }
    .ups-img{
        width: 100px;
        height: 50px;
    }

    </style>
</head>
<body>
    <div id="content">
        <form action="upload_img_to_db.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="text" name="descript">
            <input type="submit" name="upload" value="upload image">
        </form>
    </div>
    <?php
        include "dbConn.php";
        $query2 = "SELECT * FROM imagesupload";
        $result = mysqli_query($conn, $query2);

        while($row = mysqli_fetch_array($result)){
            echo "<div class='img-div'>";
                echo "<img class='ups-img' src='images/" . $row['imageUploaded'] . "'>";
                echo"<p>" . $row['imageDescript'] . "</p>";
            echo "</div>";
        }
    ?>
</body>
</html>