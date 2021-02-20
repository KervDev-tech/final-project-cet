<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foods | Dashboard</title>
    <link rel="stylesheet" href="src/css/display-foods-design.css">
    <link rel="stylesheet" href="src/css/scrollbar-design.css">
    <script src="https://kit.fontawesome.com/88ac38dcb9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Paytone+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="nav">
        <div class="nav-items">
            <div class="logo-name">
                <i class="fas fa-utensils"></i>
                Ordering System
            </div>
            <div class="nav-list">
                <span class="admin-name">
                    <?php
                    if (isset($_SESSION['adminName'])) {
                            echo "<i class='fas fa-user-shield'></i> Welcome Admin " . $_SESSION['adminName'];
                    }
                    else{
                            header("location:admin_login.php?s=failed");
                            exit;
                    }
                    ?>
                </span>
                <a href="admin_cms_dashboard.php" class="links">Home</a>
                <a href="logout_admin.php" class="links">Sign out</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="heading">
            <a href = "display_admin.php" class="heading-name">
                Admin Accounts
            </a>
            <a href = "display_users.php" class="heading-name">
                Customer Accounts
            </a>
            <a href = "display_foods.php" class="heading-name">
                Food Items
            </a>
            <a href = "display_history.php" class="heading-name">
                Order History
            </a>
        </div>
        <div class="container">
            <?php

            include "dbConnect.php";

            if(isset($_POST['upload'])){
                $target = "images/" . basename($_FILES['image']['name']);


                $image = $_FILES['image']['name'];
                $foodName = $_POST['foodname'];
                $foodDescript = $_POST['fooddescript'];
                $foodPrice = $_POST['foodprice'];
                $foodCatgry = $_POST['foodcategory'];

                $query1 = "INSERT INTO fooditems (foodIMG, foodName, foodDescript, foodPrice, foodCatgry) VALUES ('$image', '$foodName', '$foodDescript', '$foodPrice', '$foodCatgry')";
                mysqli_query($conn, $query1);

                if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                    echo "<script>alert('Uploaded Successfully!'); </script>";
                }
                else {
                    echo "<script>alert('Upload Failed!'); </script>";
                }
            }

            ?>
            <form action="display_foods.php" method="post" enctype="multipart/form-data" class="div-form">
                <input type="file" class="action" name="image">
                <input type="text" name="foodname" placeholder="food name">
                <input type="text" name="fooddescript" placeholder="food description">
                <input type="number" name="foodprice" placeholder="food price">
                <input type="text" name="foodcategory" placeholder="food category">
                <input type="submit" class="action" name="upload" value="upload image">
            </form>
            <div class="food-cards">
                <div class="card">
                    <div class="food-img">
                        Food Image
                    </div>
                    <div class="food-name">
                        Food Name
                    </div>  
                    <div class="food-description">
                        Food Description
                    </div>
                    <div class="food-price">
                        Food Price
                    </div>
                    <div class="food-category">
                        Food Category
                    </div>
                    <div class="action-perform">
                        Actions
                    </div>
                </div>
                <?php
                    $query = "SELECT * FROM fooditems"; 
                    $result = mysqli_query($conn,$query);

                    if ($result){
                        while($row = mysqli_fetch_array($result)){ 
                
                            echo '<div class="card">';
                                echo '<div class="img-container">' . '<img class="ups-img" src="images/' . $row['foodIMG'] . '"></div>';
                                echo '<div class="food-name">' . $row['foodName'] . '</div>';
                                echo '<div class="food-description">' . $row['foodDescript'] . '</div>';
                                echo '<div class="food-price">' . $row['foodPrice'].  '</div>';
                                echo '<div class="food-category">' . $row['foodCatgry'].  '</div>';
                                echo '<div class="action-perform">';
                                        echo '<a class="action" href="update_food.php?id=' . $row['FoodID'] . '">Edit</a>';
                                        echo '<a class="action" href="delete_food.php?id=' . $row['FoodID'] . '">Delete</a>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
                <div class="card">
                    <div class="img-container">
                        <img class="ups-img" src="" alt="">
                    </div>
                    <div class="food-name">
                        Adobo
                    </div>  
                    <div class="food-description">
                        Masarap ulala
                    </div>
                    <div class="food-price">
                        69
                    </div>
                    <div class="food-category">
                        Soup
                    </div>
                    <div class="action-perform">
                        <a href="" class="action">Edit</a>
                        <a href="" class="action">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>