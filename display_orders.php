<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | Dashboard</title>
    <link rel="stylesheet" href="src/css/display-orders-design.css">
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

                $query = "SELECT * FROM order_queue"; 
                $result = mysqli_query($conn,$query);
            ?>
            <table>
            <tr>
                <th>Food ID</th>
                <th>Customer Name</th>
                <th>Table Number</th>
                <th>Orders</th>
                <th>Amount</th>
                <th>Order Datetime</th>
                <th>Status</th>
            </tr>
            <?php
                if ($result){
                    while($row = mysqli_fetch_array($result)){ 
            ?>
            <tr> 
                <td> <?php echo $row['OrderID']; ?></td> 
                <td> <?php echo $row['userName']; ?></td> 
                <td> <?php echo $row['tableNumber']; ?></td>
                <td> <?php echo $row['orderDescript']; ?></td>
                <td> <?php echo $row['orderTtlAmount']; ?></td>
                <td> <?php echo $row['orderAccDate']; ?></td>
                <td> <?php echo $row['orderStatus']; ?></td>
            </tr>
            <?php
                    }
                }
            ?>
            </table>
        </div>
    </div>
</body>
</html>