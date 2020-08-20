
<?php
include("./includes/db.inc.php");
include("./includes/configs.php");

$edit_id = $_GET['id'];

if (isset($_POST["updateproductSubmit"])) {
    /*
     * Read posted values.
     */

    $update_productName = $_POST['update_productname'];
    $update_productQuantity = $_POST['update_quantity'];
    $update_productDescription = $_POST['update_description'];
    $update_productModelyear = date("Y/m/d");//$_POST['update_modelyear'];
    $update_productImage =  $_POST['update_image'];
    $update_productPrice = $_POST['update_price'];


    /*
     * Validate posted values.
     */
    if (empty($update_productName)) {
        $errors[] = 'Please provide a product name.';
    }

    if ($update_productQuantity == 0) {
        $errors[] = 'Please provide the quantity.';
    }

    if (empty($update_productDescription)) {
        $errors[] = 'Please provide a description.';
    }

    if (empty($update_productModelyear)) {
        $errors[] = 'Please provide a productModelyear.';
    }
    if (empty($update_productImage)) {
        $errors[] = 'Please provide a productImage.';
    }
    if (empty($update_productPrice)) {
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

        $query = " UPDATE products
        INNER JOIN product_details ON products.product_id = product_details.product_id
        INNER JOIN prooduct_image_relationship ON product_details.product_dt_id  = prooduct_image_relationship.product_dt_id 
        INNER JOIN images ON prooduct_image_relationship.img_id = images.img_id 
        SET products.product_name= '$update_productName',
            product_details.quantity  = '$update_productQuantity',
            product_details.price   = '$update_productPrice',
            product_details.model_year   = '$update_productModelyear',
            product_details.descriptions   = '$update_productDescription',
            images.img_url   = '$update_productImage'
        WHERE products.product_id = '$edit_id'";
         mysqli_query($conn, $query);
         echo "Update success ";
         header("Refresh:2; url=products.php");
        
         ?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
<?php
    } else {
        echo "Error: Update unsuccess ";
        header("Refresh:2; url=products.php");
    }
}