<?php
session_start();
include("includes/db.inc.php");

//login start
if (isset($_POST['login_btn'])) {
     $email_login = $_POST['emaill'];
     $password_login = $_POST['passwordd'];

     $query = "SELECT * FROM users WHERE email='$email_login' AND password='$password_login' LIMIT 1";
     $query_run = mysqli_query($conn, $query);

     if (mysqli_fetch_array($query_run)) {
          $_SESSION['username'] = $email_login;
          header('Location: admin.php');
     } else {
          $_SESSION['status'] = "Email / Password is Invalid";
          header('Location: login.php');
     }
} //end login



//start add product
$productSaved = FALSE;

if (isset($_POST["addproductSubmit"])) {
     /*
     * Read posted values.
     */
     $productName = $_POST['productname'];
     $productCategory = $_POST['child_category'];
     $productQuantity = $_POST['quantity'];
     $productDescription = $_POST['description'];
     $productModelyear = date("Y/m/d");
     $productImage = $_POST['image'];
     $productPrice = $_POST['price'];


     /*
     * Validate posted values.
     */
     if (empty($productName)) {
          $errors[] = 'Please provide a product name.';
     }

     if ($productQuantity < 1) {
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
     * List of file names to be filled in by the upload script 
     * below and to be saved in the db table "products_images" afterwards.
     */
     $filenamesToSave = [];

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


          $query_img = "INSERT INTO images (img_url) 
                VALUES('$productImage')";
          mysqli_query($conn, $query_img);

          if ($conn->query($query) === true) {
               $last_id = $conn->insert_id;

               $query_product_detailss = "INSERT INTO product_details (product_id,quantity,price,model_year,descriptions) 
                    VALUES('$last_id','$productQuantity','$productPrice','$productModelyear','$productDescription')";
               mysqli_query($conn, $query_product_detailss);
          }
          if ($conn->query($query_product_detailss) === true) {
               $last_product_dt_id = $conn->insert_id;
               if ($conn->query($query_img) === true) {
                    $last_img_id = $conn->insert_id;
                    echo $last_product_dt_id;

                    $query_prooduct_image_relationship = "INSERT INTO prooduct_image_relationship (product_dt_id,img_id) 
                    VALUES('$last_product_dt_id','$last_img_id')";
                    mysqli_query($conn, $query_prooduct_image_relationship);

                    echo "Add product success ";
                    header("Refresh:2; url=products.php");
               }
          }
?>
          <script>
               if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
               }
          </script>
     <?php
     } else {
          echo "Error: Add product unsuccess " . $conn->error;
          header("Refresh:2; url=products.php");
     }
} //end add product

//delete product start
if (isset($_POST['delete_btn'])) {
     $delete_id = $_POST['delete_id'];

     $sql = "DELETE FROM products WHERE product_id= '$delete_id'";
     $sql1 = "DELETE FROM product_details WHERE product_id= '$delete_id'";
     if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
          echo "Record deleted successfully";
          header("Location: /admin/products.php");
     } else {
          echo "Error deleting record: " . $conn->error;
     }

     $conn->close();
} //end delete product 





//start update product
if (isset($_POST["updateproductSubmit"])) {
     $edit_id = $_GET['id'];
     /*
     * Read posted values.
     */

     $update_productName = $_POST['update_productname'];
     $update_productQuantity = $_POST['update_quantity'];
     $update_productDescription = $_POST['update_description'];
     $update_productModelyear = date("Y/m/d"); //$_POST['update_modelyear'];
     $update_productImage =  $_POST['update_image'];
     $update_productPrice = $_POST['update_price'];


     /*
     * Validate posted values.
     */
     if (empty($update_productName)) {
          $errors[] = 'Please provide a product name.';
     }

     if ($update_productQuantity  < 1) {
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
     * List of file names to be filled in by the upload script 
     * below and to be saved in the db table "products_images" afterwards.
     */
     $filenamesToSave = [];


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
} // end update product



// add blog start
if (isset($_POST['addblogSubmit'])) {
     $blog_name = $_POST['blogname'];
     $blog_content = $_POST['blogcontent'];
     $date = date("Y/m/d");
     $email = $_SESSION['username'];

     $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
     $query_run = mysqli_query($conn, $query);

     if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {

               $user_id = $row['user_id'];
               $query_blog = "INSERT INTO blogs (user_id, blog_name) 
          VALUES('$user_id', '$blog_name')";
               mysqli_query($conn, $query_blog);

               if ($conn->query($query_blog) == true) {
                    $last_id = $conn->insert_id;

                    $query_blog_detail = "INSERT INTO blog_detail (blog_id, blog_category_id, publication_date, blog_content) 
                       VALUES('$last_id','','$date','$blog_content')";
                    mysqli_query($conn, $query_blog_detail);
                    echo "Add blog success ";
                    header("Refresh:2; url=blogs.php");
               } else {
                    echo "Error: Add blog unsuccess ";
                    header("Refresh:2; url=blogs.php");
               }
          }
     }
} //end add blog

