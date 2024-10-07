<?php

	session_start();

	if(!isset($_SESSION["login"])){
		header("Location:../ctfLogin/");
		exit();
	}

?>



<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="loginForm/css/style.css">

	</head>
	<body>
		<?php include "../ctfLogin/parts/message.php"?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
				<form action="phpProccess/login.php" method="post" class="login-form">
		      		<div class="form-group">
		      			<input type="text" name="inputUsername" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
					<div class="form-group d-flex">
						<input type="password" name="inputPasswd" class="form-control rounded-left" placeholder="Password" required>
					</div>
					<div class="form-group">
						<button type="submit" name="inputButton" class="form-control btn btn-primary rounded submit px-3">Login</button>
					</div>
					Kullanıcı adı: randomkullanıcı <br>
					Şifre: 80ed019aa14dc14e68377af8faf26f05 <br>(Bu sifre degildir baska bir seydir bence)
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="loginForm/js/jquery.min.js"></script>
  <script src="loginForm/js/popper.js"></script>
  <script src="loginForm/js/bootstrap.min.js"></script>
  <script src="loginForm/js/main.js"></script>

	</body>
</html>

