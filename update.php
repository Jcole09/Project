<?php 

include('servercon.php');
//update new records in database
if(isset($_POST['updaterecord']))
{
    $car_ID = $_POST['displaycar_id'];
    $carbrand = $_POST['brand'];
    $model = $_POST['model'];
    $car_condition = $_POST['ccondition'];
    $price = $_POST['price'];

    $sqlstring = "UPDATE autodealer SET CarBrand='$carbrand', Model='$model', Car_Condition='$car_condition', Price='$price' WHERE Car_ID='$car_ID'"; 
  
    
    if(mysqli_query($dbconnect, $sqlstring)){
        echo "Records Updated <br>";
              
    } else 
    {
        echo "Unable to execute the query.  Error code " . mysqli_error($dbconnect);
    }
   
}

?>
<html>
    <head>
    <link rel="stylesheet" href="css/styles1.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Update Records</title>
  </head>
  <body class="bg-imgs">
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
                  <li><a href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
              </div>
    </nav>
<?php
   if(isset($_GET['update_id'])){
    $C_id = $_GET['update_id'];
    $sqlstring = mysqli_query($dbconnect, "SELECT * FROM autodealer WHERE Car_ID = '$C_id'");
    $r=mysqli_fetch_array($sqlstring);
    
    $carbrand = $r['CarBrand'];
    $model = $r['Model'];
    $car_condition = $r['Car_Condition'];
    $price = $r['Price'];
   }
mysqli_close($dbconnect);
?>
<form name="updaterecords" action="<?php $_PHP_SELF ?>" method="post">
    <section class = "sec">
    <form name = "createrecords" method = "post" action = "<?php $_PHP_SELF ?>">
    <div class="find-page">
      <div class="form">
        <div class="find">
          <div class="find-header">
            <h3>Update Database</h3>
          </div>
        </div>
        <form class="find-form">
        <label class = "form-label"><b>ID: </b></label>
        <input type = "text" class = "form-control" name = "displaycar_id" value="<?php echo $C_id; ?>">
        <label class = "form-label"><b>Car Brand: </b></label>
        <input type = "text" placeholder = "Car Brand" name = "brand" value="<?php echo $carbrand; ?>">
        <label class = "form-label"><b>Model: </b></label>
        <input type = "text" placeholder = "Model" name = "model"  value="<?php echo $model; ?>">
        <label class = "form-label"><b>Car Condition: </b></label>
        <input type = "text" placeholder = "Car Condition" name = "ccondition" value="<?php echo $car_condition; ?>">
         <label class = "form-label"><b>Price: </b></label>
        <input type = "text" placeholder = "Price" name = "price" value="<?php echo $price; ?>">
        <div class = "mb-3">
            <button type = "submit" class = "btn btn-primary" name = "updaterecord">Update</button>
        </div>
        </form>
        </div>
        </div>
          </section>
</form>
  </body>
</html>



