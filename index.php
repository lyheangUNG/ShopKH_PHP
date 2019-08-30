<?php
    include 'header.php';
    // include('DB.php');
    require_once('admin/DB.php');
    $db = new DB();
    $connectDB = $db->connectDBProduct();
    $ads = $db->listDB("select * from ads");
    $products = $db->listDB("select * from products");
    $products_popular = $db->listDB("select * from products where popular = 1");
    $products_new = $db->listDB("select * from products where new = 1");
?>
        <div class="slider-area">
            <div class="slider-active owl-carousel">
                <?php 
                    while($ad = $ads->fetch_assoc()) { 
                ?>
                <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url(admin/assets/img/uploads/ads/<?php echo $ad['image'];?>)">
                    <div class="container">
                        <div class="row">
                            <div class="ml-auto col-lg-6">
                                <div class="furniture-content fadeinup-animated">
                                    <!-- <h2 class="animated"><?php echo "hello"?></h2>
                                    <p class="animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a class="furniture-slider-btn btn-hover animated" href="product-details.html">Shop Now</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                ?>
            </div>
        </div>
        <!-- new arrival product area start -->
        <div class="popular-product-area wrapper-padding-3 pt-115 pb-0">
            <div class="container-fluid">
                <div class="section-title-6 text-center mb-50">
                    <h2>New Arrival</h2>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p> -->
                </div>
                <div class="product-style">
                    <div class="popular-product-active owl-carousel">
                        <?php 
                            $products_new->data_seek(0);
                            while($product_new = $products_new->fetch_assoc()) { 
                        ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="admin/assets/img/uploads/products/<?php echo $product_new['image']?>" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="animate-left" title="Wishlist" href="#">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-top" title="Add To Cart" href="#">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-right" title="Quick View" href="view.php?id=<?php echo $product_new['id']?>">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="funiture-product-content text-center">
                                    <h4><a href="product-details.html"><?php echo $product_new['code']?></a></h4>
                                    <span><?php echo $product_new['price']?></span>
                                </div>
                            </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- new arrival product area end -->
        <!-- popular product area start -->
        <div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
            <div class="container-fluid">
                <div class="section-title-6 text-center mb-50">
                    <h2>Popular Product</h2>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p> -->
                </div>
                <div class="product-style">
                    <div class="popular-product-active owl-carousel">
                        <?php 
                            $products_popular->data_seek(0);
                            while($product_popular = $products_popular->fetch_assoc()) { 
                        ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="admin/assets/img/uploads/products/<?php echo $product_popular['image']?>" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="animate-left" title="Wishlist" href="#">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-top" title="Add To Cart" href="#">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-right" title="Quick View" href="view.php?id=<?php echo $product_popular['id']?>">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="funiture-product-content text-center">
                                    <h4><a href="product-details.html"><?php echo $product_popular['code']?></a></h4>
                                    <span><?php echo $product_popular['price']?></span>
                                </div>
                            </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- popular product area end -->
        

        <?php
            include "footer.php";
        ?>

        
        