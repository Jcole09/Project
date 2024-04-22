<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/style1.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Database Management</title>
  </head>
  <body>
<form name="searchrecords" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6a0000;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="img/dhvsu.png" alt="" width="70" height="64" class="d-inline-block align-text-rigth">
    Registration Form
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="template.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Records
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="RFregis.php">Add Records</a></li>
          </ul>
        </li>
      </ul>
      <div class="container">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Criteria" name="usersearch">
        <div class="input-group-append">
          <input class="btn btn-success" type="submit" name="searchrecord" value="Search"/>
          <input class="btn btn-danger" type="submit" name="button_logout" value="Logout"/>
        </div>
      </div>
      </div>
    </div>
  </div>
</nav>
</form>

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
//search record 
if(isset($_POST['searchrecord']))
{
$searchcriteria = $_POST['usersearch'];

$sqlstring = "SELECT * FROM tableinfo WHERE LastName LIKE '%$searchcriteria%'";

$queryresult = mysqli_query($dbconnect, $sqlstring);

if(mysqli_num_rows($queryresult)>0){

    $searchresult = mysqli_num_rows($queryresult);
    echo "Found $searchresult record/s";
//this is a table to show the database information in same page
echo "<table class=\"table table-striped\"><tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>E-mail Address</th> <th>Password</th> <th>Confirm Password</th> <th>Address</th> <th>Gender</th> <th>Birth</th> <th>Action</th></tr>";

while($row = mysqli_fetch_assoc($queryresult)){
        echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['FirstName'] . "</td><td>" . $row['LastName'] . "</td><td>" . 
        $row['EmailAddress'] . "</td><td>" . $row['Pass'] . "</td><td>" . $row['ConfirmPassword'] . "</td><td>" . 
        $row['Address'] . "</td><td>" . $row['Gender'] . "</td><td>" . $row['Birth'] . "</td><td>         
        <a href=\"RFupdate.php?updates_id=" . $row['ID'] . "\" class=\"btn btn-warning\">Edit</a> 
        <a href=\"RFdelete.php?deletes_id=" . $row['ID'] . "\" class=\"btn btn-danger\">Delete</a> </td></tr>";
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