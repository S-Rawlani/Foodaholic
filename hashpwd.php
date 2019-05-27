<?php
session_start(); 

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

$username = $_POST['name'];
$password = $_POST['password']; 
 
$username = mysql_real_escape_string($username);
$query = "SELECT customer_id, customer_name, password, salt FROM Customer WHERE customer_name = '$username';";
$result = mysqli_query ($conn,$query);
if($result->num_rows == 0) // User not found. So, redirect to login_form again.
{
  header('Location: login.html');
  exit();
} 

$userData = mysqli_fetch_array($result, MYSQL_ASSOC);

$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
mysqli_close($con);

if($hash != $userData['password']) // Incorrect password. So, redirect to login_form again.
{
  header('Location: login.html');
  exit();
}else{ // Redirect to home page after successful login.
  
  session_regenerate_id(); //recommended since the user session is now authenticated
  $_SESSION['sess_user_id'] = $userData['id'];
  $_SESSION['sess_username'] = $userData['username'];
  session_write_close();
  header('Location: signUp.php');
}
?>
