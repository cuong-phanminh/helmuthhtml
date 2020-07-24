<?php
include("includes/db.inc.php");
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
            <?php

if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM users WHERE user_id ='$id' ";
    $query_run = mysqli_query($conn, $query);
    echo $query ;

    foreach($query_run as $row)
    {
        ?>

            <form action="" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['user_id'] ?>">

                <div class="form-group">
                    <label> Username </label>
                    <input type="text" name="edit_username" value="<?php echo $row['first_name'] ?>"
                        class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                        placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="edit_password" value="<?php echo $row['password'] ?>"
                        class="form-control" placeholder="Enter Password">
                </div>

                <a href="register.php" class="btn btn-danger"> CANCEL </a>
                <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

            </form>
            <?php
    }
}

            ?>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET first_name='$username', email='$email', password='$password' WHERE user_id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: index.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: index.php'); 
    }
}

?>x 
?>