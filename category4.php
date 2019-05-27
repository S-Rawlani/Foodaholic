
<!DOCTYPE html>
<html>
<body>

 
 <form method="post" action="category4.php">  
 	Select the size of your drink :
	<select>
  <option value="Small">Small</option>
  <option value="Medium">Medium</option>
  <option value="Large">Large</option>
</select>
  
  Quantity: <input type="text" name="quantity" value = "1">
  <br><br> 
  <input type="submit" name="submit" value="Add to Cart">
  <br><br>  
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $quantity = $_POST["quantity"];
}

$cat_id = $_SESSION['category_id'];
$id = $_SESSION['item_id'];
$cust_id = $_SESSION['customer_id'];

$sql = "INSERT INTO Orders (order_id, item_id, customer_id, quantity)
VALUES ('1234', '$id', '$cust_id', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo " ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Cart (order_id, customer_id, item_id, quantity)
VALUES ('1234', '$cust_id', '$id', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo "Item added to Cart";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close();

?>
<form action="home.php" method="GET">
<input type="submit" value="Continue Shopping">
</form>
<form action="checkout.php" method="GET">
<input type="submit" value="Checkout">

</body>
</html>
