<?php
    require_once('DB.php');
    $db = new DB();
    $connectDB = $db->connectDBProduct();
    $categories = $db->listDB("select * from categories");
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
                                <h3 class="mb-0">Create Category</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="category.php" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">Category information</h6>
                            <div class="pl-lg-4">
                                <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-category">Category Name</label>
                                        <input type="text" name="category" id="input-category" class="form-control" placeholder="Category Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parent_id">Parent ID</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <!-- @if(count($subcategories)>0)   
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}" 
                                            >{{ $subcategory->subcategory_name}} </option>               
                                        @endforeach  
                                    @endif -->
                                        <option value="0">None</option>
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
                require_once('DB.php');
                $db = new DB();
                $connectDB = $db->connectDBProduct();
                $category = $_POST['category'];
                $parent_id = $_POST['parent_id'];
                if($parent_id == ''||$parent_id == '0'){
                    $insert = $db->insertDB("INSERT INTO categories (category,parent_id)
                    VALUES ('$category', NULL)");
                }
                else{
                    $insert = $db->insertDB("INSERT INTO categories (category,parent_id)
                    VALUES ('$category', '$parent_id')");
                }
                header("Location: category.php");
                ob_end_flush();
            }       
            
        ?>
    </div>

