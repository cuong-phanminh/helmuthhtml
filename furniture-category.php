<?php
ob_start();
include("admin/includes/db.inc.php");
include("header.php");
//get child_cate_name in url 
$child_cate_name = $_GET['child_category'];
?>

<div class="fluid wrap main-section" id="wrap-main-section">

    <div id="content" class="content">
        <div class="row bg">
            <main class="main col-sm-12 main_list_product " role="main">
                <div class="header-product-wrap">
                    <div class="content-header">
                        <h1 class="page-title"><?php echo $child_cate_name; ?></h1>
                        <div class="section-sub-title"> </div>
                    </div>
                </div>
                <div class="product-listing paginated">

                    <?php
                    $query = " SELECT 
                        product_dt_id,
                        product_name,
                        price,
                        img_url,
                        quantity 
                        FROM
                        child_category
                        INNER JOIN
                        products USING (child_cate_id )
                        INNER JOIN
                        product_details USING (product_id )
                        INNER JOIN
                        prooduct_image_relationship USING (product_dt_id  )
                        INNER JOIN
                        images USING (img_id) where child_cate_name = '$child_cate_name'
                        ORDER BY 
                            product_id";
                    $query_run = mysqli_query($conn, $query);

                    ?>

                    <div class="product-listing-inner products">
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {

                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <div class="product-item poly-furniture">

                                    <a href="#" class="product__link"></a>
                                    <div class="product-item-inner">
                                        <a href="#" class="product__link">
                                        </a>
                                        <a href="/product-detail.php?child_cate_name=<?php echo $child_cate_name; ?>&&product_id=<?php echo $row['product_dt_id']; ?>">
                                            <img alt="Swing Chains" src="<?php echo "/src/images/" . $row['img_url']; ?>">
                                        </a>

                                        <div class="caption">
                                            <div class="product-title">
                                                <a href="#">
                                                    <p class="product-title"> <?php echo $row['product_name']; ?></p>
                                                </a>
                                            </div>
                                            <div class="product-subtitle">
                                                <div class="price">
                                                    <span class="price-currencySymbol">$</span><?php echo $row['price']; ?></span></span>
                                                </div>
                                                <form action="/furniture-category.php?child_category=<?php echo $child_cate_name; ?>&&product_id=<?php echo $row['product_dt_id']; ?>" class="cart" method="post" enctype="multipart/form-data">
                                                    <input type="number" step="1" min="0" name="quantity" value="1" title="Qty" class="form-control input-text qty pull-left" size="4">
                                                    <button type="submit" name="add-to-cart" class="btn add-to-cart ">Add to cart</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

                    </div>
            </main><!-- /.main -->

            <div class="clearfix"></div>
        </div>
    </div><!-- /.content -->
</div>

<?php
if (isset($_POST["add-to-cart"])) {
    $product_id = $_GET["product_id"];
    $query = "SELECT 
        product_dt_id,
        product_name,
        price,
        img_url,
        quantity 
        FROM
        child_category
        INNER JOIN
        products USING (child_cate_id )
        INNER JOIN
        product_details USING (product_id )
        INNER JOIN
        prooduct_image_relationship USING (product_dt_id  )
        INNER JOIN
        images USING (img_id) where product_dt_id = " . $product_id;

    $query_run = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION["cart"], "product_id");
            if (!in_array($_GET["product_id"], $item_array_id)) {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["product_id"],
                    'img_url' => $row['img_url'],
                    'product_name' => $row['product_name'], 
                    'item_quantity' => $_POST["quantity"]
                );
                $_SESSION["cart"][$count] = $item_array;
            } else {
                $cnt = 0;
                foreach ($_SESSION["cart"] as $keys => $values) {

                    if ($values["product_id"] == $_GET["product_id"]) {

                        $_SESSION["cart"][$cnt]['item_quantity'] += $_POST['quantity'];
                    }
                    $cnt++;
                }
            }
            ?>
                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
            <?php
        } else {
            $item_array = array(
                'product_id' => $_GET["product_id"],
                'img_url' => $row['img_url'],
                'product_name' => $row['product_name'],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][0] = $item_array;
        }
        header("Refresh:0");
    }
}
?>


<?php  
include("footer.php");
ob_end_flush();
?>
