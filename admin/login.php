<?php
ob_start();
include("includes/db.inc.php");
include("includes/header.php");



//login star
if (isset($_POST['login_btn'])) {
  $email_login = $_POST['user_name_lg'];
  $password_login = md5($_POST['pass_lg']);
  $role = 'admin';

  $query = "SELECT * 
  FROM users 
  INNER JOIN
  roles USING (role_id) 
  WHERE email='$email_login' 
  AND password='$password_login'
  AND role_name='$role'";

  $query_run = mysqli_query($conn, $query);

  if (mysqli_num_rows($query_run) > 0) {
    
    $_SESSION['username'] = $email_login;
    echo ($_SESSION['username']);
    header('Location: index.php');
    
    
  } else {
    $_SESSION['status'] = "Email / Password is Invalid";
    header('Refresh: 2; URL = login.php');
  }
} //end login
?>

<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                  <?php
                  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                    unset($_SESSION['status']);
                  }
                  ?>
                </div>
                <form class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                            ?>" method="POST">
                  <div class="form-group">
                    <input type="email" name="user_name_lg" class="form-control form-control-user" placeholder="Enter Email Address...">
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass_lg" class="form-control form-control-user" placeholder="Password">
                  </div>

                  <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                  <hr>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
ob_flush();
?>