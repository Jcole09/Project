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

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/cars.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->               
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      </head>
    <body>
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
                <a class="nav-link" href="add.php">Manage Database</a>
                </li>
                </ul>
                <div class="social-media">
                <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <button type="submit" value="Logout" name="button_logout" id="btn1"><i class="fa fa-sign-out"></i></button>
                </ul>
              </div>
            </div>
          </div>
    </nav>
</form>
    <form class="find-form" name="searchrecords" action="<?php $_PHP_SELF ?>" method="post">
    <div class="bg-imgs">
    <div class="find-page">
      <div class="form">
        <div class="find">
          <div class="find-header">
          <h3>Find the Right Car for you </h3>
          </div>
        </div>
        <label class="form-label"><b>Select a Model</b></label>
        <input type="text"class="form-control" placeholder="Search" name="usearch">
        <ul>
          <li>Chevrolet Bolt EV</li>
          <li>Chevrolet Camaro</li>
          <li>Chevrolet Corvette</li>
          <li>Chevrolet Tahoe</li>
        </ul>
          <label class="form-label"><b>Condition</b></label>
          <select class="form-select" aria-label="Default select example">
          <option selected>Any</option>
          <option value="1">Brand New</option>
          <option value="2">Used</option>
          </select><br>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary"  id="but_submit" name="searchrecord">Find</button>
          </form>
        </div>  
      </div>
    </div>
</div>
<?php
//it will display the database information by searching MODEL name of the car.
if(isset($_POST['searchrecord']))
{
$searchcriteria = $_POST['usearch'];

$sqlstring = "SELECT * FROM autodealer WHERE Model LIKE '%$searchcriteria%'";

$queryresult = mysqli_query($dbconnect, $sqlstring);

if(mysqli_num_rows($queryresult)>0){

    $searchresult = mysqli_num_rows($queryresult);
    echo "Found $searchresult record/s";

//table for database 
echo "<table class=\"table table-dark table-striped\"><tr> <th>ID</th> <th>Car Brand</th> <th>Model</th> <th>Car Condition</th> <th>Price</th> <th>Action</th></tr>";

//this will show the database information that the user input in same page
while($row = mysqli_fetch_assoc($queryresult)){
        echo "<tr><td>" . $row['Car_ID'] . "</td><td>" . $row['CarBrand'] . "</td><td>" . $row['Model'] . "</td><td>" . 
        $row['Car_Condition'] . "</td><td>" . $row['Price'] . "</td><td>
        <a href=\"update.php?update_id=" . $row['Car_ID'] . "\" class=\"btn btn-warning\">Edit</a> 
        <a href=\"delete.php?delete_id=" . $row['Car_ID'] . "\" class=\"btn btn-danger\">Delete</a> </td></tr>";
    }
} else
{
    echo "No Results";
}
mysqli_close($dbconnect);
echo "</table>";

}
?>
    </body>
</html>