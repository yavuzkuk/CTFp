<?php

    session_start();
    include "../functions/funtions.php";

    if(isset($_SESSION["login"])){
        header("Location:index.php");
        exit();
    }

    $settings = GetSettings()

?>




<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $settings["s_webTitle"]?></title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/tooplate-kool-form-pack.css" rel="stylesheet">

    </head>
    
    <body>
        <main>

            <header class="site-header">
                <?php include "parts/header.php"?>
            </header>


            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">                
                <div class="offcanvas-header">                    
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
                    <nav>
                        <?php include "parts/sidebar.php"?>
                    </nav>
                </div>
            </div>

            

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <?php include "../part/message.php"?>
                        <div class="col-lg-6 col-12 mx-auto">
                            <form class="custom-form" role="form" method="post" action="phpPro/register.php">
                                <h2 class="hero-title text-center mb-4 pb-2">Hesap oluştur</h2>

                                <div class="row">
                                    <div class="col-lg col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="user-name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                            
                                            <label for="floatingInput">Kullanıcı adı</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="user-name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                            
                                            <label for="floatingInput">Email</label>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12 col-6">
                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

                                            <label for="password">Şifre</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-6">
                                        <div class="form-floating p-0">
                                            <input type="password" name="password2" id="password" class="form-control" placeholder="Password" required="">

                                            <label for="password">Şifre X2</label>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-5 col-md-5 col-5 ms-auto">
                                            <button type="submit" name="registerButton" class="form-control">Kayıt ol</button>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-7">
                                            <p class="mb-0">Daha önce hesabın var mı? <a href="login.php" class="ms-2">Giriş yap</a></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="videos/video.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
