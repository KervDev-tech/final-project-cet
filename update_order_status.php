<?php

    include "dbConnect.php";

        $id = $_GET['id']; // eto na yung nakuhang id string galing sa displayTable.php pre

            
            //eto pre same pinapasok lang natin yung mga nakuhang query string kung san sila dapat ilagay na column at row na may given na id
			
            $query = "update order_queue set orderStatus = 'Delivered' where OrderID = '$id'";
            $edit = mysqli_query($conn,$query); //mag return kung successful yung connection sa db
            
            if($edit) //returns bool kung successful yung pag update natin sa db
            {
                header("location:live_orders.html"); // redirects to all records page
				exit;
            }
            else
            {
                echo "Update Failed!";
                echo "MY SQL Error: " . mysqli_error($conn);//build it funtciton to display error message
            }    	
?>