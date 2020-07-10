<?php
include("includes/db.inc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>

    <style>
        .form-group .control-label:after {
            content: "*";
            color: red;
    }
    </style>

</head>

<body>

    <?php
		if(isset($_POST["dangky"])){ //isset(): là hàm kiểm tra một biến có tồn tại hay không.
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $zipcode = $_POST["zipcode"];
            $state = $_POST["state"];
			$pass1 = $_POST["pass1"];
			$pass2 = $_POST["pass2"];

			//kiểm tra xem 2 mật khẩu có giống nhau hay không:
			if($pass1!=$pass2 || $pass1 =="" || $first_name =="" || $last_name == "" || $phone == "" || $address== ""){
				header("location:index.php?page=dangky");
                setcookie("error", "Đăng ký không thành công!", time()+1, "/","", 0);
                //setcookie() để tạo ra một biến thông báo tồn tại trong 1 giây, để hiện các thông báo có thực hiện thành công hay không.
			}
			else{
                // $_SESSION["loged"] = false;
                $pass = md5($pass1);
                //md5(): là hàm mã hóa một chuỗi thành 1 dãy kí tự gồm 32 ký tự.
                    mysqli_query($conn,"
                        insert into customers (first_name,last_name,phone,email,street_address,city,state,zip_code,role)
                        values ('$first_name','$last_name','$phone','$email','$address','$city','$state','$zip_code','admin')
                    ");
                    include "admin.php";
				header("location:index.php");
				setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
			}
		}

    ?>
    <!-- 'end thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->
    
    <!-- 'start thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->
	<?php
		if(isset($_POST["dangnhap"])){
			$tk = $_POST["user_name_lg"];
            $mk = md5($_POST["pass_lg"]);
            $role =("admin");
            


			$rows = mysqli_query($conn,"
				select * from customers where email = '$tk' and password = '$mk' and role = '$role'
            ");
            
            // var_dump($rows);
			$count = mysqli_num_rows($rows);
			if($count==1){
				$_SESSION["loged"] =true;
				// include "admin.php";
				setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
			}
			else{
				header("location:index.php");
				setcookie("error", "Đăng nhập không thành công! Bạn không đủ quyền truy cập!", time()+1, "/","", 0);
			}
			
		}
	?>
	<!-- 'end thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->
    <div class="container">
        <div class="row">
            <a href="index.php?page=dangky" class="btn btn-success">Đăng ký</a>
            <a href="http://helmuthhtml.local/home.php" class="btn btn-info">Trang chủ</a>
        </div>

        <div class="row">
            <!-- 'start nếu xảy ra lỗi thì hiện thông báo:' -->
            <?php
				if(isset($_COOKIE["error"])){
			?>
            <div class="alert alert-danger">
                <strong>'Có lỗi!'</strong> <?php echo $_COOKIE["error"]; ?>
            </div>
            <?php } ?>
            <!-- 'end nếu xảy ra lỗi thì hiện thông báo:' -->


            <!-- 'start nếu thành công thì hiện thông báo:' -->
            <?php
				if(isset($_COOKIE["success"])){
			?>
            <div class="alert alert-success">
                <strong>'Chúc mừng!'</strong> <?php echo $_COOKIE["success"]; ?>
            </div>
            <?php } ?>
            <!-- 'end nếu thành công thì hiện thông báo:' -->

            <?php
                //nếu tồn tại biến $_GET["page"] = "dangky" thì gọi trang đăng ký:
                if(isset($_GET["page"])&&$_GET["page"]=="dangky")
                    include "register.php";
    
                //nếu không tồn tại biến $_GET["page"] = "dangky"
                if(!isset($_GET["page"])){
                    //nếu tồn tại biến session $_SESSION["loged"] thì gọi nội dung trang admin.php vào
                    if(isset($_SESSION["loged"]))
                        include "admin.php";
                    //nếu không tồn tại biến session $_SESSION["loged"] thì gọi nội dung trang login.php vào
                    else
                        include "login.php";
			}
			?>
        </div>

    </div>

</body>

</html>