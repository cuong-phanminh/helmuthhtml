<?php

include("./includes/db.inc.php");
include("./includes/header.php");
include("./includes/navbar.php");




if (isset($_POST['edit_parent_cate_btn'])) {
    $edit_id = $_POST['edit_parent_cate_id'];
}
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
                    <h6 class="m-0 font-weight-bold text-primary"> Update parent category </h6>
                </div>

                <div id="updateparentcategory">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Update Parent Category!</h1>
                                        </div>

                                        <?php
                                        $query = " SELECT
                                        *
                                        FROM
                                        parent_category
                                        where parent_cate_id  = '$edit_id'";
                                        $query_run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                            <form class="parentcategory" action="code.php?id=<?php echo $edit_id;?>" method="POST">
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-parentcategory" name="updateparentcategoryname" id="parentcategoryname" value="<?php echo $row['parent_cate_name']; ?>" placeholder="Parent category name">
                                            </div>
                                            <div class="form-group ">
                                                <input type="file" class="form-control form-control-parentcategory" name="updateimage" id="image" placeholder="Parent category image">
                                            </div>
                                            <div class="form-group ">
                                                <input type="textarea" style="min-height: 50px;" class="form-control form-control-parentcategory" name="updateslugparentcategory" id="slugparentcategory" value="<?php echo $row['slug_parent_cate']; ?>" placeholder="Slug parent category">
                                            </div>
                                            <button type="submit" name="updateparentcategorySubmit" class="btn btn-primary btn-user btn-block">Update Parent Category</button>   
                                        </form>
                                        <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                        ?>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"><a href="categories.php" style="color:#fff">Close</a></button>

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
                ?>