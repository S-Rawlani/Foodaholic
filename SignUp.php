</!DOCTYPE html>
<html lang="en">
<head>
  <title>FOODAHOLIC</title>
  <meta name="viewpoint" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<?php

session_start();
$name = $email =$password = "";
$nameErr = $emailErr = "";

if (empty($_POST["name"]) || empty($_POST["password"]) || empty($_POST["email"]) ) {
    header( "Location:SignUp.html" ) ;
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

$name=$_POST['name'];
$email=$_POST['email']; 
$password = $_POST['password'];
$address=$_POST['address'];
$contact=$_POST['contact']; 
$cardnumber = $_POST['cardnumber'];
$expiry = $_POST['expiry'];
//$email = test_input($_POST["email"]);
// if (empty($name)) {
//     echo "Name is required"."<br>";
//   } 
// if(strlen($password) < 6 || empty($password)){
//   echo 'Incorrect Password'."<br>";
// }

// if (empty($email)) {
//     echo "Email is required"."<br>";
//   } 

$random = rand();

$salted = "456y45sdfghfghg".$password."dsfhgfgfd";
$hashed = hash('sha256', $salted);


$select = "SELECT `email_id` FROM `customer` WHERE `email_id` = '$email'";
$result = mysqli_query($conn, $select);
if(mysqli_num_rows($result)) {
    exit('This email is already being used');
}


$sql="INSERT INTO customer(customer_id, customer_name, address, phone, email_id,password,card_number,expiration_date) VALUES ('$random','$name','$address','$contact','$email','$hashed','$cardnumber','$expiry')"; 

if ($conn->query($sql) === TRUE) {
        header( "Location:login.html" ) ;
    } else {
      echo "Error" . $conn->error;
}



mysqli_close();

?>








</body>
</html>