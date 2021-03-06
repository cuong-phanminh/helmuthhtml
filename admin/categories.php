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
                    <h6 class="m-0 font-weight-bold text-primary"> Category
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addparentcategory">
                            Add Parent Category
                        </button> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addparentcategory">
                            <a href="addparentcategory.php" style="color:#fff"> Add Parent Category</a>
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
                        $query = " SELECT
                        *
                        FROM
                        parent_category";
                        $query_run = mysqli_query($conn, $query);

                        ?>
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>    
                                    <th>Categry ID</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Slug</th>

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
                                            <td><?php echo $row['parent_cate_id']; ?></td>
                                            <td><?php echo $row['parent_cate_name']; ?></td>
                                            <td><img src="<?php echo "/src/images/" . $row['url_img']; ?>" alt="image" style="width:100px"></td>
                                            <td><?php echo $row['slug_parent_cate']; ?></td>
                                            <td>
                                                <form action="updateparentcategory.php" method="post">
                                                    <input type="hidden" name="edit_parent_cate_id" value="<?php echo $row['parent_cate_id']; ?>">
                                                    <button type="submit" name="edit_parent_cate_btn" class="btn btn-success"> EDIT</button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="code.php" method="post" onSubmit="return confirm('Bạn muốn xóa category này?')">
                                                    <input type="hidden" name="delete_parent_cate_id" value="<?php echo $row['parent_cate_id']; ?>">
                                                    <button type="submit" name="delete_parent_cate_btn" class="btn btn-danger">
                                                        DELETE</button>
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
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add an Product!</h1>
                            </div>
                            <form class="product" action="code.php" method="POST">

                                <?php
                                foreach ($get_category() as $category) { ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                <?php } ?>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-product" name="" id="exampleFirstName" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group ">
                                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
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
                                <a class="small" href="login.html">Already have an account? Login!</a>
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
    include("includes/script.php");
    include("includes/footer.php");
    ob_end_flush();
    ?>