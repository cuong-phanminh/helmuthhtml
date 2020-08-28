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
                    <h6 class="m-0 font-weight-bold text-primary"> Products

                    </h6>
                </div>

                <div id="addproduct">
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
                                            $query = " SELECT * FROM child_category";
                                            $query_run = mysqli_query($conn, $query);
                                            ?>
                                            <label for="child_category">Category</label>
                                            <select id="child_category" name="child_category">
                                                <?php
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                        <option value="<?php echo $row['child_cate_id']; ?>">
                                                            <?php echo $row['child_cate_name']; ?>
                                                        </option>
                                                <?php
                                                    }
                                                } else {
                                                    echo "No Record Found";
                                                }
                                                ?>
                                            </select>

                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-product" name="productname" id="productname" placeholder="Product name">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-product" name="quantity" id="quantity" placeholder="Quantity">
                                            </div>
                                            <div class="form-group ">
                                                <input type="text" class="form-control form-control-product" name="price" id="price" placeholder="Price">
                                            </div>
                                            <!-- <div class="form-group ">
                                                <input type="date" class="form-control form-control-product" name="modelyear" id="modelyear" placeholder="Model year">
                                            </div> -->
                                            <div class="form-group ">
                                                <input type="file" class="form-control form-control-product" name="image" id="image" placeholder="Product Image">
                                            </div>
                                            <div class="form-group ">
                                                <input type="textarea" style="min-height: 50px;" class="form-control form-control-product" name="description" id="description" placeholder="Description">
                                            </div>
                                            <button type="submit" name="addproductSubmit" class="btn btn-primary btn-user btn-block">Add Product</button>
                                            <hr>
                                        </form>
                                        <hr>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"><a href="products.php" style="color:#fff">Close</a></button>
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