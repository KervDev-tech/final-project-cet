<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="src/css/signup-design.css">
    <script src="https://kit.fontawesome.com/88ac38dcb9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        if (isset($_GET['s'])) {
            if($_GET['s'] == "failed"){
                echo"<script>alert('Signup failed')</script>";
            }
            else if($_GET['s'] == "EmailAlreadyTaken"){
                echo"<script>alert('Signup failed, email alraedy taken')</script>";
            }
            else{
                echo"<script>alert('Signup Successful')</script>";
            }
        } 
    ?>
    <div class="container">
        <div class="image-container">
            <img class="bg-img" src="src/img/bg_img_2.jpg" alt="">
        </div>
        <div class="signup-container">
            <div class="nav-signup">
                <div class="logo-name">
                    <i class="fas fa-utensils"></i>
                    Ordering System
                </div>
                <iv class="nav-list">
                    <div class="goto-login">
                        <p>Already have an account?<a href="user_login.php" class="nav-item">Login</a></p>
                    </div>
                </iv>
            </div>
            <div class="signup-form">
                <div class="signup-head">
                    <h1>Sign up.</h1>
                </div>
                <form action="user_signup_process.php" method="post">
                    <div class="input-fields">
                        <label for="userName" class="input-label">Enter your Name</label>
                        <input class="user-input" type="text" name="userName" id="userName">
                    </div>
                    <div class="input-fields">
                        <label for="userEmail" class="input-label">Enter your Email: <p class="validate" id="emailE"></p></label>
                        <input class="user-input" type="email" name="userEmail" id="userEmail" onchange="ValidateEmail()">
                    </div>
                    <div class="input-fields">
                        <label for="userPass" class="input-label">Password</label>
                        <input class="user-input" type="password" name="userPass" id="userPass">
                    </div>
                    <div class="input-fields">
                        <label for="ReuserPass" class="input-label">Re-enter your password: <p class="validate" id="retypeP"></p></label>
                        <input class="user-input" type="password" name="ReuserPass" id="ReuserPass" onchange="rePass()">
                    </div>
                    <div class="btn">
                        <input class="signup-btn" type="submit" value="Sign up" id="btn-signup" onfocus="rePass()">
                    </div>
                </form>
                <a href="admin_login.php" class="team-name">
                    Kerv | Dom
                </a>
            </div>
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
        var s = document.getElementById("userPass");
        var s1 = document.getElementById("ReuserPass");
        var result = document.getElementById("retypeP");
        function rePass() {
            var x = s.value;
            var y = s1.value;
            var outcome = x.localeCompare(y);
            var r = "";
            if (outcome == -1) {
                r = 'Password didnt match!';
                document.getElementById("btn-signup").disabled = true;
            } 
            else if (outcome == 0) {
                r = 'Password match!';
                document.getElementById("btn-signup").disabled = false;
            } 
            else {
                r = 'Password didnt match!';
                document.getElementById("btn-signup").disabled = true;
            }
            retypeP.innerHTML = r;
        }
    </script>
</body>
</html>