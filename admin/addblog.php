<?php

include("includes/db.inc.php");
include("includes/header.php");
include("includes/navbar.php");


include("./includes/configs.php");
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
                    <h6 class="m-0 font-weight-bold text-primary"> Blog

                    </h6>
                </div>

                <div id="addblog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Add an Blog!</h1>
                                        </div>
                                        <form class="blog" action="code.php" method="POST">

                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-blog" name="blogname" id="blogname" placeholder="Blog name">
                                            </div>
                                            <div class="form-group ">
                                                <input type="textarea" style="min-height: 50px;" class="form-control form-control-blog" name="blogcontent" id="blogcontent" placeholder="Blog content">
                                            </div>
                                            <button type="submit" name="addblogSubmit" class="btn btn-primary btn-user btn-block">Add blog</button>
                                        </form>
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