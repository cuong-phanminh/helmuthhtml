<?php
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
                        <h1 class="page-title"><?php  echo $child_cate_name; ?></h1>
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
                            if(mysqli_num_rows($query_run) > 0)        
                            {
                                
                                while($row = mysqli_fetch_assoc($query_run))
                                {
                                ?>
                                    <div class="product-item poly-furniture">

                                        <a href="#" class="product__link"></a>
                                        <div class="product-item-inner">
                                            <a href="#" class="product__link">
                                            </a>
                                            <a href="/product-detail.php?child_cate_name=<?php  echo $child_cate_name;?>&&product_id=<?php  echo $row['product_dt_id']; ?>">
                                                <img alt="Swing Chains" src="<?php  echo "/src/images/".$row['img_url']; ?>">
                                            </a>

                                            <div class="caption">
                                                <div class="product-title">
                                                    <a href="#">
                                                        <p class="product-title"> <?php  echo $row['product_name']; ?></p>
                                                    </a>
                                                </div>
                                                <div class="product-subtitle">
                                                    <div class="price">
                                                        <span
                                                            class="price-currencySymbol">$</span><?php  echo $row['price']; ?></span></span>
                                                    </div>
                                                    <form action="#" class="cart" method="post" enctype="multipart/form-data">
                                                        <input type="number" step="1" min="0" name="quantity" value="1" title="Qty"
                                                            class="form-control input-text qty pull-left" size="4">
                                                        <button type="submit" class="btn add-to-cart ">Add to cart</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                        <?php
                                } 
                            }
                        else {
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
include("footer.php")
?>



<!-- $query = " SELECT pro.product_name, pro_dt.price, img.img_url FROM child_cate_name cate join productss pro, product_detailss pro_dt, prooduct_image_relationship pro_img_rel, images img  
                        where cate.child_cate_name='$child_cate_name' and pro.child_cate_id=cate.child_cate_id and pro_dt.product_id =pro.product_id and pro_img_rel.product_dt_id=pro_dt.product_dt_id and img.img_id=pro_img_rel.img_id"; -->