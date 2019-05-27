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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $quantity = $_POST["quantity"];
}

$cat_id = $_SESSION['category_id'];
$id = $_SESSION['item_id'];
$cust_id = $_SESSION['customer_id'];

$sql = "INSERT INTO Orders (order_id, item_id, customer_id, quantity)
VALUES ('1234', '$id', '$cust_id', '$quantity')";

echo "</div>";
echo "<div class='row'>";




if ($conn->query($sql) === TRUE) {
    echo " ";
} else {
    echo " " ;
}

$sql = "INSERT INTO Cart (order_id, customer_id, item_id, quantity)
VALUES ('1234', '$cust_id', '$id', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='col-6 text-warning'><h3>Item Added to Cart</h3></div>";
} else {
    echo " ";
}
mysqli_close();

?>

<div class="container">
  <div>
  <form class="form-horizontal" action="category1.php" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2 text-warning" ">Quantity:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"  value= "1" name="quantity">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-6">
        <button type="category1.php" class="btn btn-warning btn btn-primary p-3 px-xl-4 py-xl-3"">Add To Cart</button>
        <a href="menu.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Go Back to Menu</a>
        <a href="checkout.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Checkout</a>
      </div>
    </div>
  </form>
</div>
</div>





<!---

<form method="post" action="category1.php">  
  
  Quantity: <input type="text" name="quantity" value = "1">
  <br><br> 
  <input type="submit" name="submit" value="Add to Cart">
  <br><br>  
</form>
<form action="menu.php" method="GET">
<input type="submit" value="Continue Shopping">
</form>
<form action="checkout.php" method="GET">
<input type="submit" value="Checkout">
</form> -->
</body>
</html>
