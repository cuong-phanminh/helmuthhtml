<?php
include("admin/includes/db.inc.php");
?>




<?php
if (isset($_POST["checkout_place_order"])) {

    $billing_first_name = isset($_POST['billing_first_name']) ? $_POST['billing_first_name'] : '';
    // $productCategory = isset($_POST['categories']) ? $_POST['categories'] : '';
    // $productQuantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
    // $productDescription = isset($_POST['description']) ? $_POST['description'] : '';
    // $productModelyear = isset($_POST['modelyear']) ? $_POST['modelyear'] : '';
    // $productImage = isset($_POST['image']) ? $_POST['image'] : '';
    // $productPrice = isset($_POST['price']) ? $_POST['price'] : '';
    $billing_first_name = $_POST['billing_first_name'];
    $billing_last_name = $_POST['billing_last_name'];
    $billing_address_1 = $_POST['billing_address_1'];
    $billing_address_2 = $_POST['billing_address_2'];
    $billing_city = $_POST['billing_city'];
    $billing_state = $_POST['billing_state'];
    $billing_postcode = $_POST['billing_postcode'];
    $billing_phone = $_POST['billing_phone'];
    $billing_email = $_POST['billing_email'];

    $errors[] = "";
    /*
     * Validate posted values.
     */
    // if (empty($billing_first_name)) {
    //     $errors[] = 'Please provide a product 1.';
    // }
    if (empty($billing_first_name)) {
        $errors[] = 'Please provide a product 2.';
    }
    if (empty($billing_last_name)) {
        $errors[] = 'Please provide a product 3.';
    }
    if (empty($billing_first_name)) {
        $errors[] = 'Please provide a product 4.';
    }
    if (empty($billing_first_name)) {
        $errors[] = 'Please provide a product 5.';
    }
    if (empty($billing_first_name)) {
        $errors[] = 'Please provide a product 6.';
    }

    if($errors != 0){
        foreach ($errors as &$value) {
            echo $value?>
            </br>
            <?php
        }
    }

    // if (empty($productDescription)) {
    //     $errors[] = 'Please provide a description.';
    // }

    // if (empty($productModelyear)) {
    //     $errors[] = 'Please provide a productModelyear.';
    // }
    // if (empty($productImage)) {
    //     $errors[] = 'Please provide a productImage.';
    // }
    // if (empty($productPrice)) {
    //     $errors[] = 'Please provide the productPrice.';
    // }

    // if ($_POST['ship_to_different_address'] == 'value1') {     
    if ($_POST['ship_to_different_address']=="1") {
        echo "ok";
    } else {
        echo "no ok";
    }
}
?>