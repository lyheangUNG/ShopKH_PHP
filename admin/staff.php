<?php 
  include('DB.php');
  $db = new DB();
        $connectDB = $db->connectDBProduct();
        $admins = $db->listDB("select * from users where user_type = 'admin'");
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
                      <h3 class="mb-0">Staff Management</h3>
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
                          <a href="add_user.php" class="btn btn-sm btn-primary">Add Staff</a>
                  </div>
                </div>
            </div>
            <!-- table items-->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">UserName</th>
                    <th scope="col">FullName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while($admin = $admins->fetch_assoc()) {                                                   
                    ?>
                      <tr>
                      <th scope="row"><?php echo $admin['id']?></th>
                      <!-- <td><img style="height:80px;width:80px;" class ="rounded" src="./uploads/products/<?php echo $admin['image']?>" alt=""></td> -->
                      <td><?php echo $admin['name']?></td>
                      <td><?php echo $admin['fname']?></td>
                      <td><?php echo $admin['email']?></td>
                      <td>
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="./staff.php?del=<?php echo $admin['id']?>" name="delete">Delete</a>
                        </div>
                      </td>

                      </tr> 
                      <?php 
                      }
                  ?>
                  <!-- <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Argon Design System</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $2,500 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> pending
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src=" assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src=" assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src=" assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src=" assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </td>
                  </tr> -->
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
        header("Location: index.php");
        ob_end_flush();
    }
    
?>