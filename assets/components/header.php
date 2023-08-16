<?php
	include 'assets/controllers/db.php';
	session_start();
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Сделаем лучше вместе!</title>
</head>
<body>
<header class="position-relative">
	<div class="container">
		<div class="row justify-content-between align-items-center p-3">
			<div class="col-lg-3">
				<a href="index.php"><img src="assets/img/logo.png" class="w-50"></a>
			</div>
			<div class="col-lg-6">
				<div class="text-center">
					<h1>Сделаем лучше вместе!</h1>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="auth">

					<?php if (isset($_SESSION['user'])): ?>

					<p class="text-center m-1">Добро пожаловать</p>
					<div class="auth_buttons d-flex flex-column">
						<a href="user.php" class="text-decoration-none btn rounded-0 m-1">Мои заявки</a>
						<a href="assets/controllers/logout.php" class="text-decoration-none btn rounded-0 m-1">Выйти</a>
					</div>	

				    <?php elseif (isset($_SESSION['admin'])): ?>

				    <p class="text-center m-1">Добро пожаловать</p>
					<div class="auth_buttons d-flex flex-column">
						<a href="admin_requests.php" class="text-decoration-none btn rounded-0 m-1">Посмотреть заявки</a>
						<a href="assets/controllers/logout.php" class="text-decoration-none btn rounded-0 m-1">Выйти</a>
					</div>	

					<?php else: ?>

					<p class="text-center m-1">Авторизация/Регистрация</p>
					<div class="auth_buttons d-flex flex-column">
						<a href="auth.php" class="text-decoration-none btn rounded-0 m-1">Войти</a>
						<a href="reg.php" class="text-decoration-none btn rounded-0 m-1">Регистрация</a>
					</div>

					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</header>