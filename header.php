<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helmuth</title>
    <link rel="stylesheet" href="/src/styles.css">
    <link href="http://db.onlinewebfonts.com/c/173aa2c75698b66f4ebbd3b63f4b8030?family=Alternate+Gothic+No1+D" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

<body>

    <div id="fixed-navbar" class="header-inner">
        <div  class="navbar-header">
            <a class="navbar-brand logo" href="#"><img id="site-logo" src="https://daf9p2mnm4nrk.cloudfront.net/uploads/2019/08/HelmuthBuider_logo.svg" alt="Helmuth Builders">
            </a>
        </div>
        <div class="navbar-right">
            <div id="header-topbar" class="header-topbar">
                <div class="right">

                    <div class="chanel-social">
                        <a target="_blank" class="chanel chanel-facebook" href="https://www.facebook.com/HelmuthBuildersInc/">
                            <img src="/src/images/facebook.svg" alt="facebook">
                        </a>
                        <a target="_blank" class="chanel chanel-instagram" href="https://www.instagram.com/helmuthbuilders/">
                            <img src="/src/images/instagram.svg" alt="instagram">
                        </a>
                        <a target="_blank" class="chanel chanel-twitter" href="https://twitter.com/helmuthbuilders">
                            <img src="/src/images/twitter.svg" alt="twitter">
                        </a>
                        <a target="_blank" class="chanel chanel-google" href="https://plus.google.com/u/0/111509630275663484126">
                            <img src="/src/images/google-plus.svg" alt="">
                        </a>
                    </div>
                    <form role="search" class="form" method="get" id="searchform" action="https://helmuthbuilders.com/">
                        <div class="input-group">
                            <input type="search" value="" name="s" id="s" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="submit" id="searchsubmit" class="btn btn-default">
                                    <img src="/src/images/search-icon.png" alt="">
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <nav id="fixed-navbar" class="nav-main navbar-collapse collapse" role="navigation">
                <ul id="menu-main-menu" class="navbar-nav nav">
                    <li class="menu-item menu-home active">
                        <a title="Home" href="index.php">Home</a>
                    </li>
                    <li class="menu-item menu-products dropdown">
                        <a class="menu-item-link-products" title="Products" href="/furniture.php" class="dropdown-toggle" aria-haspopup="true">Products
                            <span class="caret"></span>
                        </a>
                        <ul role="menu" class=" dropdown-menu">
                            <li class="menu-item menu-sheds">
                                <a title="SHEDS" href="#">SHEDS</a>
                            </li>
                            <li class="menu-item menu-animal-structures">
                                <a title="ANIMAL STRUCTURES" href="#">ANIMAL STRUCTURES</a>
                            </li>
                            <li class="menu-item menu-outdoor-living">
                                <a title="OUTDOOR LIVING" href="#">OUTDOOR LIVING</a>
                            </li>
                            <li class="menu-item menu-furniture">
                                <a title="FURNITURE" href="/furniture.php">FURNITURE</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-services dropdown">
                        <a class="menu-item-link-services" title="Services" href="#" class="dropdown-toggle" aria-haspopup="true">Services
                            <span class="caret"></span>
                        </a>
                        <ul role="menu" class=" dropdown-menu">
                            <li class="menu-item menu-foundation-work">
                                <a title="Foundation Work" href="#">Foundation Work</a>
                            </li>
                            <li class="menu-item  menu-repairs">
                                <a title="Repairs" href="#">Repairs</a>
                            </li>
                            <li class="menu-item menu-move-my-shed">
                                <a title="Move My Shed" href="#">Move My Shed</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-about-us dropdown">
                        <a class="menu-item-link-about-us" title="About Us" href="#" class="dropdown-toggle" aria-haspopup="true">About Us
                            <span class="caret"></span>
                        </a>
                        <ul role="menu" class=" dropdown-menu">
                            <li class="menu-item menu-our-story">
                                <a title="Our Story" href="#">Our Story</a>
                            </li>
                            <li class="menu-item menu-our-team">
                                <a title="Our Team" href="#">Our Team</a>
                            </li>
                            <li class="menu-item menu-join-our-team">
                                <a title="Join Our Team" href="#">Join Our Team</a>
                            </li>
                            <li class="menu-item menu-customer-reviews">
                                <a title="Customer Reviews" href="#">Customer Reviews</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-how-it-works dropdown">
                        <a class="menu-item-link-how-it-works" title="How It Works" href="#" class="dropdown-toggle" aria-haspopup="true">How It
                            Works <span class="caret"></span>
                        </a>
                        <ul role="menu" class=" dropdown-menu">
                            <li class="menu-item  menu-rent-to-own">
                                <a title="Rent To Own" href="#">Rent To Own</a>
                            </li>
                            <li class="menu-item menu-terms-conditions">
                                <a title="Terms &amp; Conditions" href="#">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item  menu-blog">
                        <a title="Blog" href="#">Blog</a>
                    </li>
                    <li class="menu-item menu-contact">
                        <a title="Contact" href="#">Contact</a>
                    </li>
                    <li class="menu-item  menu-call-us dropdown">
                        <a class="menu-item-link-call-us" title="Call Us" href="#" class="dropdown-toggle" aria-haspopup="true">Call Us
                            <span class="caret"></span>
                        </a>
                        <ul role="menu" class=" dropdown-menu">
                            <li class="menu-item menu-harrisonburg">
                                <a title="Harrisonburg" href="#">Harrisonburg</a>
                            </li>
                            <li class="menu-item menu-staunton">
                                <a title="Staunton" href="#">Staunton</a>
                            </li>
                            <li class="menu-item menu-front-royal">
                                <a title="Front Royal" href="#">Front Royal</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item shopping-cart">
                        <a href="/cart.php">
                            <img src="/src/images/shopping-cart.png" alt="cart">
                            <span class="cart-badge">
                                <?php
                                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                        $totalquantity = 0;
                                        foreach ($_SESSION['cart'] as $key => $value) {

                                            $totalquantity = $totalquantity + $_SESSION['cart'][$key]["item_quantity"];
                                        }
                                    } else {
                                        $totalquantity = 0;
                                    }
                                    if( $totalquantity == 0 ){
                                        unset($_SESSION['cart']);
                                    }
                                    echo $totalquantity;
                                ?>
                            </span>

                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</body>

</html>