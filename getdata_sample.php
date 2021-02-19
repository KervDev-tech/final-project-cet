<?php

    $data =  $_POST['mydata'];
    $orders = $_POST['orders'];
    echo "the data: " . $data;
    
    $ArrLength = count($orders);

    for($a=0; $a<$ArrLength; $a++)
    {
    echo $orders[$a];
    echo '<br>';
    }


?>