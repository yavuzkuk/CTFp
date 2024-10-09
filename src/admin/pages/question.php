<?php

    include "../../functions/funtions.php";

    session_start();

    $settings = GetSettings();

    $numInfo = GetNumInfo();

    $userInfo = GetUserInfo($_SESSION["id"]);

    $top5s = Get5Question();

    $questions = GetAllQuestionWithCategory();

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
                    <div class="page-header">
                        <h3 class="page-title"> Soru ekleme </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Form</li>
                                <li class="breadcrumb-item active" aria-current="page">Kategori ekleme</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Default form</h4> -->
                                    <form enctype="multipart/form-data" class="forms-sample" method="post" action="../phpPro/questionPro.php">
                                        <div class="form-group">
                                            <label for="exampleDesc">Soru başlığı</label>
                                            <input required name="qTitle" type="text" class="form-control" id="exampleDesc" placeholder="Soru başlık">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleDesc">Soru açıklaması</label>
                                            <input required name="qDesc" type="text" class="form-control" id="exampleDesc" placeholder="Soru açıklama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleDesc">Soru kategorisi</label>
                                            <select name="qCategory" class="form-select">
                                                <?php foreach($categories as $category):?>
                                                    <option style="color: white;" value="<?php echo $category["c_id"]?>"><?php echo $category["c_name"]?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Soru dosyaları</label>
                                            <input name="qFile" type="file" class="form-control file-upload-info" placeholder="Upload Image">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleScore">Soru puanı</label>
                                            <input required name="qScore" type="number" min="0" max="1000" class="form-control" id="exampleScore" placeholder="Soru puanı">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleAnswer">Soru cevabı</label>
                                            <input required name="qPass" type="password" class="form-control" id="exampleAnswer" placeholder="Soru cevabı">
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Sorular</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Başlık</th>
                                                <th>Kategori</th>
                                                <th>Puan</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($questions as $question):?>
                                                <tr>
                                                <td><?php echo $question["q_title"]?></td>
                                                <td><?php echo $question["c_name"]?></td>
                                                <td><?php echo $question["q_desc"]?></td>
                                                <td><label class="badge badge-danger"><?php echo $question["q_score"]?></label></td>
                                                </tr>
                                            <?php endforeach?>

                                            </tbody>
                                        </table>
                                    </div>
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