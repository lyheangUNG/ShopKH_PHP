<?php
    include 'header.php';
    // include('DB.php');
    require_once('admin/DB.php');
    $db = new DB();
    $connectDB = $db->connectDBProduct();
    $ads = $db->listDB("select * from ads");
    
    $categories = $db->listDB("select * from categories where parent_id IS NOT NULL and parent_id = 1");
    $products = $db->listDB("select * from products");
    $products_categories = $db->listDB("select p.*,c.* from products p join categories c where c.id = p.category_id");

?>
    <!-- new arrival product area start -->
    <?php 
        $categories->data_seek(0);
        while($category = $categories->fetch_assoc()) { 
    ?>
    <div class="popular-product-area wrapper-padding-3 pt-115 pb-0">
            <div class="container-fluid">
                <div class="section-title-6 mb-50">
                    <h3><span style="background: red;color:white;padding:10px;"><?php echo $category['category']?></span></h3>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p> -->
                </div>
                <div class="product-style">
                    <div class="popular-product-active owl-carousel">
                        <?php 
                            // if($product)
                            $products->data_seek(0);
                            while($product = $products->fetch_assoc()) { 
                                if($product['category_id'] == $category['id']){
                        ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="admin/assets/img/uploads/products/<?php echo $product['image']?>" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="animate-left" title="Wishlist" href="#">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-top" title="Add To Cart" href="#">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-right" title="Quick View" href="view.php?id=<?php echo $product['id']?>">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="funiture-product-content text-center">
                                    <h4><a href="product-details.html"><?php echo $product['code']?></a></h4>
                                    <span><?php echo $product['price']?></span>
                                </div>
                            </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>  
        <?php 
                            }
                        ?>
        
<?php
            include "footer.php";
?>