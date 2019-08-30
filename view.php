<?php
    $id = $_GET['id'] ? $_GET['id']:"";
    include 'header.php';
    require_once('admin/DB.php');
    $db = new DB();
    $connectDB = $db->connectDBProduct();
    $ads = $db->listDB("select * from ads");
    // $categories = $db->listDB("select * from categories where parent_id IS NOT NULL and parent_id = 1");
    $products = $db->listDB("select * from products");
    // $products_categories = $db->listDB("select p.*,c.* from products p join categories c where c.id = p.category_id");

?>
    <style>
        .mar{
            margin-top : 100px;
            margin-bottom :100px;
        }
        h3{
            font-size: 25px;
            font-weight: 700;
        }
        body{
            font-size: 18px;
            font-family: 'Helvetica';
        }
        .col-sm-3{
            padding-top: 20px;
        }
        .col-sm-6{
            padding-top: 20px;
        }
        span{
            font-size: 25px;
        }
        hr{
            margin: 40px;
        }
    </style>
    <?php
        $products->data_seek(0);
        while($product = $products->fetch_assoc()) { 
            if($id == $product['id']){
    ?>
    <div class="container mar">
        <div class="row">
            <div class="col-sm-6">
                <img style = 'height:500px' src='./admin/assets/img/uploads/products/<?php echo $product['image']?>' class="img-thumbnail"/>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h2><?php echo $product['name']?></h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <span>Code :</span>
                    </div>
                    <div class="col-sm-6">
                        <span><?php echo $product['id']?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <span>Price :</span>
                    </div>
                    <div class="col-sm-6">
                        <span><?php echo $product['price']?></span>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-3">
                        <span>Pay via</span>
                    </div>
                    <div class="col-sm-6">
                        <span><?php echo $product['paymed']?></span>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-sm-3">
                        <span>Qunatity :</span>
                    </div>
                    <div class="col-sm-6">
                        <span><?php echo $product['quantity']?></span>
                    </div>
                    
                </div>
                <div class="row">
                    <hr class ="col-sm">
                </div>
                <!-- <div class="row">
                    <div class="col-sm-3">
                        <span>Size</span>
                    </div>
                    <div class="col-sm-6">
                        <span>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <span>Color</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col">
                                <img style = 'height:30px' src='<?php echo $color['black']?>' />
                                <img style = 'height:30px' src='<?php echo $color['white']?>' />
                            </div>
                        </div>
                         
                    </div>
                </div> -->
            </div>
            <!-- <div class="col-sm-4">
                One of three columns
            </div> -->
        </div>
    </div>
    <?php 
            }
        }
    ?>
<?php
            include "footer.php";
?>