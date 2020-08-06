<?php
$servername = "localhost";
$username = "root";
$password = "";
$port ="3306";  
$dbname = "helmuthhtml";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);// kiểu hướng đối tượng
// $conn = mysqli_connect (“localhost”,“root”,“root”,“db_name”);    kiểu thông thường
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Please Check Your Database Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}
// echo "Connected successfully";
?>
