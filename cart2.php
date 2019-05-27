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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Orders</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="checkout.php">Checkout</a>
                <a class="dropdown-item" href="orderHistory.php">Order History</a>
              </div>
            </li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>  
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

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

$total = 0;


$cust_id = $_SESSION['customer_id'];
$sql = "SELECT item_name, Cart.item_id, quantity, price FROM Cart, Menu WHERE Cart.order_id = '1234' and Cart.customer_id = '$cust_id' and Cart.item_id = Menu.item_id";

$result = mysqli_query($conn, $sql);

echo "<table class='table text-white'><tr><td>Item</td><td>Quantity</td><td></td><td></td></tr>";
 if ( mysqli_num_rows ($result) == 0 )
  echo "<p class = 'col-sm-offset-1 col-sm-6 text-warning'>Cart is empty</p>";
  else
  {  

    while($row = mysqli_fetch_array($result)){

      echo "<tr><td>". $row["item_name"]."</td><td>". $row["quantity"] ."</td><td><a href = 'delete2.php?item_id=".$row["item_id"]."'>Delete</a></td><td><a href = 'update.php?item_id=".$row["item_id"]."'>Update</a></td></tr>";
    $total+= $row['price']*$row["quantity"];
  }

  //echo "Cart Total : "."$total";
}

mysqli_close();

?>

<div class="form-group">        
      <div class="col-sm-offset-8 col-sm-6">
        <a href="menu.php"  class="btn btn-primary p-3 px-xl-4 py-xl-3">Add More Items</a>
        <a href="checkout.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Checkout</a>
      </div>
    </div>
    <p class = "col-sm-offset-1 col-sm-6 text-warning"><b>Cart Total </b> : <?php echo $total;?></p>
</body>
</html>