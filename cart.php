<?php
include("header.php")
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
                        <div class="">
                            <form action="https://helmuthbuilders.com/cart/" method="post">


                                <table class="shop_table cart table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1 product-remove"> &nbsp;
                                            </th>
                                            <th class="col-sm-2 product-thumbnail hidden-xs"> &nbsp;
                                            </th>
                                            <th class="col-sm-3 product-name"> Product </th>
                                            <th class="col-sm-2 product-price"> Price </th>
                                            <th class="col-sm-2 product-quantity"> Quantity </th>
                                            <th class="col-sm-2 product-subtotal text-right"> Total </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="cart_item">

                                            <td class="col-sm-1 product-remove"> <a
                                                    href="https://helmuthbuilders.com/cart/?remove_item=c56a022b15250525f8b9bdfc41a13152&amp;_wpnonce=f9c9c30a9c"
                                                    class="btn btn-danger remove" title="Remove this item"><i
                                                        class="el-icon-remove"></i></a> </td>
                                            <td class="col-sm-2 product-thumbnail hidden-xs"> <img width="300"
                                                    height="300"
                                                    src="https://daf9p2mnm4nrk.cloudfront.net/uploads/2018/04/luxcraft-wood-swingchain-stainlesssteel-300x300.jpg"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                    alt=""
                                                    srcset="https://daf9p2mnm4nrk.cloudfront.net/uploads/2018/04/luxcraft-wood-swingchain-stainlesssteel-300x300.jpg 300w, https://daf9p2mnm4nrk.cloudfront.net/uploads/2018/04/luxcraft-wood-swingchain-stainlesssteel-150x150.jpg 150w, https://daf9p2mnm4nrk.cloudfront.net/uploads/2018/04/luxcraft-wood-swingchain-stainlesssteel-400x400.jpg 400w, https://daf9p2mnm4nrk.cloudfront.net/uploads/2018/04/luxcraft-wood-swingchain-stainlesssteel-100x100.jpg 100w"
                                                    sizes="(max-width: 300px) 100vw, 300px"> </td>
                                            <td class="col-sm-3 product-name"> Swing Chains </td>
                                            <td class="col-sm-2 product-price"> <span class="price-amount amount"><span
                                                        class="price-currencySymbol">$</span>65</span> </td>
                                            <td class="col-sm-2 product-quantity">
                                                <div class="quantity"><input type="number" step="1" min="0"
                                                        name="cart[c56a022b15250525f8b9bdfc41a13152][qty]" value="1"
                                                        title="Qty"
                                                        class="form-control input-text qty text input-lg pull-left"
                                                        size="4"></div>
                                            </td>
                                            <td class="col-sm-2 product-subtotal text-right"> <span
                                                    class="price-amount amount"><span
                                                        class="price-currencySymbol">$</span>65</span> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <div class="cart-collaterals">
                                                    <div class="cart_totals ">
                                                        <!-- <h2>Cart Totals</h2> -->
                                                        <table cellspacing="0">
                                                            <tbody>
                                                                <tr class="cart-subtotal">
                                                                    <th class="cart-subtotal">Cart Subtotal</th>
                                                                    <td class="price-amount"><span
                                                                            class="price-amount amount"><span
                                                                                class="price-currencySymbol">$</span>65</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="shipping">
                                                                    <th>Shipping and Handling</th>
                                                                    <td> Free shipping <input type="hidden"
                                                                            name="shipping_method[0]" data-index="0"
                                                                            id="shipping_method_0"
                                                                            value="free_shipping:4"
                                                                            class="shipping_method">
                                                                    </td>
                                                                </tr>

                                                                <tr class="order-total">
                                                                    <th>Order Total</th>
                                                                    <td><strong><span class="price-amount amount"><span
                                                                                    class="price-currencySymbol">$</span>65</span></strong>
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
                                                    <!-- <div class="btn-group" style="width: 100%;">
                                                        <input type="submit" class="col-xs-6 btn btn-default "
                                                            name="update_cart" value="Update Cart">
                                                        <input type="submit"
                                                            class="col-xs-6 btn btn-primary  checkout-button wc-forward"
                                                            name="proceed" value="Proceed to Checkout">
                                                    </div> -->

                                                    <a href="http://helmuthhtml.local/checkout.php#"
                                                        class="checkout-button">
                                                       <button class="btn-group">Proceed to checkout</button> </a>
                                                    <hr>
                                                </div>
                                                <div class="clearfix"></div> <input type="hidden" id=""
                                                    name="" value="f9c9c30a9c"><input type="hidden"
                                                    name="" value="/cart/">
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="clearfix"></div>

                                <div class="clearfix"></div>
                            </form>

                            <div class="clearfix"></div>

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
include("footer.php")
?>