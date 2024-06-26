<?php
require_once 'includes/class.user.php';
require_once 'includes/config.php';
$user = new User($pdo);

if(isset($_GET['logout'])) {
  $user->logout();
}


$menuLinks = array(
  "home.php"=>"Account home",

   "index.php"=>"Log in",

   "account.php"=>"Account",


  );

  $adminMenuLinks = array(  
     "admin.php"=>"Admin",
    );
  


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vintage Cars</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header class="container-fluid bg-dark">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  
    <a class="navbar-brand" href="index.php">Vintage Cars</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sellCar.php">Sell</a>
        </li>
        <?php //Every new menu item comes here
        foreach ($menuLinks as $x => $y) {
        echo "<li class='nav-item'>
          <a class='nav-link ' href='$x'>$y</a>
        </li>";
        }?>

<?php 


        //Checks if user is logged in
        if(isset($_SESSION['user_id'])) {
          //menu items only for admins
          if ($user->checkUserRole(500)) {
            foreach ($adminMenuLinks as $x => $y) {
                    echo "<li class='nav-item'>
                      <a class='nav-link ' href='$x' >$y</a>
                    </li>";
                    }}
          //standar menu items depending if logged in or not
          echo "<li class='nav-item'>
          <a class='nav-link ' href='?logout=1.php'>Log out</a>
        </li>";
        }
        ?>
        
      </ul>
    </div>
  </div>
</nav>
<div class="hero-section row align-items-center justify-content-center">
      <h1 class="text-center" id="hero-slogan">We only have the best</h1>
	</div>
</header>