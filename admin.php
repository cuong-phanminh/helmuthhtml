

    <div class="col-md-6 col-md-offset-3">
        <?php
			if(!isset($_SESSION["loged"])){
				header("location:index.php");
					setcookie("error", "Bạn chưa đăng nhập!", time()+1, "/","", 0);
			}
			else
				echo "Chào mừng bạn đến với ADMIN PAGE";
		?>
    </div>

    <div class="col-md-6 col-md-offset-3">
        <!-- upload image -->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Chọn file để upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Đăng ảnh" name="upload">
        </form>
    </div>
