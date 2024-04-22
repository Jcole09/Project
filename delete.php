<?php

//this is deleting records of database in same page.
include('servercon.php');

if(isset($_GET['delete_id'])){
$Cid = $_GET['delete_id'];

$sqlstring = "DELETE FROM autodealer WHERE Car_ID = $Cid";

if(mysqli_query($dbconnect, $sqlstring)){
    echo "Records Deleted";
    header('Location: Cars.php');
} else 
{
    echo "Unable to execute the query.  Error code " . mysqli_error($dbconnect);
}



}

mysqli_close($dbconnect);

?>