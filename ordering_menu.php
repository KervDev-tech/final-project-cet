<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/css/ordering-menu.css">
    <link rel="stylesheet" href="src/css/scrollbar-design.css">
    <script src="store.js" async></script>
    <script src="https://kit.fontawesome.com/88ac38dcb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Paytone+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="top-nav" id="top-nav">
        <div class="logo-name">
            <i class="fas fa-utensils"></i>
            Ordering System
        </div>
        <div class="nav-list">
            <a href="#top-nav" class="links">Home</a>
            <a href="#" class="links">About Us</a>
            <a href="logout_user.php" class="links">Log out</a>
        </div>
        <div class="cust-name">
            <?php
               if (isset($_SESSION['userName'])) {
                    echo "Welcome " . $_SESSION['userName'];
               }
               else{
                    header("location:user_signup.php?s=failed"); // redirects to all records page
                    exit;
               }
            ?>
            <i class="fas fa-user"></i>
        </div>
    </div>
    <div class="content">
        <div class="side-nav">
            <div class="side-nav-container">
                <div class="logo-n-name">
                    <i class="fas fa-utensils"></i>
                    <br>
                    PUP CEA Canteen Ordering System
                </div>
                <div class="side-nav-list">
                    <a class="side-nav-items">Menu</a>
                    <a href="#Soup-section" class="side-nav-items">Soup</a>
                    <a href="#Pasta-section" class="side-nav-items">Pasta</a>
                    <a href="#Pizza-section" class="side-nav-items">Pizza</a>
                    <a href="#Appetizzers-section" class="side-nav-items">Appetizzers</a>
                    <a href="#Salad-section" class="side-nav-items">Salad</a>
                    <a href="#Beverages-section" class="side-nav-items">Beverages</a>
                    <a href="#Desserts-section" class="side-nav-items">Desserts</a>
                </div>
            </div>
            <div class="side-nav-footer">
                <a href="#" class="soc-links"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="soc-links"><i class="fab fa-twitter-square"></i></a>
                <a href="#" class="soc-links"><i class="fab fa-instagram-square"></i></a>

                <p class="team-name">
                    Kerv | Dom
                </p>
            </div>
        </div>
        <div class="menu">
            <section class="container content-section">
                <?php

                include "dbConnect.php"; 

                $query = "SELECT * FROM fooditems WHERE foodCatgry = 'Soup'"; 
                $result = mysqli_query($conn,$query);

                ?>
                <h2 class="section-header" id="Soup-section">Soup</h2>
                <div class="shop-items">
                <?php
                    if ($result){
                        while($row = mysqli_fetch_array($result)){ 
                ?>
                <div class = "shop-item">  
                    <div class="shop-img-container">
                        <?php echo '<img class="shop-item-image" src="images/' . $row['foodIMG'] . '">'?>
                    </div>
                    <span class="shop-item-title"> <?php echo $row['foodName']; ?></span>
                    <div class="dropdown">
                        <span class="shop-item-descript" >MORE INFO</span>
                        <div class="dropdown-content">
                            <p><?php echo $row['foodDescript']; ?></p>
                        </div>
                    </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row['foodPrice']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
                <?php

                include "dbConnect.php"; 

                $query2 = "SELECT * FROM fooditems WHERE foodCatgry = 'Pasta'"; 
                $result2 = mysqli_query($conn,$query2);

                ?>
                <h2 class="section-header" id="Pasta-section">Pasta</h2>
                <div class="shop-items">
                <?php
                    if ($result2){
                        while($row2 = mysqli_fetch_array($result2)){ 
                ?>
                <div class = "shop-item">  
                    <div class="shop-img-container">
                        <?php echo '<img class="shop-item-image" src="images/' . $row2['foodIMG'] . '">'?>
                    </div>
                    <span class="shop-item-title"> <?php echo $row2['foodName']; ?></span>
                    <div class="dropdown">
                        <span class="shop-item-descript" >MORE INFO</span>
                        <div class="dropdown-content">
                            <p><?php echo $row2['foodDescript']; ?></p>
                        </div>
                    </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row2['foodPrice']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
                <?php

                $query3 = "SELECT * FROM fooditems WHERE foodCatgry = 'Pizza'"; 
                $result3 = mysqli_query($conn,$query3);

                ?>
                <h2 class="section-header" id="Pizza-section">Pizza</h2>
                <div class="shop-items">
                <?php
                    if ($result3){
                        while($row3 = mysqli_fetch_array($result3)){ 
                ?>
                <div class = "shop-item">  
                    <div class="shop-img-container">
                        <?php echo '<img class="shop-item-image" src="images/' . $row3['foodIMG'] . '">'?>
                    </div>
                    <span class="shop-item-title"> <?php echo $row3['foodName']; ?></span>
                    <div class="dropdown">
                        <span class="shop-item-descript" >MORE INFO</span>
                        <div class="dropdown-content">
                            <p><?php echo $row3['foodDescript']; ?></p>
                        </div>
                    </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row3['foodPrice']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
                <?php

                $query4 = "SELECT * FROM fooditems WHERE foodCatgry = 'Appetizzers'"; 
                $result4 = mysqli_query($conn,$query4);

                ?>
                <h2 class="section-header" id="Appetizzers-section">Appetizzers</h2>
                <div class="shop-items">
                <?php
                    if ($result4){
                        while($row4 = mysqli_fetch_array($result4)){ 
                ?>
                <div class = "shop-item">  
                    <div class="shop-img-container">
                        <?php echo '<img class="shop-item-image" src="images/' . $row4['foodIMG'] . '">'?>
                    </div>
                    <span class="shop-item-title"> <?php echo $row4['foodName']; ?></span>
                    <div class="dropdown">
                        <span class="shop-item-descript" >MORE INFO</span>
                        <div class="dropdown-content">
                            <p><?php echo $row4['foodDescript']; ?></p>
                        </div>
                    </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row4['foodPrice']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
                <?php

                $query5 = "SELECT * FROM fooditems WHERE foodCatgry = 'Salad'"; 
                $result5 = mysqli_query($conn,$query5);

                ?>
                <h2 class="section-header" id="Salad-section">Salads</h2>
                <div class="shop-items">
                <?php
                    if ($result5){
                        while($row5 = mysqli_fetch_array($result5)){ 
                ?>
                <div class = "shop-item">  
                    <div class="shop-img-container">
                        <?php echo '<img class="shop-item-image" src="images/' . $row5['foodIMG'] . '">'?>
                    </div>
                    <span class="shop-item-title"> <?php echo $row5['foodName']; ?></span>
                    <div class="dropdown">
                        <span class="shop-item-descript" >MORE INFO</span>
                        <div class="dropdown-content">
                            <p><?php echo $row5['foodDescript']; ?></p>
                        </div>
                    </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row5['foodPrice']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
                <?php

                $query6 = "SELECT * FROM fooditems WHERE foodCatgry = 'Beverages'"; 
                $result6 = mysqli_query($conn,$query6);

                ?>
                <h2 class="section-header" id="Beverages-section">Beverages</h2>
                <div class="shop-items">
                <?php
                    if ($result6){
                        while($row6 = mysqli_fetch_array($result6)){ 
                ?>
                <div class = "shop-item">  
                    <div class="shop-img-container">
                        <?php echo '<img class="shop-item-image" src="images/' . $row6['foodIMG'] . '">'?>
                    </div>
                    <span class="shop-item-title"> <?php echo $row6['foodName']; ?></span>
                    <div class="dropdown">
                        <span class="shop-item-descript" >MORE INFO</span>
                        <div class="dropdown-content">
                            <p><?php echo $row6['foodDescript']; ?></p>
                        </div>
                    </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row6['foodPrice']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
                <?php

                $query7 = "SELECT * FROM fooditems WHERE foodCatgry = 'Desserts'"; 
                $result7 = mysqli_query($conn,$query7);

                ?>
                <h2 class="section-header" id="Desserts-section">Desserts</h2>
                <div class="shop-items">
                <?php
                    if ($result7){
                        while($row7 = mysqli_fetch_array($result7)){ 
                ?>
                <div class = "shop-item">  
                    <div class="shop-img-container">
                        <?php echo '<img class="shop-item-image" src="images/' . $row7['foodIMG'] . '">'?>
                    </div>
                    <span class="shop-item-title"> <?php echo $row7['foodName']; ?></span>
                    <div class="dropdown">
                        <span class="shop-item-descript" >MORE INFO</span>
                        <div class="dropdown-content">
                            <p><?php echo $row7['foodDescript']; ?></p>
                        </div>
                    </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row7['foodPrice']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
            </section>
        </div>
        <div class="orders-nav">
            <div class="orders-nav-heading">
                List of Orders
            </div>
            <div class="orders-list">
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">ITEM</span>
                    <span class="cart-price cart-header cart-column">PRICE</span>
                    <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                </div>
                <div class="cart-items">

                </div>
            </div>
            <div class="orders-result">
                <div class="orders-compute">
                    <div class="cart-total">
                        <strong class="cart-total-title">Total: </strong>
                        <span class="cart-total-price">$0</span>
                    </div>
                </div>
                <div class="btn-div">
                    <!-- <button class="checkout-btn" value="checkout">
                        Checkout
                    </button> -->
                    <button class="checkout-btn" onclick="document.getElementById('id01').style.display='block'"
                        class="w3-button w3-black">Checkout</button>
                    <div id="id01" class="w3-modal">
                        <div class="w3-modal-content w3-animate-zoom w3-card-4">
                            <span onclick="document.getElementById('id01').style.display='none'"
                                class="w3-button w3-display-topright">&times;</span>
                            <div class="w3-container">
                                <form action="getdata_sample.php" method="post" class="hidden-order-form" onsubmit="return checkform(this)">
                                    <label for="table-number">Please type your Table number: </label>
                                    <input type="number" name="table-number" class="table-number" id="table-number" required>

                                    <label for="amount">Total amout of orders: </label>
                                    <input type="text" name="amount" class="total-amount" id="total-amount" required readonly>
                                    
                                    <label for="orders">Total amout of orders: </label>
                                    <textarea name="orders" class="total-orders" id="total-orders" required readonly>
                                    </textarea>
                                    
                                    <input type="submit" name="submit" value="submit" class="btn-confirm">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function checkform(form) {
                        // get all the inputs within the submitted form
                        var inputs = form.getElementsByTagName('input');
                        for (var i = 0; i < inputs.length; i++) {
                            // only validate the inputs that have the required attribute
                            if(inputs[i].hasAttribute("required")){
                                if(inputs[i].value == ""){
                                    // found an empty field that is required
                                    alert("Please select or choose food items first");
                                    return false;
                                }
                            }
                        }
                        return true;
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html>