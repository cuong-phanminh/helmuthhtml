<?php
ob_start();
include("includes/db.inc.php");
include("includes/header.php");
include("includes/navbar.php");

include("security.php");
?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php
        include("includes/topbar.php")
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Data table example  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Admin Profile
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                            Add Admin Profile
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </h6>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                        echo '<h2> ' . $_SESSION['success'] . '</h2>';
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                        echo '<h2 class="text-secondary"> ' . $_SESSION['status'] . '</h2>';
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="table-responsive">
                        <?php
                        $query = " SELECT * 
                        FROM users
                        INNER JOIN
                        roles USING (role_id)";
                        $query_run = mysqli_query($conn, $query);
                        ?>
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                    <!-- <th>Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['first_name'] . "" . $row['last_name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <td><?php echo $row['role_name']; ?></td>
                                            <td>
                                                <form action="register-edit.php" method="post">
                                                    <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
                                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>

                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                        $stt = $stt + 1;;
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="code.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="first_name" id="inputFirstName" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="last_name" id="inputLastName" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="phone" class="form-control form-control-user" name="phone" id="inputPhone" placeholder="Phone number">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="inputEmail" placeholder="Email Address">
                                </div>                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="street_address" id="inputStreetAddress" placeholder="Street Address">
                                </div>
                                </div>                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="city" id="inputCity" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="state" id="inputState" placeholder="State">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="zip_code" id="inputZipCode" placeholder="Zip Code">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="order_note" id="inputOrderNote" placeholder="Order note">
                                </div>
                                <div class="form-group ">
                                    <input type="password" class="form-control form-control-user" name="password" id="inputPassword" placeholder="Password">
                                </div>
                                <div class="form-group ">
                                    <input type="password" class="form-control form-control-user" name="confirmpassword" id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                                <button type="submit" name="registerbtn" class="btn btn-primary btn-user btn-block">Register</button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <?php
    // include("includes/footer.php");
    include("includes/script.php");
    ob_end_flush();
    ?>