<?php
include("./admin/includes/db.inc.php");
?>

<?php
include("header.php")
?>

<div class="content">

    <section class="section hero background-slide" id="hero">
        <div class="section-inner">
            <div class="section-content">
                <h1 class="section-title">HELMUTH BUILDERS</h1>

                <div class="section-description">
                    <ul id="menu-dropdown-hero">
                        <li><a>Get Started</a></li>
                        <li><a href="#">CURRENT INVENTORY</a></li>
                        <li><a href="#">MOVE MY SHED</a></li>
                        <li><a href="#">DESIGN YOU OWN SHED</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section-slider">
            <iframe title="Field for website" width="100%" height="100%" src="https://www.youtube.com/embed/aKFRiMlkrd4?feature=oembed&amp;autoplay=1&amp;controls=0&amp;loop=1&amp;muted=1&amp;playlist=aKFRiMlkrd4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
            </iframe>
        </div>

    </section>

    <!-- hero menu -->
    <div class="hero-menu" style="padding: 0 8%; background: #720C0B;">

        <?php
        $query = " SELECT * FROM parent_category";
        $query_run = mysqli_query($conn, $query);
        ?>
        <ul id="hero-menu-iterm" style="list-style: none; margin: 0; padding: 0; display: flex;">
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                    <li class="">
                        <a href="<?php echo './' . $row['parent_cate_name'] . ".php"; ?>">
                            <img src="<?php echo "/src/images/" .$row['url_img']; ?>" alt="sheds">
                            <span><?php echo $row['parent_cate_name']; ?></span>
                        </a>
                    </li>

            <?php
                }
            } else {
                echo "No Record Found";
            }
            ?>

        </ul>
    </div>
    <div class="section-inner">
        <div class="section-content">
            <div class="section-header">
                <h2 class="section-title">EASIEST WAYS TO BUY A SHED</h2>
            </div>
            <div class="section-body">
                <div class="grid-item-1">
                    <div class="wrap-item">
                        <img class="grid-image" src="https://daf9p2mnm4nrk.cloudfront.net/uploads/2019/04/RENT-TO-OWN.jpg">
                        <div class="wrap-grid">
                            <h4 class="grid-title">RENT TO OWN</h4>
                            <div class="grid-description">
                                <h4>No credit Check</h4>
                                <h3>Starting at $87</h3>
                                <p>Did you know you can own a Helmuth Builders for as low as $87 per month?<br>
                                    <a class="more" href="#">More info</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item-2">
                    <div class="wrap-item">
                        <img class="grid-image" src="https://daf9p2mnm4nrk.cloudfront.net/uploads/2019/04/FREE-DELIVERY.jpg">
                        <div class="wrap-grid">
                            <h4 class="grid-title">FREE DELIVERY</h4>
                            <div class="grid-description">
                                <h4>Within 50 miles</h4>
                                <h3>FREE DELIVERY</h3>
                                <p>Free delivery of our buildings is included within 50 miles of our shop!<br>
                                    <a class="more" href="#">Find a location</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item-3 col-md-4">
                    <div class="wrap-item">
                        <img class="grid-image" src="https://daf9p2mnm4nrk.cloudfront.net/uploads/2019/04/DESIGN-YOUR-OWN.jpg">
                        <div class="wrap-grid">
                            <h4 class="grid-title">DESIGN YOUR OWN</h4>
                            <div class="grid-description">
                                <h4>Shed Builder Customize</h4>
                                <h3>CUSTOMIZE</h3>
                                <p>Choose your favorite style and paint colors with our handy shed builder tool.<br>
                                    <a class="more" href="#">Design Your Shed</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-inner2">

        <div class="section-content ">
            <div class="title-wrapper">
                <h2 class="section-title">MATERIALS</h2>
            </div>
            <div class="section-body">
                <div class="material-wrapper">
                    <div class="material-image">
                        <img alt="Storage Building" src="https://daf9p2mnm4nrk.cloudfront.net/uploads/2017/02/Materials-section-Windsor1.jpg">
                        <ul class="material-wrapper nav nav-tabs" role="tablist">
                            <li id='siding' role="presentation" class="siding active">
                                <a aria-controls="siding" class="tablinks" onclick="openIngredient(this, 'siding1', 'siding2')">Siding</a>
                            </li>
                            <li id='flooring' role="presentation" class="flooring">
                                <a aria-controls="flooring" class="tablinks" onclick="openIngredient(this, 'flooring1', 'flooring2')">Flooring</a>
                            </li>
                            <li id='roof' role="presentation" class="roof">
                                <a aria-controls="roof" class="tablinks" onclick="openIngredient(this, 'roof1', 'roof2')">Roof</a>
                            </li>
                            <li id='paint' role="presentation" class="paint">
                                <a aria-controls="paint" class="tablinks" onclick="openIngredient(this, 'paint1', 'paint2')">Paint</a>
                            </li>
                            <li id='trim' role="presentation" class="trim">
                                <a aria-controls="trim" class="tablinks" onclick="openIngredient(this, 'trim1', 'trim2')">Trim</a>
                            </li>
                        </ul>
                    </div>
                    <div class="material-content col-md-6">
                        <div class="material-des">
                            <p>You can rest assured that when you order a Helmuth Builders storage shed it will be
                                built and handled with the utmost care. We work hard to find and use the best
                                possible products on the market. At the same time we seek the best possible rates so
                                we can provide you, the customer, with the best possible quality for the best price.
                                <br>
                                <b><a class="default-button-link" href="">View Our
                                        Products</a></b></p>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="material-wrapper nav nav-tabs" role="tablist">
                            <li id='siding1' role="presentation" class="siding active">
                                <a aria-controls="siding" role="tab" class="tablinks" onclick="openIngredient(this, 'siding', 'siding2')">Siding</a>
                            </li>

                            <li id='flooring1' role="presentation" class="flooring">
                                <a aria-controls="flooring" role="tab" class="tablinks" onclick="openIngredient(this, 'flooring', 'flooring2')">Flooring</a>
                            </li>
                            <li id='roof1' role="presentation" class="roof">
                                <a aria-controls="roof" role="tab" class="tablinks" onclick="openIngredient(this, 'roof', 'roof2')">Roof</a>
                            </li>
                            <li id='paint1' role="presentation" class="paint">
                                <a aria-controls="paint" role="tab" class="tablinks" onclick="openIngredient(this, 'paint', 'paint2')">Paint</a>
                            </li>
                            <li id='trim1' role="presentation" class="trim">
                                <a aria-controls="trim" role="tab" class="tablinks" onclick="openIngredient(this, 'trim', 'trim2')">Trim</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="material-tab tab-content">
                            <div role="tabpanel" class="tabpane siding active" id="siding2">
                                <p><b>LP Smart Siding</b> comes standard on all storage sheds. Our state-of-the-art
                                    SmartGuard Siding ensures outstanding strength and durability. LP SmartSiding
                                    delivers the beautiful, authentic look of real wood but offers multiple
                                    advantages over traditional wood siding materials. It is free of knots, and
                                    unlike traditional wood, LP SmartSide Trim &amp; Siding products resist cupping
                                    and warping. They’re all pre-primed in the factory delivering optimal adhesion
                                    and consistent application. A zinc borate compound is applied throughout the
                                    substrate to help fight against fungal decay and termites. Having been tested in
                                    laboratory and real-world conditions for more than a decade, LP SmartSide
                                    products are proven to withstand extreme heat, cold, humidity and rainfall.</p>
                                <p>Vinyl Siding is another popular option because it is low maintenance and fairly
                                    durable. Vinyl won’t split, peel or rot, and it comes in a wide variety of
                                    colors and widths, making it adaptable to many different visual styles. Unlike
                                    some storage shed companies Helmuth Builders uses a high grade vinyl, so you can
                                    rest assured that you are getting what you are paying for. Our vinyl is not
                                    included in our standard prices but is offered in a variety of colors.</p>
                            </div>

                            <div role="tabpanel" class="tabpane flooring" id="flooring2" style="display:none">
                                <p><b>AdvanTech</b> is our standard flooring. It is the FLAT OUT BEST solution when
                                    it comes to reducing moisture-related problems. It is specially engineered to
                                    resist water absorption and edge swell, which in turn eliminates the need for
                                    sanding and costly rework. AdvanTech is made using advanced resin technology and
                                    a world-class manufacturing process. It achieves the lowest water absorption in
                                    the industry, and will not warp, cup or delaminate.</p>
                                <p><b>LP ProStruct Floor</b> is a 5/8' material that uses LP's Treated Wood Strand
                                    Technology and SmartGuard in order to resist fungal decay as well as termite
                                    damage. It comes standard on all our Economy buildings.</p>
                            </div>

                            <div role="tabpanel" class="tabpane roof" id="roof2" style="display:none">
                                <p>At Helmuth Builders, we use <b>Epilay Weathertite</b> as our standard roof
                                    underlayment. It is a synthetic barrier that goes directly underneath your shingles.
                                    It is completely tear proof and water proof making it the best option for under your
                                    roof. If you ever have issues with shingles being blown off your shed, you can rest
                                    assured that Epilay Weathertite has you covered. Traditional roof underlayment (tar
                                    paper) is neither tear proof nor water proof.</p>
                                <p><b>3 Tab shingles</b> are an economical choice and meet all general roofing and fire
                                    resistance standards. Our 3 Tab shingles are 25-year shingles and they come standard
                                    on our economy buildings.</p>
                                <p><b>3-Dimensional shingles/Architectural</b> roofing shingles provide a stunning
                                    three-dimensional appearance. Because of their extra thickness, architectural
                                    roofing shingles weigh considerably more than conventional asphalt-based shingles
                                    and have a higher wind rating. These shingles are a 35-40-year shingles, are a safe
                                    and attractive option, and they are standard on all buildings except for the economy
                                    buildings.</p>
                            </div>
                            <div role="tabpanel" class="tabpane paint" id="paint2" style="display:none">
                                <p>The paint we use is purchased from <b>Haley Paint</b>. It is a Latex paint that has a
                                    semi-gloss finish and is 100% acrylic which means you can count on outstanding
                                    flexibility and durability. Not only is our paint of great quality, it is also of
                                    great value. Never the less we have included it with the price of our sheds. We have
                                    a wide variety of colors available, and additional colors are also available.</p>
                                <p>Haley Paint Company has been servicing the market since 1913, in the past few years
                                    they have been continuing to improve their locations so that they can offer the
                                    finest shopping experience as well as offering the highest quality products in the
                                    paint and decorating industry.</p>
                            </div>
                            <div role="tabpanel" class="tabpane trim" id="trim2" style="display:none">
                                <p><b>LP Smart Siding Trim</b> is the trim of champions. Why, you ask? LP Smart Trim
                                    will not delaminate as it is not hardboard, and is moisture, rot and termite
                                    resistant, because it is treated with zinc borate. LP Smart Trim excels in all four
                                    seasons. Because it is specially treated, it’s more cost-effective over time than
                                    other types of trim with laminant or a wood base. Our trim lasts longer and holds
                                    paint better. Thanks to LP's patented Smart Guard manufacturing process, Smart Trim
                                    is uniformly thick and dense, with no voids or knots. It is, simply put, the best.
                                </p>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>


