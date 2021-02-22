<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="src/css/cms_dashboard-design.css">
    <script src="https://kit.fontawesome.com/88ac38dcb9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="nav">
        <div class="nav-items">
            <div class="logo-name">
                <i class="fas fa-utensils"></i>
                <a href="user_login.php">Ordering System</a>
            </div>
            <div class="nav-list">
                <span class="admin-name">
                    <?php
                       if (isset($_SESSION['adminName'])) {
                            echo "<i class='fas fa-user-shield'></i> Welcome Admin " . $_SESSION['adminName'];
                       }
                       else{
                            header("location:admin_login.php?s=failed"); // redirects to all records page
                            exit;
                       }
                    ?>
                </span>
                <a href="live_orders.html" class="links">Goto Live Orders</a>
                <a href="admin_cms_dashboard.php" class="links">Home</a>
                <a href="logout_admin.php" class="links">Sign out</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="heading">
            Admin Dashboard
        </div>
        <div class="container">
            <a href="display_admin.php"class="card">
                <div class="img-container">
                    <i class="fas fa-user-lock"></i>
                </div>
                <div class="card-name">
                    Admin Accounts
                </div>
            </a>
            <a href="display_users.php" class="card">
                <div class="img-container">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-name">
                    Customer Accounts
                </div>
            </a>
            <a href = "display_foods.php"class="card">
                <div class="img-container">
                    <i class="fas fa-hamburger"></i>
                </div>
                <div class="card-name">
                    Food Items
                </div>
            </a>
            <a href="display_orders.php" class="card">
                <div class="img-container">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="card-name">
                    Order History
                </div>
            </a>
        </div>
    </div>
</body>
</html>