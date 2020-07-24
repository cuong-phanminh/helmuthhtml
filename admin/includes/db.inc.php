<?php
$servername = "localhost";
$username = "root";
$password = "";
$port ="3306";  
$dbname = "helmuthtml";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);// kiểu hướng đối tượng
// $conn = mysqli_connect (“localhost”,“root”,“root”,“db_name”);    kiểu thông thường
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>