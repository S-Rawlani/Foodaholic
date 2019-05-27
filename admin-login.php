</!DOCTYPE html>
<html lang="en">
<head>
  <title>Restaurant: Food Ordering</title>
  <meta name="viewpoint" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<?php

session_start();
$name = $password = "";


if (empty($_POST["name"]) || empty($_POST["password"]) ) {
    header( "Location:admin-login.html" ) ;
    exit();
  } 


$user = 'root';
$password = 'root';
$db = 'restaurant';
$host = 'localhost';
$port = 8889;

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

$username=$_POST['name'];
$password=$_POST['password']; 
$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'"; 
$query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($query);
// If result matched $username and $password, table row must be 1 row
if($count==1){
  $_SESSION["name"] = $_POST["name"];
  $_SESSION["password"] = $_POST["password"];
   header( "Location:admin_menu.php" ) ;
    exit();

}
else
{
  echo("error");
   header( "Location:admin-login.html" ) ;
    exit();
}

mysqli_close();
?>








</body>
</html>