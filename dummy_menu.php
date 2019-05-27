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
            <li class="nav-item active"><a href="index2.html" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="dummy_menu.php" class="nav-link">Menu</a></li>
            <li class="nav-item"><a href="login.html" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Our Menu</h1>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
      <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">
          <div class="info">
            <div class="row no-gutters">
              <div class="col-md-4 d-flex ftco-animate">
                <div class="icon"><span class="icon-phone"></span></div>
                <div class="text">
                  <h3>978-839-8565</h3>
                  
                </div>
              </div>
              <div class="col-md-4 d-flex ftco-animate">
                <div class="icon"><span class="icon-my_location"></span></div>
                <div class="text">
                  <h3>990 loop road sw</h3>
                  
                </div>
              </div>
              <div class="col-md-4 d-flex ftco-animate">
                <div class="icon"><span class="icon-clock-o"></span></div>
                <div class="text">
                  <h3>Open Monday-Friday</h3>
                  <p>8:00am - 9:00pm</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>






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
$search = $_GET["search"];
session_start();
?>
<br>
<form action="dummy_menu.php" method="GET">
<input type="text" name="search" value="<?php echo $search ?>">
<input type="submit" value="Search">
</form>

<?php
$page=$_GET["page"];
if($page=="" || $page=="1")
{
  $page1=0;
}
else
{
  $page1=($page*5)-5;
}



if ($search){
  if($search =='Entree'|| $search =='Dessert' || $search =='Appetizers' || $search =='Beverages')
  {

  $sql = " SELECT item_id,item_name,description,price,availability,category.category_name FROM menu, category WHERE menu.category_id=category.category_id && availability = 'YES' && category.category_name LIKE '%$search%' limit $page1,5 ; ";

  $result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'><tr><td>Name</td><td>Description</td><td>Price</td></tr>";

while($row = mysqli_fetch_array($result)){

  echo "<tr><td>". $row["item_name"] ."</td><td>". $row["description"]."</td><td>". $row["price"]."</td></tr>";
}

echo "</table>";
$sql2= "SELECT * from menu where availability='YES';";
$res=mysqli_query($conn,$sql2);
$cou=mysqli_num_rows($res) ;
$a=$cou/5;
$a=ceil($a);
echo "<br>"; echo "<br>";
for($b=1;$b<=$a;$b++)
{
  ?><div ><a href="dummy_menu.php?page=<?php echo $b; ?>"><?php echo $b." "; ?></a></div><?php
}

  }
  
  else
  {
    $sql = " SELECT * FROM menu WHERE availability = 'YES' && item_name LIKE '%$search%'  limit $page1,5 ;";

    
  $result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'><tr><td><b>Name</b></td><td><b>Description</b></td><td><b>Price</b></td></tr>";

while($row = mysqli_fetch_array($result)){

  echo "<tr><td>". $row["item_name"] ."</td><td>". $row["description"]."</td><td>". $row["price"]."</td></tr>";
}

echo "</table>";
$sql2= "SELECT * from menu where availability='YES';";
$res=mysqli_query($conn,$sql2);
$cou=mysqli_num_rows($res) ;
$a=$cou/5;
$a=ceil($a);
echo "<br>"; echo "<br>";
for($b=1;$b<=$a;$b++)
{
  ?><div ><a href="menu.php?page=<?php echo $b; ?>"><?php echo $b." "; ?></a></div><?php
}
  }
}

else {
    $sql = "SELECT item_id,item_name,description,price,availability FROM menu, category WHERE menu.category_id=category.category_id && availability = 'YES' limit $page1,5 ;";


  $result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'><tr><td>Name</td><td>Description</td><td>Price</td></tr>";

while($row = mysqli_fetch_array($result)){

  echo "<tr><td>". $row["item_name"] ."</td><td>". $row["description"]."</td><td>". $row["price"]."</td></tr>";
}

echo "</table>";
$sql2= "SELECT * from menu where availability='YES';";
$res=mysqli_query($conn,$sql2);
$cou=mysqli_num_rows($res) ;
$a=$cou/5;
$a=ceil($a);
echo "<br>"; echo "<br>";
for($b=1;$b<=$a;$b++)
{
  ?><div ><a href="dummy_menu.php?page=<?php echo $b; ?>"><?php echo $b." "; ?></a></div><?php
}
  }


mysqli_close();


?>


</body>
</html>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>