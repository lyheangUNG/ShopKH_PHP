<?php 
    require_once('DB.php');
  $db = new DB();
        $connectDB = $db->connectDBProduct();
        // $products = $db->listDB("select * from products");
        $products = $db->listDB("select p.*, c.category from products p join categories c on c.id = p.category_id");
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
                      <h3 class="mb-0">Product Management</h3>
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
                          <a href="add_product.php" class="btn btn-sm btn-primary">Add Product</a>
                  </div>
                </div>
            </div>
            <!-- table items-->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while($product = $products->fetch_assoc()) {                                                   
                    ?>
                      <tr>
                      <th scope="row"><?php echo $product['id']?></th>
                      <td><img style="height:80px;width:80px;" class ="rounded" src="./assets/img/uploads/products/<?php echo $product['image']?>" alt=""></td>
                      <td><?php echo $product['code']?></td>
                      <td><?php echo $product['name']?></td>
                      <td><?php echo $product['price']?></td>
                      <td><?php echo $product['quantity']?></td>
                      <td><?php echo $product['category']?></td>
                      <td>
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="./update_product.php?id=<?php echo $product['id']?>&image=<?php echo $product['image']?>&name=<?php echo $product['name']?>&code=<?php echo $product['code']?>&price=<?php echo $product['price']?>&quantity=<?php echo $product['quantity']?>">Edit</a>
                            <a class="dropdown-item" href="./product.php?del=<?php echo $product['id']?>" name="delete">Delete</a>
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
        require_once('DB.php');
        $db = new DB();
        $connectDB = $db->connectDBProduct();
        $id = $_GET['del'];
        $delresult = $db->deleteDB("DELETE FROM products WHERE id = $id");
        header("Location: product.php");
        ob_end_flush();
    }
    
?>