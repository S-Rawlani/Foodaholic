<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>




<form action="home.php" method="GET">

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

$sql = "SELECT * FROM Menu";

/*if ($search){
	$sql .= " WHERE BookTitle LIKE '%$search%' ";

}
*/

$result = mysqli_query($conn, $sql);



while($row = mysqli_fetch_array($result)){

	echo "<ul><li>". $row["item_name"] ."</li><li>". $row["price"]."</li><li><a href = 'cart.php?item_id=".$row["item_id"]."'>Add to Cart</a></li></ul>";

}

mysqli_close();

?>

</body>
</html>