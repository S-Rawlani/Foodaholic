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

<form action="checkout.php" method="GET">

</form>
  


<?php

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

session_start();

$cust_id = $_SESSION['customer_id'];

$sql = "SELECT TrackOrder.order_id, TrackOrder.order_date, TrackOrder.status FROM TrackOrder, Orders WHERE TrackOrder.order_id = Orders.order_id and Orders.customer_id = '$cust_id' group by Orders.order_id";

$result = mysqli_query($conn, $sql);

echo "<div class='container'>";

echo "<div class='row'>";

//echo "<div class='col-6 text-warning'><h3>Verify your address : </h3></div>";

if ( mysqli_num_rows ($result) == 0 )
  
    echo "<div class='col-6 text-warning'><h3>No Past Orders </h3></div>";

else
{
  echo "<div class='col-6 text-warning'><h3>Your Order History </h3></div>";

  echo "</div>";

  while($row = mysqli_fetch_array($result))
  {

    echo "<div class='row'>";

    echo "<div class='col text-white'><h4>Date Ordered : </h4>".$row["order_date"]."</div>"."<div class='col text-white'><h4>Status : </h4>".$row["status"]."</div>";

    echo "</div>";
  
    $order_id = $row["order_id"];

    $sql2 = "SELECT Orders.item_id, Menu.item_name, Menu.price, Orders.quantity FROM Menu, Orders WHERE Orders.item_id = Menu.item_id and Orders.order_id = '$order_id'";

    $result2 = mysqli_query($conn, $sql2);

    echo "<table class='table text-white'><tr><td>Name</td><td>Price</td><td>Quantity</td><td>";

    while($row = mysqli_fetch_array($result2))
    {
        echo "<div class='row'>";

        echo "<tr><td>". $row["item_name"]."</td><td>". $row["price"] ."</td><td>". $row["quantity"]."</td></tr>";
  
        $order_id = $row["order_id"];
  
        echo "</div>";

    }

    echo "</div>";
      
    echo "</div>";


  }
}

/*

$sql = "SELECT TrackOrder.order_id, TrackOrder.order_date, TrackOrder.status, Orders.item_id, Menu.item_name, Orders.quantity FROM TrackOrder, Orders, Menu WHERE TrackOrder.order_id = '1234' and Orders.order_id = TrackOrder.order_id and Menu.item_id = Orders.item_id  ";

$result = mysqli_query($conn, $sql);

 if ( mysqli_num_rows ($result) == 0 )
  echo "No Orders to display";
else
{  echo "Order History : ";

while($row = mysqli_fetch_array($result)){

  echo "<ul><li>". $row["order_id"]. $row["estimated_deliver_time"] . $row["status"].$row["item_name"].$row["quantity"]."</li></ul>";
 }


}*/
  

mysqli_close();

?>

</body>
</html>