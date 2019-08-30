<?php 
  include('DB.php');
  $db = new DB();
        $connectDB = $db->connectDBProduct();
        $categories = $db->listDB("select * from categories");
?>
<!--
=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
    <?php
        ob_start();
        include('header.php');
    ?>
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                  <div class="col-4">
                      <h3 class="mb-0">Category Management</h3>
                  </div>
                  <form class="col-4">
                          <div class="form-group mb-2 mt-2">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-search"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Search" type="text">
                              </div>
                          </div>
                  </form>
                  <div class="col-4 text-right">
                          <a href="./add_category.php" class="btn btn-sm btn-primary">Add Category</a>
                  </div>
                </div>
            </div>
            <!-- table items-->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Parent_ID</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while($category = $categories->fetch_assoc()) {                                                   
                    ?>
                      <tr>
                      <th scope="row"><?php echo $category['id']?></th>
                      <td><?php echo $category['category']?></td>
                      <td><?php echo $category['parent_id']?></td>
                      <td>
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="./update_category.php?id=<?php echo $category['id']?>&category=<?php echo $category['category']?>&parent_id=<?php echo $category['parent_id']?>">Edit</a>
                            <a class="dropdown-item" href="./category.php?del=<?php echo $category['id']?>" name="delete">Delete</a>
                        </div>
                      </td>

                      </tr> 
                      <?php 
                      }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    <?php
        include('footer.php');
    ?>

<?php
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $delresult = $db->deleteDB("DELETE FROM categories WHERE id = $id");
        header("Location: category.php");
        ob_end_flush();
    }
    
?>