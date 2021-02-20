<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/css/login-design.css">
    <script src="https://kit.fontawesome.com/88ac38dcb9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Paytone+One&display=swap" rel="stylesheet">
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
        <div class="login-container">
            <div class="nav-login">
                <div class="logo-name">
                    <i class="fas fa-utensils"></i>
                    Ordering System
                </div>
                <div class="nav-list">
                    <a href="#" class="nav-item">Home</a>
                    <a href="#" class="nav-item">About Us</a>
                </div>
            </div>
            <div class="login-form">
                <div class="login-head">
                    <h1>Log in.</h1>
                </div>
                <form action="user_login_process.php" method="post">
                    <div class="input-fields">
                        <label for="userEmail" class="input-label">Email: <p class="validate" id="emailE"></p></label>
                        <input type="email" name="userEmail" id="userEmail" class="user-input" onchange="ValidateEmail()">
                    </div>
                    <div class="input-fields">
                        <label for="userPass" class="input-label">Password</label>
                        <input type="password" name="userPass" id="userPass" class="user-input">
                    </div>
                    <div class="forgot-pass">
                        <a href="#" class="forgot">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="btn">
                        <input type="submit" name="login" value="Login" class="login-btn">
                    </div>
                    <div class="create-acc">
                        Doesnt have an Account?
                        <a href="user_signup.php" class="goto-create">
                            Sign up!
                        </a>
                    </div>
                </form>
            </div>
            <div class="social-links">
                <hr class="vert-line">
                <a href="#" class="links"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="links"><i class="fab fa-twitter-square"></i></a>
                <a href="#" class="links"><i class="fab fa-instagram-square"></i></a>
                <hr class="vert-line">
            </div>
        </div>
        <div class="image-container">
            <img class="bg-img"src="src/img/bg-img-1.jpg" alt="">
            <p class="team-name">
                Kerv | Dom
            </p>
        </div>
    </div>
    <script>
        function ValidateEmail() {
            var mail = document.getElementById("userEmail").value;
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (mail.match(mailformat)) {
                emailE.innerHTML = ("Valid email address!");
            }
            else {
                emailE.innerHTML = ("You have entered an invalid email address!");
            }
        }
    </script>
</body>

</html>