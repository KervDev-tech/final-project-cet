<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            text-decoration: none;
            box-sizing: border-box;
        }
        .container{
            width: 500px;
            height: inherit;
            margin: 30vh auto 0 auto;
            padding: 2em;
            text-align: center;
            background: rgb(255,255,255, 0.2);
            z-index: 1;
            backdrop-filter: blur(40px);
            border: solid 2px transparent;
            background-clip: padding-box;
            box-shadow: 2px 2px 5px rgba(46, 54, 68, 0.3);
        }
        .form-div{
            display: grid;
            grid-template-columns: (2,1fr);
            grid-gap: 10px;
        }
        label{
            text-align: left;
            font-size: 1.2em;
            font-weight: bold;
        }
        input{
            height: 30px;
            padding: 1em;
        }
    </style>
</head>
<body>

    <?php

        include "dbConnect.php"; // our db connection 

        $id = $_GET['id']; // eto na yung nakuhang id string galing sa displayTable.php pre

        $query = "SELECT * FROM fooditems WHERE FoodID='$id'"; //hahanapin yung row kung saan nasasatisfy yung nakuha nating id

        $result = mysqli_query($conn,$query); //$result is our query connection varibale to determine or db connection

        $data = mysqli_fetch_array($result); // mysqli_fetch_array($result) gets the data from our db, $data is whre we store the datas we get from our db

        if(isset($_POST['update'])) // when click on Update button, isset() build in func na sa php kung may laman na yung textbox
        {
            //get the query string from the input field below
            $foodname = $_POST['foodName'];
            $fooddescript = $_POST['foodDescript'];
            $foodprice = $_POST['foodPrice'];
            $foodcatgry = $_POST['foodCatgry'];

                //debug lang pre kung nagana yung pag kuha ng data hahahah
            
            //eto pre same pinapasok lang natin yung mga nakuhang query string kung san sila dapat ilagay na column at row na may given na id
            $query2 = "update fooditems set foodName='$foodname', foodDescript='$fooddescript', foodPrice='$foodprice', foodCatgry = '$foodcatgry'  where FoodID='$id'";
            $edit = mysqli_query($conn,$query2); //mag return kung successful yung connection sa db
            
            if($edit) //returns bool kung successful yung pag update natin sa db
            {
                mysqli_close($conn); // Close connection
                header("location:display_foods.php"); // redirects to all records page
                exit;
            }
            else
            {
                echo "Update Failed!";
                echo "MY SQL Error: " . mysqli_error($conn);//build it funtciton to display error message
            }    	
        }

        ?>

    <div class="container">
        <h3>Update Data</h3>
            <form class="form-div" method="POST" >
            <label for="foodName">Food Name</label>
            <input type="text" name="foodName" value="<?php echo $data['foodName'] ?>" placeholder="Enter name" Required>
            
            <label for="foodDescript">Food Description</label>
            <input type="text" name="foodDescript" value="<?php echo $data['foodDescript'] ?>" placeholder="Enter description" Required>
            
            <label for="foodPrice">Food Price</label>
            <input type="number" name="foodPrice" value="<?php echo $data['foodPrice'] ?>" placeholder="Enter price" Required>

            <label for="foodCatgry">Food Category</label>
            <input type="text" name="foodCatgry" value="<?php echo $data['foodCatgry'] ?>" placeholder="Enter category" Required>
            
            <input type="submit" name="update" value="Update">
            </form>
    </div>

</body>
</html>


