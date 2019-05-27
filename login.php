<?php

session_start() ;


$user = 'root';
$password = 'root';
$db = 'Restaurant';
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

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if($_POST["email"] != '' && $_POST["password"] != '')
  {
    $username = $_POST["email"];
    $password = $_POST["password"];
    $check_username = "SELECT * FROM Customer WHERE email_id = '$username'";
    $rs_username = mysqli_query($conn,$check_username);
    if ( mysqli_num_rows ($rs_username) == 1 )
        { while($row = $rs_username->fetch_assoc()) {
            $_SESSION['customer_id'] =  $row["customer_id"];
          }
    header('Location:menu.php');
          
    }
        else
      header('Location:login.html');
    
  }
  else
    header('Location:login.html');
    

}
?>
  