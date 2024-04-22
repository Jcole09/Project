<?php
include('servercon.php');

//delete database in a table
if(isset($_GET['deletes_id'])){
$id = $_GET['deletes_id'];

$sqlstring = "DELETE FROM tableinfo WHERE ID = $id";

if(mysqli_query($dbconnect, $sqlstring)){
    echo "Records Deleted";
} else 
{
    echo "Unable to execute the query.  Error code " . mysqli_error($dbconnect);
}



}

mysqli_close($dbconnect);

?>