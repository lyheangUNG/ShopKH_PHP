<?php
    $id = $_GET['id'] ? $_GET['id']:"";
    $image = $_GET['image'] ? $_GET['image']:"";
    $slide_name = $_GET['slide_name'] ? $_GET['slide_name']:"";
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
                                <h3 class="mb-0">Ads Update</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="ads.php" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="    " autocomplete="off" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">Ads information</h6>
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
                                    <img src="./assets/img/uploads/ads/<?php echo $image;?>" id='img-upload' class="mx-auto d-block"/>
                                </div>
                                <!-- {{-- code and name input --}} -->
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-slide_name">Slide Name</label>
                                            <input type="text" name="slide_name" id="input-slide_name" class="form-control" placeholder="Slide Name" value="<?php echo $slide_name;?>" required>
                                        </div>
                                    </div>
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
                    $slide_name = $_POST['slide_name'];
                    require_once('DB.php');
                    $db = new DB();
                    $connectDB = $db->connectDBProduct();
                    if(!empty($_FILES['image']['name'])){
                        $image = uploadImage($_FILES['image'],'./assets/img/uploads/ads/');
                        $update = $db->updateDB("UPDATE ads
                        SET image = '$image', slide_name = '$slide_name'
                        WHERE id = $id;");
                    }
                    else{
                        $imgFile = $_POST['img'];
                        $update = $db->updateDB("UPDATE ads
                        SET image = '$imgFile', slide_name = '$slide_name'
                        WHERE id = $id;");
                    }
                    // var_dump($image);
                    header("Location: ads.php");
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