</div>

<div class="section-inner3">
    <div class="section-content ">
        <div class="section-body">
            <ul class="bxslider">
                <li class="testimonial-item 9">
                    <div class="testimonial-content-wrap">
                        <h2 class="section-title">Our Happy Clients</h2>

                        <div class="testimonial-title"><b>JD</b></div>
                        <div class="testimonial-content">
                            <p>The installation was perfect. Mr. Helmuth is a true professional and an
                                expert with that trailer system. Diane, thank you for all of your help!
                                I look forward to referring friends to you.</p>
                        </div>

                        <div class="num-pad">9<span class="mobile-pad">/20</span></div>
                        <a href="/customer-reviews/" class="see-more">SEE ALL</a>
                    </div>

                    <div class="testimonial-images">
                        <img src="./src/images/June-Grove.jpg" alt="">
                    </div>
                </li>

                <li class="testimonial-item 10">
                    <div class="testimonial-content-wrap">
                        <h2 class="section-title">Our Happy Clients</h2>

                        <div class="testimonial-title"><b>David Knupp</b></div>
                        <div class="testimonial-content">
                            <p>Great delivery…Excellent job squeezing my mountain shack in between the trees,
                                right where I wanted it. Quality built building. Thanks guys!</p>
                        </div>

                        <div class="num-pad">10<span class="mobile-pad">/20</span></div>
                        <a href="/customer-reviews/" class="see-more">SEE ALL</a>
                    </div>

                    <div class="testimonial-images">
                        <img src="./src/images/Lynn-Ullrich-Helmuth-Builders-shed-testimonial1.jpg" alt="">
                    </div>
                </li>
                <button class="slide-button display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="slide-button display-right" onclick="plusDivs(1)">&#10095;</button>
            </ul>

        </div>
    </div>
