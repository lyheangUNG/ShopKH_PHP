<?php
        require_once('DB.php');
        $db = new DB();
        $connectDB = $db->connectDBProduct();
        $categories = $db->listDB("select * from categories where parent_id IS NOT NULL");
        ob_start();
        include('header.php');
?>
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    #img-upload{
        width:200px;
        border-radius:10px;
        margin-top:20px;
        margin-left:145px;
    }
</style>

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="product.php" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="add_product.php" autocomplete="off" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">Product information</h6>
                            <div class="pl-lg-4">
                                 <!-- upload img -->
                                <div class="form-group">
                                    <label class="form-control-label" for="input-code">Upload Image</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp" name="image">
                                            </span>
                                            <!-- <div>{{$errors->first('image')}}</div> -->
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <br>
                                    <img id='img-upload' class="mx-auto d-block"/>
                                </div>
                                <!-- {{-- code and name input --}} -->
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group">
                                            <label class="form-control-label" for="input-code">Code</label>
                                            <input type="text" name="code" id="input-code" class="form-control" placeholder="Code" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-name">Name</label>
                                            <input type="text" name="name" id="input-name" class="form-control" placeholder="Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- {{-- price input --}} -->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-price">Price</label>
                                            <input type="text" name="price" id="input-price" class="form-control" placeholder="Price" required>
                                        </div>
                                    </div>
                                    <!-- {{-- quantity input --}} -->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-quantity">Quantity</label>
                                            <input type="text" name="quantity" id="input-quantity" class="form-control" placeholder="Quantity" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- {{-- category input --}} -->
                                <div class="form-group">
                                    <label class="form-control-label" for="input-category_id">Category</label>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <?php 
                                            while($category = $categories->fetch_assoc()) {                                                   
                                        ?>
                                            <option value="<?php echo $category['id']?>"><?php echo $category['category']?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4" name="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include('footer.php');
        ?>

        <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['name']||$_POST['price']||$_POST['quantity']||$_POST['code']||$_POST['image'])){
                    echo "Please fill all the input";
                }
                else{
                    include_once('file_upload.php');
                    $image = uploadImage($_FILES['image'],'./assets/img/uploads/products/');
                    // var_dump($image);
                    $code = $_POST['code']; 
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $category_id = $_POST['category_id'];
                    require_once('DB.php');
                    $db = new DB();
                    $connectDB = $db->connectDBProduct();
                    echo $category_id;
                    $insert = $db->insertDB("INSERT INTO products (image,code,name,price,quantity,category_id)
                    VALUES ('$image', '$code', '$name', '$price', '$quantity','$category_id')");
                    header("Location: product.php");
                    ob_end_flush();
                }       
            }
        ?>

        <script>
            $(document).ready( function() {
                $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
                });
                $('.btn-file :file').on('fileselect', function(event, label) {
                    
                    var input = $(this).parents('.input-group').find(':text'),
                        log = label;
                    
                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }
                
                });
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function (e) {
                            $('#img-upload').attr('src', e.target.result);
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#imgInp").change(function(){
                    readURL(this);
                }); 	
            });
        </script>
    </div>

