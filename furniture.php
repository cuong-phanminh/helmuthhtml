<?php
include("./header.php");
include("./admin/includes/db.inc.php");
?>


<div class="fluid wrap main-section" id="wrap-main-section">
    <div class="wrap-top-page">
        <h1 class="page-heading">PRODUCTS</h1>
    </div>
    <div id="content" class="content">
        <div class="row bg">
            <main class="main col-sm-12" role="main">
                <div class="header-product-wrap">
                    <div class="content-header" id="content-header">
                        <div class="section-sub-title" id="section-sub-title">
                            <p style="text-align: center; margin-bottom: 30px;">Since 1989 Helmuth Builders has had
                                a
                                single mission – to serve the Shenandoah Valley by providing the best possible
                                product,
                                both in functionality and in quality. We offer a wide variety of structures to cater
                                to
                                our clients’ needs and wants, all while ensuring that our products are the best when
                                it
                                comes to durability and design. Plus, all of our sheds and shelters are fully
                                customizable giving you the ability to design your perfect building.</p>
                            <p style="text-align: center;">On top of variety, we pride ourselves in our
                                dependability.
                                At Helmuth Builders, our customer service goes far beyond our office. We aim to meet
                                our
                                clients’ needs with the best of our abilities and in a way that ensures you that you
                                are
                                valued.</p>
                        </div>
                    </div>
                </div>

                <!-- show parent category -->

                <?php
                     $query = " SELECT * FROM parent_category";
                     $query_run = mysqli_query($conn, $query);
                    ?>
                <div class="hero-menu-f is_fixed">
                    <ul>
                        <?php
                                if(mysqli_num_rows($query_run) > 0)        
                                {
                                    while($row = mysqli_fetch_assoc($query_run))
                                    {
                                    ?>

                        <li class="">
                            <a href="<?php  echo $row['parent_cate_name'].".php"; ?>">
                                <img src="<?php  echo $row['url_img']; ?>" alt="sheds">
                                <span><?php  echo $row['parent_cate_name']; ?></span>
                            </a>
                        </li>

                        <?php
                                    } 
                                }
                                else {
                                    echo "No Record Found";
                                }
                                ?>

                    </ul>
                </div>

                <!-- show child category -->
                <div class="main-category">
                    <div class="sub-category one-child">

                        <div class="sub-category-item">
                            <div class="info-cat">
                                <a data-toggle="modal" data-target="#sub-category-226" data-keyboard="true">
                                    <div class="wrap-img">
                                        <img alt="FURNITURE"
                                            src="https://daf9p2mnm4nrk.cloudfront.net/uploads/2019/04/furniture_5433ad08adc65b58b577a1875a7e2318-691x450.jpg">
                                    </div>
                                </a>
                            </div>

                            <?php
                            $query = " SELECT * FROM parent_category";
                            $query_run = mysqli_query($conn, $query);
                            ?>
                            <div class="more-cat">
                                <?php
                                if(mysqli_num_rows($query_run) > 0)        
                                {
                                    while($row = mysqli_fetch_assoc($query_run))
                                    {
                                        if($row['parent_cate_name']=="Furniture")
                                        {
                                         ?>
                                            <h3 class="cat-title"><?php  echo $row['parent_cate_name']; ?></h3>
                                            <div class="description">
                                                <p><?php  echo $row['slug_parent_cate']; ?></p>
                                                <p><a href="/our-furniture.php/"><span>Buy furniture from our online store here.</span></a></p>
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
                </div>

            </main><!-- /.main -->

            <div class="clearfix"></div>
        </div>
    </div>
</div><!-- /.content -->



<?php
include("footer.php");
?>