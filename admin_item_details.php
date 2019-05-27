 </!DOCTYPE html>
<html lang="en">
<head>
  <title>login.php</title>
  <meta name="viewpoint" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
            <li class="nav-item"><a href="admin_menu.php" class="nav-link">Menu</a></li>
            <li class="nav-item"><a href="item_status.html" class="nav-link">Change Order Status</a></li>
            <li class="nav-item"><a href="item_add.html" class="nav-link">Add an item</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>  
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
  </br>
</br>

<?php

session_start();


$user = 'root';
$password = 'root';
$db = 'restaurant';
$host = 'localhost';
$port = 3306;

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


$item_id=$_GET['item_id']; 

// $category_id="SELECT category_id FROM category WHERE category_name='$Category'"
// echo "$category_id";
$sql = "SELECT item_name,description,price,image,item_id,image FROM menu WHERE item_id='$item_id'"; 

$result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'><tr><td></td><td></td><td></td><td></td><td></td></tr>";



while($row = mysqli_fetch_array($result)){
  $image=$row["image"];
  
  //echo "$row["item_name"]";
  echo "<tr><td>". $row["item_name"] ."</td><td>". $row["description"]."</td><td>"."$".$row["price"]."</td><td><a href = 'item_edit.php?item_id=".$row["item_id"]."'>Edit</a></td><td><a href = 'item_delete.php?item_id=".$row["item_id"]."'>Delete</a></td></tr>";
}

echo "</table>";


mysqli_close();
?>

<img src="images/<?php echo $image; ?>">







</body>
</html>