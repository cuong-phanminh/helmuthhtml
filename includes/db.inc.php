<?php
$servername = "localhost";
$username = "root";
$password = "pmc0966254870";
$dbname = "helmuth";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>