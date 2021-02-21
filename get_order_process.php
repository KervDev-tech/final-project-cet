<?php

    include "dbConnect.php";
	
	$query = "SELECT * FROM order_queue where orderStatus = 'Queued'";
	
	$result = mysqli_query($conn,$query);
	
	if ($result)
	{
		while($row = mysqli_fetch_array($result))
		{
            echo "<div class='table-row'>"
                    . "<div class='column-name'>" . $row['OrderID'] . "</div>" 
                    . "<div class='column-name'>" . $row['userName'] . "</div>" 
                    . "<div class='column-name'>" . $row['tableNumber'] . "</div>"
                    . "<div class='column-name'>" . $row['orderDescript'] . "</div>"
                    . "<div class='column-name'>" . $row['orderTtlAmount'] . "</div>"
                    . "<div class='column-name'>" . $row['orderAccDate'] . "</div>"
                    . "<div class='column-name'>" . $row['orderStatus'] . "</div>"
                    . "<div class='column-name'><a href='update_order_status.php?id=" . $row['OrderID'] . "'>Receive</a></div>"	
            . "</div>";
        }	
		mysqli_free_result($result);
	}	
	mysqli_close($conn);

?>