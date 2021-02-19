<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include "dbConn.php"; // our db connection 

$id = $_GET['id']; // eto na yung nakuhang id string galing sa displayTable.php pre

$query = "SELECT * FROM users WHERE UserID='$id'"; //hahanapin yung row kung saan nasasatisfy yung nakuha nating id

$result = mysqli_query($conn,$query); //$result is our query connection varibale to determine or db connection

$data = mysqli_fetch_array($result); // mysqli_fetch_array($result) gets the data from our db, $data is whre we store the datas we get from our db

if(isset($_POST['update'])) // when click on Update button, isset() build in func na sa php kung may laman na yung textbox
{
    //get the query string from the input field below
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

        //debug lang pre kung nagana yung pag kuha ng data hahahah
    echo $_POST['username'];
    echo $_POST['email'];
    echo $_POST['password'];
    
    //eto pre same pinapasok lang natin yung mga nakuhang query string kung san sila dapat ilagay na column at row na may given na id
    $query2 = "update users set userName='$username', userEmail='$email', userPass='$password'  where UserID='$id'";
    $edit = mysqli_query($conn,$query2); //mag return kung successful yung connection sa db
	
    if($edit) //returns bool kung successful yung pag update natin sa db
    {
        mysqli_close($conn); // Close connection
        header("location:displayTable.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "Update Failed!";
        echo "MY SQL Error: " . mysqli_error($conn);//build it funtciton to display error message
    }    	
}

?>

<h3>Update Data</h3>

<form method="POST" >
  <input type="text" name="username" value="<?php echo $data['userName'] ?>" placeholder="Enter Username" Required>
  <input type="text" name="email" value="<?php echo $data['userEmail'] ?>" placeholder="Enter Email" Required>
  <input type="text" name="password" value="<?php echo $data['userPass'] ?>" placeholder="Enter Password" Required>
  <input type="submit" name="update" value="Update">
</form>

</body>
</html>


