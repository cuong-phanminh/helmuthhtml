<?php

include("./includes/db.inc.php");
include("./includes/header.php");
include("./includes/navbar.php");




if (isset($_POST['edit_blog_btn'])) {
    $update_id = $_POST['edit_blog_id'];
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
                    <h6 class="m-0 font-weight-bold text-primary"> Update blog </h6>
                </div>

                <div id="addproduct">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Update blog!</h1>
                                        </div>

                                        <?php
                                        $query = " SELECT
                                        *
                                        FROM
                                        blogs
                                        INNER JOIN
                                        blog_detail USING (blog_id )
                                        where blog_id = '$update_id'";
                                        $query_run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                            <form action="code.php?id=<?php echo $update_id; ?>" method="POST">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-blog" name="updateblogname" id="updateblogname" value="<?php echo $row['blog_name']?>" placeholder="Blog name">
                                                </div>
                                                <div class="form-group ">
                                                    <input type="textarea" style="min-height: 50px;" class="form-control form-control-blog" name="updateblogcontent" id="updateblogcontent" value="<?php echo $row['blog_content']?>" placeholder="Blog content">
                                                </div>
                                                <button type="submit" name="updateblogSubmit" class="btn btn-primary btn-blog btn-block">Update blog</button>
                                            </form>
                                        <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                        ?>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"><a href="blogs.php" style="color:#fff">Close</a></button>

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