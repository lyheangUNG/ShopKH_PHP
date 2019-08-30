<?php 
    include('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        // header('location: login.php');
    }
?>
        <?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

<!doctype html>
    <html class="no-js" lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <title>ShopKH</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Favicon -->
            <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/shopkh.png">
            
            <!-- all css here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/animate.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
            <link rel="stylesheet" href="assets/css/icofont.css">
            <link rel="stylesheet" href="assets/css/meanmenu.min.css">
            <link rel="stylesheet" href="assets/css/bundle.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/responsive.css">
            <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        </head>
        <body>
            <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <!-- header start -->
            <header>
                <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                    <div class="container-fluid">
                        <div class="header-bottom-wrapper">
                            <div class="logo-2 furniture-logo ptb-30">
                                <a href="index.php">
                                    <img src="assets/img/logo/shopkh.png" alt="" style="width:250px;">
                                </a>
                            </div>
                            <div class="menu-style-2 furniture-menu menu-hover">
                                <nav>
                                    <ul>
                                        <!-- <li><a href="#">Home</a></li> -->
                                        <li><a href="men.php">Men</a>
                                            <!-- <ul class="single-dropdown">
                                                <li><a href="index.html">Fashion</a></li>
                                                <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                                <li><a href="index-fruits.html">fruits</a></li>
                                                <li><a href="index-book.html">book</a></li>
                                                <li><a href="index-electronics.html">electronics</a></li>
                                                <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                                <li><a href="index-food.html">food & drink</a></li>
                                                <li><a href="index-furniture.html">furniture</a></li>
                                                <li><a href="index-handicraft.html">handicraft</a></li>
                                                <li><a target="_blank" href="index-smart-watch.html">smart watch</a></li>
                                                <li><a href="index-sports.html">sports</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="women.php">Women</a>
                                            <!-- <ul class="single-dropdown">
                                                <li><a href="about-us.html">about us</a></li>
                                                <li><a href="menu-list.html">menu list</a></li>
                                                <li><a href="login.php">login</a></li>
                                                <li><a href=" register.php">register</a></li>
                                                <li><a href="cart.html">cart page</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li><a href="shop.html">shop</a>
                                            <div class="category-menu-dropdown shop-menu">
                                                <div class="category-dropdown-style category-common2 mb-30">
                                                    <h4 class="categories-subtitle"> shop layout</h4>
                                                    <ul>
                                                        <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                                        <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                                        <li><a href="shop.html">grid 4 column</a></li>
                                                        <li><a href="shop-grid-box.html">grid box style</a></li>
                                                        <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                                        <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                                        <li><a href="shop-list-box.html">list box style</a></li>
                                                        <li><a href="cart.html">shopping cart</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                    </ul>
                                                </div>
                                                <div class="category-dropdown-style category-common2 mb-30">
                                                    <h4 class="categories-subtitle"> product details</h4>
                                                    <ul>
                                                        <li><a href="product-details.html">tab style 1</a></li>
                                                        <li><a href="product-details-2.html">tab style 2</a></li>
                                                        <li><a href="product-details-3.html"> tab style 3</a></li>
                                                        <li><a href="product-details-4.html">sticky style</a></li>
                                                        <li><a href="product-details-5.html">sticky style 2</a></li>
                                                        <li><a href="product-details-6.html">gallery style</a></li>
                                                        <li><a href="product-details-7.html">gallery style 2</a></li>
                                                        <li><a href="product-details-8.html">fixed image style</a></li>
                                                        <li><a href="product-details-9.html">fixed image style 2</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-banner-img">
                                                    <a href="single-product.html">
                                                        <img src="assets/img/banner/18.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="blog.html">blog</a>
                                            <ul class="single-dropdown">
                                                <li><a href="blog.html">blog 3 colunm</a></li>
                                                <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="#">Other</a></li>
                                        <li><a href="#">About</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- cart -->
                            <div class="header-cart pt-2">
                                <a class="icon-cart-furniture" href="#">
                                    <i class="ti-shopping-cart"></i>
                                    <span class="shop-count-furniture green">02</span>
                                </a>
                                <ul class="cart-dropdown">
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a href="#"> Bits Headphone</a></h5>
                                            <h6><a href="#">Black</a></h6>
                                            <span>$80.00 x 1</span>
                                        </div>
                                        <div class="cart-delete">
                                            <a href="#"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img src="assets/img/cart/2.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a href="#"> Bits Headphone</a></h5>
                                            <h6><a href="#">Black</a></h6>
                                            <span>$80.00 x 1</span>
                                        </div>
                                        <div class="cart-delete">
                                            <a href="#"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img src="assets/img/cart/3.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a href="#"> Bits Headphone</a></h5>
                                            <h6><a href="#">Black</a></h6>
                                            <span>$80.00 x 1</span>
                                        </div>
                                        <div class="cart-delete">
                                            <a href="#"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                    <li class="cart-space">
                                        <div class="cart-sub">
                                            <h4>Subtotal</h4>
                                        </div>
                                        <div class="cart-price">
                                            <h4>$240.00</h4>
                                        </div>
                                    </li>
                                    <li class="cart-btn-wrapper">
                                        <a class="cart-btn btn-hover" href="#">view cart</a>
                                        <a class="cart-btn btn-hover" href="#">checkout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <!-- <li><a href="#">HOME</a></li> -->
                                            <li><a href="#">MEN</a></li>
                                            <li><a href="#">WOMEN</a></li>
                                            <li><a href="#">Other</a></li>
                                            <li><a href="#">About</a></li>
                                        </ul>
                                    </nav>							
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-furniture wrapper-padding-2 border-top-3 border-bottom-2">
                    <div class="container-fluid">
                        <div class="furniture-bottom-wrapper">
                            <div class="furniture-login">
                                <ul>
                                    <?php  if (isset($_SESSION['user'])) { ?>
                                        <li><a href="index.php?logout='1'">Log out</a></li>
                                    <?php } else{ ?>    
                                        <li>Get Access: <a href="login.php">Login </a></li>
                                        <li><a href=" register.php">Reg </a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="furniture-search">
                                <form action="#">
                                    <input placeholder="Search" type="text">
                                    <button>
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="furniture-wishlist">
                                <ul>
                                    <!-- <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i class="ti-reload"></i> Compare</a></li> -->
                                    <li><a href="#"><i class="ti-heart"></i> Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header end -->
