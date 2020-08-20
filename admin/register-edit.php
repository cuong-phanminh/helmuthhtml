<?php
ob_start();
include("includes/db.inc.php");
include("includes/header.php");
include("includes/navbar.php");

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $firstname = $_POST['edit_first_name'];
    $lastname = $_POST['edit_last_name'];
    $roleid = $_POST['edit_role'];
    $email = $_POST['edit_email'];

    $query = "UPDATE users SET first_name='$firstname', last_name='$lastname', email='$email', role_id='$roleid' WHERE user_id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header("Location: user-list.php", true, 302);
        exit();
    } else {
        $_SESSION['status'] = "Yuser-list.phpour Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: user-list.php');
    }
}
?>

<div class="container-fluid">
    <?php
    include("includes/topbar.php")
    ?>
    <!-- DataTales Example -->
    <div class="modal-dialog card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];
                $query = " SELECT * 
                FROM users WHERE user_id = '$id'";
                $query_run = mysqli_query($conn, $query);
                foreach ($query_run as $row) {
            ?>
                    <form action="" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['user_id'] ?>">
                        <div class="form-group">
                            <label> First name</label>
                            <input type="text" name="edit_first_name" value="<?php echo $row['first_name'] ?>" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label> Last name </label>
                            <input type="text" name="edit_last_name" value="<?php echo $row['last_name'] ?>" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
                        </div>
                        <label for="edit_role">Role</label>
                        <select id="edit_role" name="edit_role">
                            <?php
                            $query = " SELECT * 
                            FROM roles";
                            $sql = mysqli_query($conn, $query);
                            if (mysqli_num_rows($sql) > 0) {
                                while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                                    <option value="<?php echo $row['role_id']; ?>">
                                        <?php echo $row['role_name']; ?>
                                    </option>
                            <?php
                                }
                            } else {
                                echo "No Record Found";
                            }
                            ?>
                        </select>
                        </br>

                        <a href="user-list.php" class="btn btn-danger"> CANCEL </a>
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
ob_flush();
?>