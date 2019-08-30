<?php
    $id = $_GET['id'] ? $_GET['id']:"";
    $image = $_GET['image'] ? $_GET['image']:"";
    $name = $_GET['name'] ? $_GET['name']:"";
    $code = $_GET['code'] ? $_GET['code']:"";
    $price = $_GET['price'] ? $_GET['price']:"";
    $quantity = $_GET['quantity'] ? $_GET['quantity']:"";
    // echo $image;
    // include('./index.php');
?>
<?php
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
                                <h3 class="mb-0">Product Update</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="product.php" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="    " autocomplete="off" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">Product information</h6>
                            <div class="pl-lg-4">
                                 <!-- upload img -->
                                 <div class="form-group">
                                    <label class="form-control-label" for="input-code">Upload Image</label>
                                    <input type="hidden" id=img name="img" value="<?php echo $image?>">
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
                                    <img src="./assets/img/uploads/products/<?php echo $image;?>" id='img-upload' class="mx-auto d-block"/>
                                </div>
                                <!-- {{-- code and name input --}} -->
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group">
                                            <label class="form-control-label" for="input-code">Code</label>
                                            <input type="text" name="code" id="input-code" class="form-control" placeholder="Code" value="<?php echo $code;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-name">Name</label>
                                            <input type="text" name="name" id="input-name" class="form-control" placeholder="Name" value="<?php echo $name;?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- {{-- price input --}} -->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-price">Price</label>
                                            <input type="text" name="price" id="input-price" class="form-control" placeholder="Price" value="<?php echo $price;?>" required>
                                        </div>
                                    </div>
                                    <!-- {{-- quantity input --}} -->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-quantity">Quantity</label>
                                            <input type="text" name="quantity" id="input-quantity" class="form-control" placeholder="Quantity" value="<?php echo $quantity;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- {{-- category input --}} -->
                                <div class="form-group{{ $errors->has('subcategory_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-subcategory_id">subcategory</label>
                                    <select class="form-control" name="subcategory_id" id="subcategory_id" required>
                                        <!-- @if(count($subcategories)>0)   
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}" 
                                            >{{ $subcategory->subcategory_name}} </option>               
                                        @endforeach  
                                    @endif -->
                                        <option value="1">Drink</option>
                                        <option value="1">Drink</option>
                                        <option value="1">Drink</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
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
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    include_once('file_upload.php');
                    $code = $_POST['code']; 
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    require_once('DB.php');
                    $db = new DB();
                    $connectDB = $db->connectDBProduct();
                    if(!empty($_FILES['image']['name'])){
                        $image = uploadImage($_FILES['image'],'./assets/img/uploads/products/');
                        $update = $db->updateDB("UPDATE products
                        SET image = '$image', name = '$name', code = '$code', price = $price , quantity = $quantity
                        WHERE id = $id;");
                    }
                    else{
                        $imgFile = $_POST['img'];
                        $update = $db->updateDB("UPDATE products
                        SET image = '$imgFile', name = '$name', code = '$code', price = $price , quantity = $quantity
                        WHERE id = $id;");
                    }
                    // var_dump($image);
                    header("Location: product.php");
                    ob_end_flush();
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

