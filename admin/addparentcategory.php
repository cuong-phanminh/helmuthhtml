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
                    <h6 class="m-0 font-weight-bold text-primary"> Parent Category

                    </h6>
                </div>

                <div id="addparentcategory">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Add an Parent Category!</h1>
                                        </div>
                                        <form class="parentcategory" action="code.php" method="POST">
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-parentcategory" name="parentcategoryname" id="parentcategoryname" placeholder="Parent category name">
                                            </div>
                                            <div class="form-group ">
                                                <input type="file" class="form-control form-control-parentcategory" name="image" id="image" placeholder="Parent category image">
                                            </div>
                                            <div class="form-group ">
                                                <input type="textarea" style="min-height: 50px;" class="form-control form-control-parentcategory" name="slugparentcategory" id="slugparentcategory" placeholder="Description">
                                            </div>
                                            <button type="submit" name="addparentcategorySubmit" class="btn btn-primary btn-user btn-block">Add Parent Category</button>   
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"><a href="categories .php" style="color:#fff">Close</a></button>
                                            <!-- <button type="submit" class="btn btn-primary">Save</button> -->

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