<?php 

include('servercon.php');

//restrict direct page access
if(!isset($_SESSION['txt_uname'])){
  header('Location: index.php');
}
//this will direct you in login page if you click the logout button
if(isset($_POST['button_logout'])){
  session_destroy();
  header('Location: index.php');
}

?>
<html>
    <head>
    <link rel="stylesheet" href="css/add.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Add Cars</title>
  </head>
  <body class="bg-imgs">
  <form action="<?php $_PHP_SELF ?>" method="post">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <span class="navbar-brand"><img src="img/chevrolet.jpg" alt="" width="35" height="30" class="d-inline-block align-top"/>Chevrolet</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cars.php">Find Car</a>
                    </li>
                </ul>
        </div>
        <div class="social-media">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <button type="submit" value="Logout" name="button_logout" id="btnn1"><i class="fa fa-sign-out"></i></button>
                </ul>
              </div>
    </nav>
</form>
    <section class = "sec">
    <form name = "createrecords" method = "post" action = "<?php $_PHP_SELF ?>">
    <div class="find-page">
      <div class="form">
        <div class="find">
          <div class="find-header">
            <h3>Manage Database</h3>
          </div>
        </div>
        <form class="find-form">
        <input type = "text" placeholder = "Car Brand" name = "brand" Required>
        <input type = "text" placeholder = "Model" name = "model" Required>
        <input type = "text" placeholder = "Car Condition" name = "ccondition" Required>
        <input type = "text" placeholder = "Price" name = "price" Required>
        <div class = "mb-3">
            <button type = "submit" class = "btn btn-primary" name = "addtodb">Add to Database</button>
        </div>
        </form>
        </div>
        </div>
          </section>
  </body>
</html>

<?php

    //this will add new information in database
    if(isset($_POST['addtodb']))
    {
        $carbrand = $_POST['brand'];
        $model = $_POST['model'];
        $car_condition = $_POST['ccondition'];
        $price = $_POST['price'];

        $sqlstring = "INSERT INTO autodealer (CarBrand, Model, Car_Condition, Price) VALUES ('$carbrand','$model','$car_condition','$price')";

        if(mysqli_query($dbconnect, $sqlstring)){
            echo "New record created <br>";
            //$result = mysqli_num_rows($dbconnect);
            
        } else 
        {
            echo "Unable to execute the query.  Error code " . mysqli_error($dbconnect);
        }
        mysqli_close($dbconnect);
    }
    ?>