<?php 
  require_once('DB.php');
  $db = new DB();
        $connectDB = $db->connectDBProduct();
        $ads = $db->listDB("select * from ads");
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
                      <h3 class="mb-0">Ads Management</h3>
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
                          <a href="add_ads.php" class="btn btn-sm btn-primary">Add Ads</a>
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
                    <th scope="col">Slide Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while($ad = $ads->fetch_assoc()) {                                                   
                    ?>
                      <tr>
                      <th scope="row"><?php echo $ad['id']?></th>
                      <td><img style="width:200px;" class ="rounded" src="./assets/img/uploads/ads/<?php echo $ad['image']?>" alt=""></td>
                      <td><?php echo $ad['slide_name']?></td>
                      <td>
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="./update_ads.php?id=<?php echo $ad['id']?>&image=<?php echo $ad['image']?>&slide_name=<?php echo $ad['slide_name']?>">Edit</a>
                            <a class="dropdown-item" href="./ads.php?del=<?php echo $ad['id']?>" name="delete">Delete</a>
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
        require_once('DB.php');
        $db = new DB();
        $connectDB = $db->connectDBProduct();
        $delresult = $db->deleteDB("DELETE FROM ads WHERE id = $id");
        header("Location: ads.php");
        ob_end_flush();
    }
    
?>