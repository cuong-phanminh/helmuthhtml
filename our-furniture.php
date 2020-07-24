<?php
include("./header.php")
?>

<div class="fluid wrap main-section" id="wrap-main-section">
    <div class="wrap-top-page">
        <h1 class="page-heading">Our Furniture</h1>
    </div>

    <div id="content" class="content">
        <div class="row bg">
            <main class="main col-sm-12" role="main">
                <div class="header-product-wrap">
                    <div class="content-header">
                        <div class="section-sub-title">
                            <p>At Helmuth Builders, we’re the Shenandoah Valley’s largest distributor of LuxCraft
                                Outdoor Furniture. LuxCraft’s Adirondack chairs, porch swings, rockers, sun loungers,
                                tables, and other outdoor and patio furniture is built for year-round enjoyment.
                                Creative, comfortable, and colorful, Luxcraft poly furniture is also durable,
                                environmentally-friendly, and super easy to clean and maintain. **Please note: Helmuth
                                Builders does not currently offer local delivery on our outdoor furniture. Extra
                                shipping charges will apply if shipping directly from LuxCraft.</p>
                        </div>
                    </div>
                </div>

                <?php 
                include("./admin/includes/db.inc.php");

                $query = " SELECT * FROM child_category";
                $query_run = mysqli_query($conn, $query);
                
                ?>

                <div class="product-listing paginated">
                    <div class="product-listing-inner products product-cats">
                        <div class="quantity">

                            <?php
                                if(mysqli_num_rows($query_run) > 0)        
                                {
                                    while($row = mysqli_fetch_assoc($query_run))
                                    {
                             ?>
                            <div class="product-cat product-item paginated">
                                <div class="product-item-inner">
                                    <a href="/furniture-category.php?child_category=<?php  echo $row['child_cate_name']; ?>"
                                        class="accessories">
                                        <img width="360" height="240" src="<?php  echo "/src/images/".$row['url_img']; ?>"> </a>
                                    <div class="caption">
                                        <a href="/furniture-category.php?child_category=<?php  echo $row['child_cate_name']; ?>">
                                            <p class="product-title"><?php  echo $row['child_cate_name']; ?></p>
                                        </a>
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