<?php

include("./includes/db.inc.php");
include("./includes/header.php");
include("./includes/navbar.php");




if (isset($_POST['edit_btn'])) {
    $edit_id = $_POST['edit_id'];
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
                    <h6 class="m-0 font-weight-bold text-primary"> Update product </h6>
                </div>

                <div id="addproduct">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Update Product!</h1>
                                        </div>

                                        <?php
                                        $query = " SELECT
                                        product_id,
                                        model_year,
                                        product_dt_id,
                                        product_name,
                                        price,
                                        img_url,
                                        quantity,
                                        descriptions
                                        FROM
                                        products
                                        INNER JOIN
                                        product_details USING (product_id )
                                        INNER JOIN
                                        prooduct_image_relationship USING (product_dt_id )
                                        INNER JOIN
                                        images USING (img_id)
                                        where product_id = '$edit_id'";
                                        $query_run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                                <form action="actionupdateproduct.php?id=<?php echo $edit_id;?>" method="POST">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-product" name="update_productname" id="productname" value="<?php echo $row['product_name']; ?>" placeholder="Product name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control form-control-product" name="update_quantity" id="quantity" value="<?php echo $row['quantity']; ?>" placeholder="Quantity">
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control form-control-product" name="update_price" id="price" value="<?php echo $row['price']; ?>" placeholder="Price">
                                                    </div>
                                                    <!-- <div class="form-group ">
                                                        <input type="date" class="form-control form-control-product" name="update_modelyear" id="modelyear" value="<?php echo $row['model_year']; ?>" placeholder="Model year">
                                                    </div> -->
                                                    <div class="form-group ">
                                                        <input type="file" class="form-control form-control-product" name="update_image" id="image" value="<?php echo $row['descriptions']; ?>" placeholder="Product Image">
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="textarea" style="min-height: 50px;" class="form-control form-control-product" name="update_description" id="description" value="<?php echo $row['descriptions']; ?>" placeholder="Description">
                                                    </div>
                                                    <button type="submit" name="updateproductSubmit" class="btn btn-primary btn-user btn-block">Add Product</button>
                                                    <hr>
                                                </form>
                                        <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                        ?>
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