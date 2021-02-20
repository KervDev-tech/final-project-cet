<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="src/css/admin-login.css">
    <script src="https://kit.fontawesome.com/88ac38dcb9.js" crossorigin="anonymous"></script>
</head>
<body>
        <?php
            if (isset($_GET['s'])) {
                if($_GET['s'] == "failed"){
                    echo"<script>alert('Login failed')</script>";
                }
                else{
                    echo"<script>alert('Login Succ')</script>";
                }
            } 
        ?>
    <div class="container">
        <div class="img-container">
            <img src="src/img/bg_sili.jpg" alt="" class="img-bg">
        </div>
        <div class="login-form-container">
            <div class="logo-admin">
                <i class="fas fa-user-shield"></i>
            </div>
            <form class="login-form" action="admin_login_process.php" method="post">
                <label for="adminName" class="input-label">Name</label>
                <input type="text" name="adminName" id="adminName" class="admin-input">
                <label for="adminPass" class="input-label">Password</label>
                <input type="password" name="adminPass" id="adminPass" class="admin-input">
                <input type="submit" class="admin-btn" value="LOGIN">
            </form>
        </div>
    </div>
</body>
</html>