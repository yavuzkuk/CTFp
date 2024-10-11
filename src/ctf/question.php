<?php

  session_start();

  include "../functions/funtions.php";

  include "permCheck.php";

  $categories = GetCategory();

  $settings = GetSettings();

  $userResults = GetUserAnswer($_SESSION["id"]);


?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $settings["s_webTitle"]?></title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Çok yaklaştın aşağılara bir bak istersen -->

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
        
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
  
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/bootstrap-icons.css" rel="stylesheet">

  <link href="css/tooplate-kool-form-pack.css" rel="stylesheet">
  

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

  </style>
  <link href="jumbotron.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="row justify-content-between">
    <div class="col-lg-12 col-12 d-flex align-items-center">
      <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="../index.php">
          <i class="bi-box"></i>
          <span>
            <?php echo $settings["s_webTitle"]?>
          </span>
      </a>

      <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
        <span class="text-white me-4 d-none d-lg-block">Stay connected</span>
        <?php if(!empty($settings["s_instagram"])):?>
          <li class="social-icon-item">
            <a href="<?php echo $settings["s_instagram"]?>" class="social-icon-link bi-instagram"></a>
          </li>
        <?php endif?>

        <?php if(!empty($settings["s_twitter"])):?>
          <li class="social-icon-item">
            <a href="<?php echo $settings["s_twitter"]?>" class="social-icon-link bi-twitter"></a>
          </li>
        <?php endif?>
        
        <?php if(!empty($settings["s_linkedin"])):?>
          <li class="social-icon-item">
            <a href="<?php echo $settings["s_linkedin"]?>" class="social-icon-link bi-linkedin"></a>
          </li>
        <?php endif?>

        <?php if(!empty($settings["s_whatsapp"])):?>
          <li class="social-icon-item">
            <a href="<?php echo $settings["s_whatsapp"]?>" class="social-icon-link bi-whatsapp"></a>
          </li>
        <?php endif?>
        
        <?php if(!empty($settings["s_telegram"])):?>
          <li class="social-icon-item">
            <a href="<?php echo $settings["s_telegram"]?>" class="social-icon-link bi-telegram"></a>
          </li>
        <?php endif?>
      </ul>
      <?php if(isset($_SESSION["login"])):?>
        <span style="color: white;">Hoşgeldin <?php echo $userData["u_username"]?></span>
      <?php endif?>
      <a class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu"></a>

    </div>

  </div>
</div>
<?php include "../part/message.php"?>


<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">                
  <div class="offcanvas-header">                    
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  
  <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
      <nav>
        <ul>
          <?php if(!isset($_SESSION["login"])):?>
            <li>
              <a href="login.php">Giriş yap</a>
            </li>

            <li>
              <a href="register.php">Hesap oluştur</a>
            </li>
          <?php else:?>    
            <li>
              <a href="index.php">Kurallar</a>
            </li>
            <li>
              <a href="question.php">Sorular</a>
            </li>
          <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1):?>
            <li>
              <a href="">Admin paneli</a>
            </li>
          <?php endif?>
            <li>
              <a href="scoreboard.php">Skor tablosu</a>
            </li>
            <li>
              <a href="../login/phpPro/logout.php">Çıkış yap</a>
            </li>
          <?php endif?>
        </ul>
      </nav>
  </div>
</div>



<main role="main">
    <div class="jumbotron custom-jumbotron mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="display-5">Sorular</h4>
                    Soruları aşağıda görebilirsin..
                </div>
                <div class="col-md-5 d-flex justify-content-end">
                    <a class="btn btn-success bg-gradient d-flex btn-sm text-center align-items-center" href="index.php" role="button">Kurallar Sayfasına <br> Geri Dön</a>
                </div>
            </div>
        </div>
    </div>    
    
    
    <!--OSINT Start-->
    <?php foreach($categories as $category):
        $result = GetQuestion($category["c_id"]);
      ?>
      <div class="container">
        <h2 style="color: greenyellow;"><?php echo $category["c_name"]?></h2>
        <div class="row">
          <?php foreach($result as $rquest):?>
            <div class="col-md-3 mt-2 mb-2">
              <div class="card" style="background-color: <?php foreach($userResults as $userResult){if($userResult["s_qid"] == $rquest["q_id"]){echo "greenyellow";}}?>;">
                <div class="card-body d-flex flex-column align-items-center">
                  <h5 class="card-title">Soru <?php echo $rquest["q_id"]?></h5>
                  <p class="card-text"><?php echo $rquest["q_title"]?></p>
                  <button type="button" class="btn btn-success bg-gradient" data-toggle="modal" data-target="#<?php echo $category["c_name"].$rquest["q_id"]?>">
                    Detay
                  </button>
                </div>
              </div>
            </div>
          <?php endforeach?>
        </div>
        <hr>
      </div>
    <?php endforeach?>


    <!--OSINT End-->


  </main>
  <!-- Osint Modal Start-->
  <?php foreach($categories as $category):
    $questions = GetQuestion($category["c_id"]);
  ?>
    <?php foreach($questions as $question):?>
      <div class="modal fade" id="<?php echo $category["c_name"].$question["q_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Soru </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <?php  echo $question["q_desc"]?>
                <form name="questionForms" method="post" class="questionForms" id="osintForms">
                  <input value="<?php foreach($userResults as $userResult) {echo $userResult["s_qid"] == $question["q_id"] ? "Çözüldü" : "" ;}?>" <?php foreach($userResults as $userResult) {echo $userResult["s_qid"] == $question["q_id"] ? "disabled" : "" ;}?> class="form-control mt-3 <?php echo $category["c_name"].$question["q_id"]?>" type="text" id="question" name="question" placeholder="Flag" aria-label="default input example">
                  <input name="questId" type="text" name="questId" id="questId" hidden value="<?php echo $question["q_id"]?>">
                  <button type="submit" <?php foreach($userResults as $userResult){ echo $userResult["s_qid"] == $question["q_id"] ? "disabled" : "" ;}?> class="btn btn-outline-primary osintButton<?php # echo $osint["id"]?> mt-2">Gönder</button>
                  <div class="osint<?php echo $question["q_id"]?>"></div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Geri</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach?>

  <?php endforeach?>
<!-- Osint Modal End-->


<footer class="container">
  <p>&copy; Karabük 2023-2024 <span style="font-size: 7px;"></span></p>
</footer>

<script src="script/javascript.js"></script>

<script src="../login/js/jquery.min.js"></script>
<script src="../login/js/bootstrap.bundle.min.js"></script>
<script src="../login/js/countdown.js"></script>
<script src="../login/js/init.js"></script>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html><!-- fake flag koyalım dedik nasıl olmuş :D -->