// update blog start
if (isset($_POST['updateblogSubmit'])) {
     $update_id = $_GET['id'];
     $blog_name = $_POST['updateblogname'];
     $blog_content = $_POST['updateblogcontent'];
     $date = date("Y/m/d");
     $email = $_SESSION['username'];


     $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
     $query_run = mysqli_query($conn, $query);

     if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {

               $user_id = $row['user_id'];
               echo $user_id;
               $query = " UPDATE blogs
               INNER JOIN blog_detail ON blogs.blog_id  = blog_detail.blog_id 
               SET blogs.user_id= '$user_id',
                    blogs.blog_name  = '$blog_name',
                    blog_detail.publication_date  = '$date',
                    blog_detail.blog_content   = '$blog_content'
               WHERE blogs.blog_id = '$update_id'";
               mysqli_query($conn, $query);
               if ($conn->query($query) == true) {
                    echo "Update success ";
                    header("Refresh:2; url=blogs.php");
               } else {
                    echo "Update unsuccess ";
                    header("Refresh:2; url=blogs.php");
               }
          }
     }

     ?>
     <script>
          if (window.history.replaceState) {
               window.history.replaceState(null, null, window.location.href);
          }
     </script>
     <?php

} //end update blog

//delete product start
if (isset($_POST['delete_blog_btn'])) {
     $delete_id = $_POST['delete_blog_id'];

     $sql = "DELETE FROM blogs WHERE blog_id= '$delete_id'";
     $sql1 = "DELETE FROM blog_detail WHERE blog_id= '$delete_id'";
     if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
          echo "Record deleted successfully";
          header("Refresh:2; url=blogs.php");
     } else {
          echo "Error deleting record: " . $conn->error;
          header("Refresh:2; url=blogs.php");
     }

     $conn->close();
} //end delete product 

//start add parent category
if (isset($_POST["addparentcategorySubmit"])) {
     /*
     * Read posted values.
     */
     $parentcategoryName = $_POST['parentcategoryname'];
     $slugparentcategory = $_POST['slugparentcategory'];
     $parentcategoryImage = $_POST['image'];


     /*
     * Validate posted values.
     */
     if (empty($parentcategoryName)) {
          $errors[] = 'Please provide a parentcategory name.';
     }

     if (empty($slugparentcategory)) {
          $errors[] = 'Please provide a slug parent category.';
     }

     if (empty($parentcategoryImage)) {
          $errors[] = 'Please provide a parent category image.';
     }

     /*
     * List of file names to be filled in by the upload script 
     * below and to be saved in the db table "parentcategorys_images" afterwards.
     */
     $filenamesToSave = [];

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
     * Save parentcategory and images.
     */
     if (!isset($errors)) {

          $query = "INSERT INTO parent_category (parent_cate_name,url_img,slug_parent_cate) 
  			  VALUES('$parentcategoryName','$parentcategoryImage', '$slugparentcategory')";
          mysqli_query($conn, $query);

          if ($conn->query($query) === true) {
               echo "Add parentcategory success ";
               header("Refresh:2; url=categories.php");
          }
     ?>
          <script>
               if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
               }
          </script>
     <?php
     } else {
          echo "Error: Add parentcategory unsuccess " . $conn->error;
          header("Refresh:2; url=categories.php");
     }
} //end add parent category


//start update parent category
if (isset($_POST["updateparentcategorySubmit"])) {
     $edit_id = $_GET['id'];
     /*
     * Read posted values.
     */

     $update_parent_cateName = $_POST['updateparentcategoryname'];
     $update_parent_slug = $_POST['updateslugparentcategory'];
     $update_parent_cateImage =  $_POST['updateimage'];


     /*
     * Validate posted values.
     */
     if (empty($update_parent_cateName)) {
          $errors[] = 'Please provide a parent category name.';
     }

     if (empty($update_parent_slug)) {
          $errors[] = 'Please provide a parent slug.';
     }
     if (empty($update_parent_cateImage)) {
          $errors[] = 'Please provide a parent category Image.';
     }


     /*
     * List of file names to be filled in by the upload script 
     * below and to be saved in the db table "products_images" afterwards.
     */
     $filenamesToSave = [];


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
     * Save parent category and images.
     */
     if (!isset($errors)) {

          $query = " UPDATE parent_category
        SET parent_category.parent_cate_name= '$update_parent_cateName',
               parent_category.url_img  = '$update_parent_cateImage',
               parent_category.slug_parent_cate   = '$update_parent_slug'
        WHERE parent_category.parent_cate_id  = '$edit_id'";
          mysqli_query($conn, $query);
          if ($conn->query($query) === TRUE) {
               echo "Update success ";
               header("Refresh:2; url=categories.php");
          }

     ?>
          <script>
               if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
               }
          </script>
<?php
     } else {
          echo "Error: Update unsuccess ";
          header("Refresh:2; url=categories.php");
     }
} // end update parentcategory


//delete parent category start
if (isset($_POST['delete_parent_cate_btn'])) {
     $delete_id = $_POST['delete_parent_cate_id'];

     $sql = "DELETE FROM parent_category WHERE parent_cate_id = '$delete_id'";
     if ($conn->query($sql) === TRUE && $conn->query($sql) === TRUE) {
          echo "Record deleted successfully";
          header("Refresh:2; url=categories.php");
     } else {
          echo "Error deleting record: " . $conn->error;
          header("Refresh:2; url=categories.php");
     }

     $conn->close();
} //end delete parent category 
