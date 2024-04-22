<?php
    include('servercon.php');
    
    //restrict direct page access
   if(!isset($_SESSION['txt_uname'])){
      header('Location: index.php');
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/h.css">
    <title>Auto Dealer | Ecommerce</title>
</head>
<body>
<div class="header">
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="img/chevrolet.jpg" width="125px">
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="home.php">About</a></li>
                <li><a href="#">Account</a></li>
            </ul>
        </nav>
       
    </div>
    <div class="row">
        <div class="col-2">
            <h1>Best Car Deals <br> For You</h1>
            <a href="Cars.php" class="btn">Buy Now &#8594;</a>
        </div>
        <div class="col-2">
            <img src="img/3.png" alt="">
        </div>
    </div>
</div>
</div> 
<div class="categories">
    <div class="small-container">
    <div class="row">
        <div class="col-3">
            <img src="img/5.png">
            <h4>Chevrolet</h4>
              <p>$5000.00</p>
              <a href="Cars.php" class="btn">Buy Now &#8594;</a>
        </div>
        <div class="col-3">
            <img src="img/4.png">
            <h4>Chevrolet</h4>
              <p>$10000.00</p>
              <a href="Cars.php" class="btn">Buy Now &#8594;</a>
        </div>
        <div class="col-3">
            <img src="img/2.png">
            <h4>Chevrolet</h4>
              <p>$5550.00</p>
              <a href="Cars.php" class="btn">Buy Now &#8594;</a>
        </div>
    </div>
    </div>
</div>
</body>
</html>