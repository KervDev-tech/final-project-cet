<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link rel="stylesheet" href="src/css/order-receipt.css">
    <script src="https://kit.fontawesome.com/88ac38dcb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <fieldset>
            <legend>
                <div class="logo-name">
                    <i class="fas fa-utensils"></i>
                    Ordering System
                </div>
            </legend>
            <div class="section-header">
                <span class="order-message">
                    <?php 
                        echo "Your order will be served soon " . $_SESSION['userName'] . "! Please wait while your order is being prepared, it may take some time.";
                    ?>
                </span>
            </div>
            <hr class="line-break">
            <div class="section-receipt">
                <span class="order-receipt">
                    <div class="cust-name">
                        <span class="heading">
                            Customer Name: 
                        </span>
                        <?php 
                            echo $_SESSION['userName'];
                        ?>
                    </div>
                    <div class="table-number">
                        <span class="heading">
                            Table No.
                        </span>
                        <?php 
                            echo $_GET['tbnum'];
                        ?>   
                    </div>
                    <div class="total-orders">
                        <span class="heading">
                            Total Orders:
                        </span>
                        <?php 
                            echo $_GET['orders'];
                        ?>
                    </div>
                    <div class="total-amount">
                        <span class="heading">
                            Total Amount:
                        </span>
                        <?php 
                            echo "$" . $_GET['amount'];
                        ?>
                    </div>
                    <div class="date-of-order">
                        <span class="heading">
                            Order Datetime: 
                        </span>
                        <?php 
                            date_default_timezone_set('Asia/Manila');
                            $timezone = date('Y/m/d H:i:s');
                            echo $timezone;
                        ?>
                    </div>
                </span>
            </div>
        </fieldset>
        <div class="action-choice">
            <a href="logout_user.php" class="logout-link">Logout</a>
            <a href="ordering_menu.php" class="re-order-link">Order Again</a>
        </div>
        <div class="bottom-nav">
            <a href="#" class="soc-links"><i class="fab fa-facebook-square"></i></a>
            <a href="#" class="soc-links"><i class="fab fa-twitter-square"></i></a>
            <a href="#" class="soc-links"><i class="fab fa-instagram-square"></i></a>
            <p class="team-name">
                Kerv | Dom
            </p>
        </div>
    </div>
</body>
</html>