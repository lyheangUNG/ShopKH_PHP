<?php
    $id = $_GET['id'] ? $_GET['id']:"";
    $category = $_GET['category'] ? $_GET['category']:"";
    $parent_id = $_GET['parent_id'] ? $_GET['parent_id']:"";
    require_once('DB.php');
                    $db = new DB();
                    $connectDB = $db->connectDBProduct();
                    $categories = $db->listDB("select * from categories");
?>
<?php
        ob_start();
        include('header.php');
?>

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Category Update</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="category.php" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="    " autocomplete="off" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">Category information</h6>
                            <div class="pl-lg-4">
                            <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-category">Category Name</label>
                                        <input type="text" name="category" id="input-category" class="form-control" placeholder="Category Name" value="<?php echo $category?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parent_id">Parent ID</label>
                                    <select class="form-control" name="parent_id" id="parent_id" >
                                        <option value="0">None</option>
                                    <?php 
                                        while($category = $categories->fetch_assoc()) {                                                   
                                    ?>
                                        <option value="<?php echo $category['id']?>" 
                                            <?php if($parent_id == $category['id']){
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $category['category']?></option>
                                    <?php   
                                        }
                                    ?>
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
                    $category = $_POST['category']; 
                    $parent_id = $_POST['parent_id'];
                    if($parent_id == ''||$parent_id == '0'){
                        $update = $db->updateDB("UPDATE categories
                        SET category = '$category', parent_id = NULL
                        WHERE id = $id;");
                    }
                    else{
                        $update = $db->updateDB("UPDATE categories
                        SET category = '$category', parent_id = '$parent_id'
                        WHERE id = $id;");
                    }
                    header("Location: category.php");
                    ob_end_flush();
                }       
        ?>
        