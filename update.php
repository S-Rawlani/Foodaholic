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

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    $sql2 = "DELETE from Orders where order_id = 1234 and customer_id = '$cust_id' and item_id = '$id'";

$result2 = mysqli_query($conn, $sql2);

if ($conn->query($sql2) === TRUE) {
    echo "Record deleted successfully from Order";
} else {
    echo "Error deleting record: " . $conn->error;
}
} else {
    echo "Error deleting record: " . $conn->error;
}




$sql = "SELECT * FROM Menu WHERE item_id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
        $cat_id =  $row["category_id"];
      }
}
echo "Category id : $cat_id";

$_SESSION['category_id'] = $cat_id;
$_SESSION['item_id'] = $id;

if($cat_id == 2)
  header('Location:category1.php');

if($cat_id == 3)
  header('Location:category1.php');


if($cat_id == 4)
  header('Location:category4.php');

if($cat_id == 1)
  header('Location:category1.php');

mysqli_close();

?>

</body>
</html>