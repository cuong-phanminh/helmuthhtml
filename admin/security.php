<?php
$query = "SELECT * FROM users";
$query_run = mysqli_query($conn, $query);

if ($_SESSION['username']) 
{
    
}else
{
	header("location:login.php");
	}
?>