</div>

<div class="section-inner4">

    <div class="section-content ">
        <div class="title-wrapper">
            <h2 class="section-title">BLOG</h2>

        </div>

        <div class="section-body">
            <?php
            $query = " SELECT
            *
            FROM
            blogs
            INNER JOIN
            blog_detail USING (blog_id ) LIMIT 2 ";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {

                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <div class="wrap-blog-item">
                        <div class="blog-img">
                            <a href="https://helmuthbuilders.com/blog/biggest-sale-of-the-year/">
                                <img src="https://helmuthbuilders.com/wp-content/themes/shoestrap-3-woocommerce-child/assets/img/no-thumbnail.jpg" alt="Biggest sale of the year">
                            </a>
                        </div>

                        <div class="blog-info">
                            <h5 class="meta"><?php echo $row['publication_date'] ?></h5>
                            <h3 class="blog-title"><a href="https://helmuthbuilders.com/blog/biggest-sale-of-the-year/"><?php echo $row['blog_name'] ?></a></h3>
                            <div class="des">
                                <p><?php echo $row['blog_content'] ?></p>
                            </div>
                            <a href="#">
                                        <b>Read more</b></a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <!-- <div class="wrap-blog-item">
                <div class="blog-img">
                    <a href="https://helmuthbuilders.com/blog/when-new-faces-become-familiar-faces/">
                        <img src="https://helmuthbuilders.com/wp-content/themes/shoestrap-3-woocommerce-child/assets/img/no-thumbnail.jpg"
                            alt="When New Faces Become Familiar Faces">
                    </a>
                </div>

                <div class="blog-info">
                    <h5 class="meta">February 29, 2020</h5>
                    <h3 class="blog-title"><a
                            href="https://helmuthbuilders.com/blog/when-new-faces-become-familiar-faces/">When
                            New Faces Become Familiar Faces</a></h3>
                    <div class="des">
                        <p>We love getting to meet new customers. But when a customer returns to us for
                            future needs, we know that we must be doing something right! We recently sat
                            down with Mark &amp; Donna Mashburn at their home where we’ve … <a href="#"><b>Read
                                    more</b></a></p>
                    </div>
                </div>
            </div> -->

        </div>

        <div class="wrap-more">
            <a class="more-link" href="/blog">SEE ALL</a>
        </div>
    </div>
</div>

</div>


<?php
include("footer.php");
?>