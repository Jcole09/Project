<?php
session_start();
$dbconnect = mysqli_connect("localhost", "root", "", "projectdb");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:" . mysqli_connect_errno();
    exit();
}

?>