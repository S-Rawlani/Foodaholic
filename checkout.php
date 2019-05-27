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


$total = 0;


$cust_id = $_SESSION['customer_id'];

echo "<div class='container'>";
echo "<div class='row'>";



echo "<div class='col-6 text-warning'><h3>Verify your address : </h3></div>";


$sql2 = "SELECT address, phone FROM Customer WHERE customer_id = '$cust_id' ";

$result2 = mysqli_query($conn, $sql2);


while($row = mysqli_fetch_array($result2))
{

  echo "<div class='col text-white'><h3>Address : </h3>". $row["address"]."</div>". "<div class='col text-white'><h3>Phone : </h3>".$row["phone"]."</div>" ;

}

echo "</div>";
echo "<div class='row'>";

echo "<div class='col-6 text-warning'><h3>Verify your Payment Information : </h3></div>";


$sql3 = "SELECT card_number, expiration_date FROM Customer WHERE customer_id = '$cust_id' ";

$result3 = mysqli_query($conn, $sql3);


while($row = mysqli_fetch_array($result3))
{

  echo "<div class='col text-white'><h3>Card Number : </h3>". $row["card_number"]. "</div>"."<div class='col text-white'><h3>Expiration Date : </h3>".$row["expiration_date"] ."</div>";

}
echo "</div>";
echo "<div class='row'>";

$sql = "SELECT item_name, quantity, price FROM Cart, Menu WHERE Cart.order_id = '1234' and Cart.customer_id = '$cust_id' and Cart.item_id = Menu.item_id";

$result = mysqli_query($conn, $sql);




 if ( mysqli_num_rows ($result) == 0 )
  
    echo "<div class='col-6 text-warning'><h3>Cart is Empty</h3></div>";

  else

  {  
    echo "<div class='col-6 text-warning'><h3>Items in Cart</h3></div>";

    echo "</div>";

    echo "</br>";

    echo "<table class='table text-white'><tr><td>Item</td><td>Quantity</td><td>Price</td><td>";

    while($row = mysqli_fetch_array($result)){

      echo "<div class='row'>";


      echo "<tr><td>". $row["item_name"]."</td><td>". $row["quantity"] ."</td><td>".$row["price"]."</td></tr>";
  
      $total+= $row['price']*$row["quantity"];



    }

    echo "</div>";

  echo "<div class='row'>";

  echo "<div class='col-10 text-warning '>Total : "."$total"."</div>";

  }


/*echo "Items in Cart : ";

$cust_id = $_SESSION['customer_id'];
$sql = "SELECT item_name, quantity FROM Cart, Menu WHERE Cart.order_id = '1234' and Cart.customer_id = '$cust_id' and Cart.item_id = Menu.item_id";

$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_array($result)){

  echo "<ul><li>". $row["item_name"]. $row["quantity"] ."</li></ul>";

}*/



mysqli_close();

?>

<form action="placeOrder.php" method="GET">
<input type="submit" class = "btn btn-primary p-3 px-xl-4 py-xl-3 " value="Place Order">
</form>
</body>
</html>