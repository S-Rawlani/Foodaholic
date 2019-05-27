</!DOCTYPE html>
<html lang="en">
<head>
  <title>login.php</title>
  <meta name="viewpoint" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<?php

session_start();
$order_id = $Status ="";


if (empty($_POST["order_id"])|| empty($_POST["Status"])) {
    header( "Location:item_status.html" ) ;
    exit();
  } 


$user = 'root';
$password = 'root';
$db = 'restaurant';
$host = 'localhost';
$port = 3306;

$conn = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db,
   $port
);


if (!$conn){

  echo "Connection failed!";
  exit;

}

$order_id = $_POST["order_id"];

$Status =$_POST["Status"];

// $category_id="SELECT category_id FROM category WHERE category_name='$Category'"
// echo "$category_id";

$sql="UPDATE trackorder SET status='$Status' WHERE order_id='$order_id'"; 

if ($conn->query($sql) === TRUE) {
    header( "Location:admin_menu.php" ) ;
} else {
    echo "Error" . $conn->error;
}

mysqli_close();
?>








</body>
</html>