<?php 

$servername = "Enter your server name";
$username = "Enter Yur Username";
$password = "Enter Your Password";
$dbname = "Enter Your DB Name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed". $conn->connect_error);
}

?>