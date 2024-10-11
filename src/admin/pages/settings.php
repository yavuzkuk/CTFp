<?php

    include "../../functions/funtions.php";

    session_start();

    include "../partial/perm/permCheck.php";

    $userInfo = GetUserInfo($_SESSION["id"]);

    $settings = GetSettings();

    $scoreboard = GetScoreboard();

    $pagination = floor(count($scoreboard) / 10) + (count($scoreboard) % 10 > 0 ? 1 : 0);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $settings["s_webTitle"]?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        
        <?php include "../partial/sidebar.php"?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <?php include "../partial/navbar.php"?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <?php include "../partial/message.php"?>
            <div class="page-header">
              <h3 class="page-title"> Ayarlar </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">CTFp</li>
                  <li class="breadcrumb-item active" aria-current="page">Ayarlar</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            
                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_webTitle"]?></h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_motto"]?></h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-clock icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_targetTime"]?></h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-instagram icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_instagram"]?></h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-twitter icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_twitter"]?></h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-linkedin icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_linkedin"]?></h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-whatsapp icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_whatsapp"]?></h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"></h3>
                                        <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-telegram"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal"><?php echo $settings["s_telegram"]?></h6>
                        </div>
                    </div>
                </div>

            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center"> <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>