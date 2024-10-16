<?php

  session_start();

  include "../functions/funtions.php";

  if(!isset($_SESSION["login"])){
    header("Location:../ctfLogin/");
    exit();
  }

  $userData;
  if(isset($_SESSION["login"])){
    $userData = GetUserInfo($_SESSION["id"]);
  }

  $settings = GetSettings();

  $scoreboard = GetScoreboard();


?>




<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $settings["s_webTitle"]?></title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

  <!-- Bootstrap core CSS -->
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

    td{
      color: whitesmoke;
    }

  </style>
  <link href="jumbotron.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="row justify-content-between">
    <div class="col-lg-12 col-12 d-flex align-items-center">
      <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="../ctfLogin/">
          <i class="bi-box"></i>

          <span>
              <?php echo $settings["s_webTitle"]?>
          </span>
      </a>

      <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
        <span class="text-white me-4 d-none d-lg-block">Stay connected</span>

        <li class="social-icon-item">
            <a href="https://www.instagram.com/siber_vatan" class="social-icon-link bi-instagram"></a>
        </li>

        <li class="social-icon-item">
            <a href="https://twitter.com/siber_vatan" class="social-icon-link bi-twitter"></a>
        </li>
      </ul>
      <?php if(isset($_SESSION["login"])):?>
        <span style="color: white;">Hoşgeldin <?php echo $userData["u_username"]?></span>
      <?php endif?>
      <a class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu"></a>

    </div>

  </div>
</div>
<?php include "../part/message.php"?>
<!-- </header> -->


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
              <a href="../admin/">Admin paneli</a>
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
      <h1 class="display-3">Hoşgeldin</h1>
      <p>CTF kurallarını iyi oku. Daha okumadın mı? Aşağıda bir yerlerde yazıyor olması lazım, bir bak istersen..</p>
    </div>
  </div>
  
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-12">
      <table class="table">
            <thead style="color: white;">
                <tr>
                <th>Kullanıcı adı</th>
                <th>Puan</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < 10; $i++):?>
                <tr>
                    <td style="color: greenyellow;"><?php echo $scoreboard[$i][1]?></td>
                    <td style="color: greenyellow;"> <?php echo $scoreboard[$i][0]?></td>
                </tr>
                <?php endfor?>

            </tbody>
        </table>
      </div>
    </div>
    
    <hr>
  </div> <!-- /container -->
</main>


<footer class="container">
  <p>&copy; Karabük 2023-2024 </p>
</footer>


<!-- Bootstrap core JavaScript -->

<script src="../login/js/jquery.min.js"></script>
<script src="../login/js/bootstrap.bundle.min.js"></script>
<script src="../login/js/countdown.js"></script>
<script src="../login/js/init.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-iFp/4mTFDx4NfHUhKG6zr+29iR+oj/iB4jW0KDzZVNprTSc99IK7lNw5i5XGJh7Z" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-9aIt2nRpC12Uk9gYx2z+UrzmTCsIy4qZl5yO+kl5vWFSAl2FpzzcJL6VRwbE4gQF" crossorigin="anonymous"></script>
</body>
</html>