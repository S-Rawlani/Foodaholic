<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Restaurant: Food Ordering</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


      <style type="text/css">
  .header
{
   background: #f4f4f4;
   border-bottom:#ccc 3px solid;
}

.h5
{
  background: #f4f4f4;
   border-bottom:#ccc 3px solid;
}

.container
{
   width: :700px;
   margin: 30px auto;
   text-align:left;
}

body
{
  text-align: left;
  font-size: 18px;
  font-family: sans-serif;

}

#form
{
  border: 2px solid black;
}

#password
{
  padding-right: 238px;
  background: #f4f4f4;
}


.form-group input
{
    background: #f4f4f4;
  padding: 12px;
  margin:15px;
  align-items: left;
}
  </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
  </head>

  
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">Foodaholic<small></small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
            <li class="nav-item"><a href="cart2.php" class="nav-link">Cart</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>  
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
             <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
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
$time = date("h:1:sa");
$date = date("Y-m-d");
//$actual_time = strtotime("+30 minutes", strtotime($time));

$sql = "INSERT INTO TrackOrder(order_id, order_date, order_time, status) VALUES ('1234','$date','$time','Ordered')"; 

//echo $actual_time;
$cust_id = $_SESSION['customer_id'];

if ($conn->query($sql) === TRUE) {
    echo "<div class='control-label col-sm-2 text-warning'>Order Placed Successfully</div>";
} else {
    echo "<div class='control-label col-sm-2 text-warning'>Cart is Empty</div>";
}

$sql = "DELETE from Cart where order_id = 1234 and customer_id = '$cust_id'";

$result = mysqli_query($conn, $sql);
/*
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully from Cart";
} else {
    echo "Error deleting record: " . $conn->error;
}*/


//echo "Order Placed";



mysqli_close();


?>
</body>
</html>
