<?php

include("includes/db.inc.php");
include("includes/header.php");
include("includes/navbar.php");


include("./includes/configs.php");



$productSaved = FALSE;

if (isset($_POST["addproductSubmit"])) {
    /*
     * Read posted values.
     */
    
    // $productName = isset($_POST['name']) ? $_POST['name'] : '';
    // $productCategory = isset($_POST['categories']) ? $_POST['categories'] : '';
    // $productQuantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
    // $productDescription = isset($_POST['description']) ? $_POST['description'] : '';
    // $productModelyear = isset($_POST['modelyear']) ? $_POST['modelyear'] : '';
    // $productImage = isset($_POST['image']) ? $_POST['image'] : '';
    // $productPrice = isset($_POST['price']) ? $_POST['price'] : '';
    $productName = $_POST['productname'];
    $productCategory = $_POST['child_category'];
    $productQuantity = $_POST['quantity'];
    $productDescription = $_POST['description'];
    $productModelyear = $_POST['modelyear'];
    $productImage = $_POST['image'];
    $productPrice = $_POST['price'];


    /*
     * Validate posted values.
     */
    if (empty($productName)) {
        $errors[] = 'Please provide a product name.';
    }

    if ($productQuantity == 0) {
        $errors[] = 'Please provide the quantity.';
    }

    if (empty($productDescription)) {
        $errors[] = 'Please provide a description.';
    }

    if (empty($productModelyear)) {
        $errors[] = 'Please provide a productModelyear.';
    }
    if (empty($productImage)) {
        $errors[] = 'Please provide a productImage.';
    }
    if (empty($productPrice)) {
        $errors[] = 'Please provide the productPrice.';
    }

    /*
     * Create "uploads" directory if it doesn't exist.
     */
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0777, true);
    }

    /*
     * List of file names to be filled in by the upload script 
     * below and to be saved in the db table "products_images" afterwards.
     */
    $filenamesToSave = [];

    $allowedMimeTypes = explode(',', UPLOAD_ALLOWED_MIME_TYPES);

    /*
     * Upload files.
     */
    if (!empty($_FILES)) {
        if (isset($_FILES['file']['error'])) {
            foreach ($_FILES['file']['error'] as $uploadedFileKey => $uploadedFileError) {
                if ($uploadedFileError === UPLOAD_ERR_NO_FILE) {
                    $errors[] = 'You did not provide any files.';
                } elseif ($uploadedFileError === UPLOAD_ERR_OK) {
                    $uploadedFileName = basename($_FILES['file']['name'][$uploadedFileKey]);

                    if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                        $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                        $uploadedFileTempName = $_FILES['file']['tmp_name'][$uploadedFileKey];

                        $uploadedFilePath = rtrim(UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                        if (in_array($uploadedFileType, $allowedMimeTypes)) {
                            if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                                $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                            } else {
                                $filenamesToSave[] = $uploadedFilePath;
                            }
                        } else {
                            $errors[] = 'The extension of the file "' . $uploadedFileName . '" is not valid. Allowed extensions: JPG, JPEG, PNG, or GIF.';
                        }
                    } else {
                        $errors[] = 'The size of the file "' . $uploadedFileName . '" must be of max. ' . (UPLOAD_MAX_FILE_SIZE / 1024) . ' KB';
                    }
                }
            }
        }
    }

    /*
     * Save product and images.
     */
    if (!isset($errors)) {

        

        $query = "INSERT INTO products (child_cate_id,product_name) 
  			  VALUES('$productCategory','$productName')";
                mysqli_query($conn, $query);
                // $_SESSION['success'] = "You are now added in";


        $query_img = "INSERT INTO images (img_url) 
                VALUES('$productImage')";
                mysqli_query($conn, $query_img);
                // $_SESSION['success'] = "You are now added in";

                if ($conn->query($query) === true) {
                    $last_id = $conn->insert_id;
                    
                    $query_product_detailss = "INSERT INTO product_details (product_id,quantity,price,model_year,descriptions) 
                    VALUES('$last_id','$productQuantity','$productPrice','$productModelyear','$productDescription')";
                    mysqli_query($conn, $query_product_detailss);
                    // $_SESSION['success'] = "You are now added in";
                }
                if ($conn->query($query_product_detailss) === true) {
                    $last_product_dt_id = $conn->insert_id;
                    if ($conn->query($query_img) === true) {
                        $last_img_id = $conn->insert_id;
                        echo $last_product_dt_id;   
                    
                    $query_prooduct_image_relationship = "INSERT INTO prooduct_image_relationship (product_dt_id,img_id) 
                    VALUES('$last_product_dt_id','$last_img_id')";
                    mysqli_query($conn, $query_prooduct_image_relationship);
                    // $_SESSION['success'] = "You are now added in";
                }
            }
            ?>
            <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }</script>
           <?php
            } else {
                echo "Error: Add unsuccess " . $conn->error;
                }
              
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
                                        <form class="product" action="" method="POST">
                                            <?php
                                        $query = " SELECT * FROM child_category";
                                        $query_run = mysqli_query($conn, $query);
                                        ?>
                                            <label for="child_category">Category</label>
                                            <select id="child_category" name="child_category">
                                                <?php
                                                if(mysqli_num_rows($query_run) > 0)        
                                                {
                                                    while($row = mysqli_fetch_assoc($query_run))
                                                    {

                                                    ?>

                                                <option value="<?php echo $row['child_cate_id'];?>">
                                                    <?php echo $row['child_cate_name']; ?>
                                                </option>
                                                <?php
                                                } 
                                            }
                                            else {
                                                echo "No Record Found";
                                            }
                                            ?>
                                            </select>

                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-product"
                                                    name="productname" id="productname" placeholder="Product name">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-product"
                                                    name="quantity" id="quantity" placeholder="Quantity">
                                            </div>
                                            <div class="form-group ">
                                                <input type="text" class="form-control form-control-product"
                                                    name="price" id="price" placeholder="Price">
                                            </div>
                                            <div class="form-group ">
                                                <input type="date" class="form-control form-control-product"
                                                    name="modelyear" id="modelyear" placeholder="Model year">
                                            </div>
                                            <div class="form-group ">
                                                <input type="file" class="form-control form-control-product"
                                                    name="image" id="image" placeholder="Product Image">
                                            </div>
                                            <div class="form-group ">
                                                <input type="textarea" style="min-height: 50px;"
                                                    class="form-control form-control-product" name="description"
                                                    id="description" placeholder="Description">
                                            </div>
                                            <button type="submit" name="addproductSubmit"
                                                class="btn btn-primary btn-user btn-block">Add Product</button>
                                            <hr>
                                        </form>
                                        <hr>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"><a href="products.php"
                                                    style="color:#fff">Close</a></button>
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