<?php
include("./admin/includes/db.inc.php");
include("header.php");
//get child_cate_name in url 
$child_cate_name = $_GET['child_cate_name'];
$product_dt_id1 = $_GET['product_id'];
// echo $child_cate_name;
// die();

?>



<main class="main col-sm-12" role="main">
    <div class="col-sm-12" id="col-sm-12">
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
            productss USING (child_cate_id )
            INNER JOIN
            product_detailss USING (product_id )
            INNER JOIN
            prooduct_image_relationship USING (product_dt_id  )
            INNER JOIN
            images USING (img_id  ) where child_cate_name = '$child_cate_name'
            ORDER BY 
                product_id";
            $query_run = mysqli_query($conn, $query);
        
        ?>
        <?php
            if(mysqli_num_rows($query_run) > 0)        
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    
                    if($row['product_dt_id']==$product_dt_id1){
                
            ?>

        <div class="top-content">
            <div class="col-md-6" id="product-image">
                <div class="product-gallery  images" data-columns="4"
                    style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;">
                    <figure class="product-gallery__wrapper">
                        <div class="product-gallery__image">
                            <a href="#" class="fancybox image"><img width="800" height="600"
                                    src="<?php  echo "/src/images/".$row['img_url']; ?>" class="wp-post-image"
                                    alt="Swing Chains"=""="">
                            </a>
                        </div>
                    </figure>
                </div>
            </div>

            <div class="col-md-6" id="details-wrap">
                <div class="details wrap">
                    <h1 itemprop="name" class="product_title entry-title"><?php  echo $row['product_name']; ?></h1>
                    <div itemprop="offers" itemscope="" itemtype="#">
                        <h4 itemprop="price" class="price"><span class="price-amount amount"><span
                                    class="price-currencySymbol">$</span><?php  echo $row['price']; ?></span></h4>
                        <meta itemprop="priceCurrency" content="USD">
                        <link itemprop="availability" href="#">
                    </div>

                    <form class="cart" action="#" method="post" enctype="multipart/form-data">
                        <div class="quantity"><input type="number" step="1" min="1" name="quantity" value="1"
                                title="Qty" class="form-control input-text qty text input-lg pull-left" size="4"></div>
                        <button type="submit" name="add-to-cart" value="3932"
                            class="single_add_to_cart_button button alt">Add to cart</button>
                    </form>

                </div>
            </div>
        </div>
        <?php
                    }
                 }  
                }
        else {
            echo "No Record Found";
        }
        ?>


        <div class="col-md-12">
            <h4 class="section-title title-custom">About Our Manufacturer</h4>
            <p><strong>What is LuxCraft Poly Wood?</strong></p>
            <p>When milk jugs and detergent containers end up in recycling centers, they are used for many
                different purposes. In some cases, these jugs will end up becoming beautiful outdoor
                furniture that lasts for decades, further reducing waste in landfills from traditional
                plastic furniture being replaced every few years. The high density plastics that come from
                these jugs is run through a die and comes out in boards, similar to common wooden planks.
                From there, it is used just like lumber to craft a variety of different items. The unique
                qualities of poly wood make it perfect for outdoor furniture, offering a maintenance-free
                solution that is made to last decades outdoors.<br>
                Extruded with a UV inhibitor and uniform color throughout the material, your new poly
                furniture will not fade or bleach from sun exposure or a long winter frost and spring thaw –
                making them versatile enough for any climate. They are also impervious to chipping, fading,
                cracking, rotting, mold, mildew, and insects – problems that have always plagued wooden
                outdoor pieces. You can spend your time relaxing whenever the weather is right, without
                having to worry about making sure your furniture is ready beforehand.<br>
                With a wide variety of product offerings, each with an array of vibrant solid and two-tone
                color options, you’re sure to find the perfect set to match your unique outdoor decor. Shop
                with us and find out why everyone that owns poly furniture will never go back to traditional
                outdoor furniture again.</p>
        </div>
        <!--          -->

        <div class="related products">

            <h4 class="section-title">Related Products</h4>

           

            <div class="product-listing-inner products">
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
            productss USING (child_cate_id )
            INNER JOIN
            product_detailss USING (product_id )
            INNER JOIN
            prooduct_image_relationship USING (product_dt_id  )
            INNER JOIN
            images USING (img_id  ) where child_cate_name = '$child_cate_name'
            ORDER BY 
                product_id";
            $query_run = mysqli_query($conn, $query);
        
        ?>

            <?php
            if(mysqli_num_rows($query_run) > 0)        
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    if($row['product_dt_id']!=$product_dt_id1){
                 
            ?>

                <div class="col-md-3 product-item  poly-furniture">

                    <a href="#" class="product__link">
                    </a>
                    <div class="product-item-inner"><a href="#" class="product__link">
                        </a><a href="#">
                            <img alt="Swing Springs"
                                src="<?php  echo "/src/images/".$row['img_url']; ?>">
                        </a>

                        <div class="caption">
                            <a href="#">
                                <p class="product-title">Swing Springs</p>
                            </a>
                            <!-- <div class="product-subtitle"></div> -->
                            <span hidden="" class="plain-price">20</span>

                            <span class="price"><span class="price-amount amount"><span
                                        class="price-currencySymbol">$</span>20</span></span>
                            <form action="/furniture/swing-chains/?add-to-cart=3931" class="cart" method="post"
                                enctype="multipart/form-data">
                                <div class="quantity"><input type="number" step="1" min="0" name="quantity" value="1"
                                        title="Qty" class="form-control input-text qty text input-lg pull-left"
                                        size="4">
                                </div><button type="submit"
                                    class="btn add-to-cart add_to_cart_button product_type_simple">Add
                                    to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }  
                        }
                else {
                    echo "No Record Found";
                }
                ?>

            </div>
        </div>

    </div>
    <meta itemprop="url" content="#">

</main>



<?php
include("footer.php")
?>