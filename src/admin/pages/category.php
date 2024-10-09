<?php

    include "../../functions/funtions.php";

    session_start();

    $settings = GetSettings();

    $numInfo = GetNumInfo();

    $userInfo = GetUserInfo($_SESSION["id"]);

    $top5s = Get5Question();

    $categories = GetCategory();


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $settings["s_webTitle"] ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <?php include "../partial/sidebar.php"?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <?php include "../partial/navbar.php"?>
            <!-- partial -->
             
            <div class="main-panel">
                <div class="content-wrapper">
                    <?php include "../partial/message.php"?>
                    <div class="page-header">
                        <h3 class="page-title"> Kategori ekleme </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Form</li>
                                <li class="breadcrumb-item active" aria-current="page">Kategori ekleme</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!--    <h4 class="card-title"></h4> -->
                                    <form class="forms-sample" method="post" action="../phpPro/categoryPro.php">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Kategori</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" name="categoryName" placeholder="Kategori ismi">
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Ekle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Kategoriler</h4>
                                    <?php foreach($categories as $category):?>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><?php echo $category["c_name"]?></label>
                                            <div class="col-sm-9" style="text-align: center;">
                                                <span style="margin-right: 15px;">
                                                    Soru sayısı : <?php echo GetCategoryNumber($category["c_id"])["number"]?>
                                                </span>
                                                <a href="../phpPro/deleteCategory.php?id=<?php echo $category["c_id"]?>" type="button" class="ml-5 btn btn-outline-danger btn-icon-text">
                                                    <i class="mdi mdi-delete btn-icon-prepend"></i> Sil
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach?>
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
    <script src="../assets/vendors/select2/select2.min.js"></script>
    <script src="../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/file-upload.js"></script>
    <script src="../assets/js/typeahead.js"></script>
    <script src="../assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

</html>