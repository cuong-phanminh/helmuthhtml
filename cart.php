<?php
include("admin/includes/db.inc.php");
include("header.php");

?>

<div class="fluid wrap main-section" id="wrap-main-section">
    <div class="wrap-top-page">
        <h1 class="page-heading">Cart</h1>
    </div>

    <div id="content" class="content">
        <div class="top-content">
            <main class="main col-sm-12">
                <div id="container">
                    <div id="main">
                        <div class="cart">
                            <?php
                            $subtotal = 0;
                            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                            ?>
                                <form action="/checkout.php" method="post">

                                    <table class="shop_table cart table" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1 product-remove"> &nbsp;</th>
                                                <th class="col-sm-2 product-thumbnail hidden-xs"> &nbsp;</th>
                                                <th class="col-sm-3 product-name"> Product </th>
                                                <th class="col-sm-2 product-price"> Price </th>
                                                <th class="col-sm-2 product-quantity"> Quantity </th>
                                                <th class="col-sm-2 product-subtotal text-right"> Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                    $id = $_SESSION['cart'][$key]["product_id"];
                                                    $quantity = $_SESSION['cart'][$key]["item_quantity"];
                                                    $query = "SELECT * FROM product_details where product_dt_id ='$id'";
                                                    $query_run = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                        $price = $row['price'];
                                                    }

                                                    $total = $quantity * $price;
                                                    $subtotal = $subtotal + $total;
                                                    $ordertotal = $subtotal;
                                            ?>

                                                    <tr class="cart_item">
                                                        <td class="col-sm-1 product-remove"> <a id="<?php echo 'rm-'.$id ?>" name="remove_product" class=" btn btn-danger remove" title="Remove this item"><i class="fa fa-remove fa-2x"></i></a> </td>
                                                        <td class="col-sm-2 product-thumbnail hidden-xs"> <img width="100" height="300" src="<?php echo "/src/images/" . ($_SESSION['cart'][$key]["img_url"]); ?>" class="" alt="" sizes="(max-width: 300px) 100vw, 300px"> </td>
                                                        <td class="col-sm-3 product-name"><?php echo ($_SESSION['cart'][$key]["product_name"]); ?> </td>
                                                        <td class="col-sm-2 product-price"> <span class="price-amount amount"><span class="price-currencySymbol">$</span><?php echo $price; ?></span> </td>
                                                        <td class="col-sm-2 product-quantity">
                                                            <div class="quantity">
                                                                <input type="number" step="1" min="0" name="pro_quantity" id="<?php echo $id ?>" title="Qty" value="<?php echo $quantity; ?>" class="form-control input-text qty text input-lg" size="4">
                                                            </div>
                                                        </td>
                                                        <td class="col-sm-2 product-subtotal text-right"> <span class="price-amount amount"><span class="price-currencySymbol">$</span><?php echo $total ?></span> </td>
                                                    </tr>
                                            <?php
                                                }
                                            ?>



                                            <tr>
                                                <td colspan="6">
                                                    <div class="cart-collaterals">
                                                        <div class="cart_totals ">
                                                            <!-- <h2>Cart Totals</h2> -->
                                                            <table cellspacing="0">
                                                                <tbody>
                                                                    <tr class="cart-subtotal">
                                                                        <th class="cart-subtotal">Cart Subtotal</th>
                                                                        <td class="price-amount"><span class="price-amount amount"><span class="price-currencySymbol">$</span><?php echo $subtotal; ?></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="order-total">
                                                                        <th>Order Total</th>
                                                                        <td><strong><span class="price-amount amount"><span class="price-currencySymbol">$</span><?php echo $ordertotal; ?></span></strong>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="actions">
                                                    <div class="col-xs-12">
                                                        <hr>
                                                    </div>
                                                    <div class="cart-actions">

                                                        <a href="http://helmuthhtml.local/checkout.php#" class="checkout-button">
                                                            <button class="btn-group">Proceed to checkout</button> </a>
                                                        <hr>
                                                    </div>
                                                    <div class="clearfix"></div> <input type="hidden" id="" name="" value="f9c9c30a9c"><input type="hidden" name="" value="/cart/">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="clearfix"></div>

                                    <div class="clearfix"></div>
                                </form>
                            <?php
                            } else {
                            ?>
                            <div class="cart">
                                    <div class="alert alert-warning alert-dismissable cart-empty">  Your cart is currently empty.</div>
                                    <p class="return-to-shop">
                                            <a class="btn btn-primary btn-block cart-backward" href="/furniture.php">Return To Shop</a>
                                    </p>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </main><!-- /.main -->

            <div class="clearfix"></div>
        </div>
    </div><!-- /.content -->
</div>


<?php
include("footer.php");  

?>