<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


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

$id = $_GET['item_id'];

$cust_id = $_SESSION['customer_id'];


echo $id;
echo $cust_id;

$sql = "DELETE from Cart where order_id = 1234 and customer_id = '$cust_id' and item_id = '$id'";

$result = mysqli_query($conn, $sql);	

	

if ($conn->query($sql) === TRUE)
 {
    echo "Record deleted successfully from Cart";
     

    


	/*$sql3 = "SELECT * FROM Cart WHERE customer_id  = '101' and order_id = '1234' and item_id = '1002'";

    $result3 = mysqli_query($conn, $sql3);

    $r = mysqli_num_rows($result3);
    echo "$r";

    while($row = mysqli_fetch_array($result3))
    {
       

        echo "<ul><li>". $row["item_id"]."</li><li>". $row["customer_id"] ."</li><li>". $row["order_id"]."</li></ul>";

    }*/

    $sql2 = "DELETE from Orders where order_id = 1234 and customer_id = '$cust_id' and item_id = '$id'";


	$result2 = mysqli_query($conn, $sql2);

	
		if ($result2 === TRUE) 
		{
   	 		echo "Record deleted successfully from Order";
		}
	 	else 
		{
    		echo "Error deleting record: " . $conn->error;
		}
}
else {
    echo "Error deleting record: " . $conn->error;
}

header('Location:cart2.php');


mysqli_close();

?>

</body>
</html>