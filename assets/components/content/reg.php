<?php
	if (isset($_SESSION['user'])) {
		header('Location: user.php');
	}
?>	
<main class="py-5">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-lg-6">
				<div class="text-center">
					<h2>Регистрация</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="d-flex justify-content-center">
					<form method="POST" action="assets/controllers/add.php?signup" class="w-50 ">
						<div class="form-group">
							<label>ФИО</label>
							<input type="text" name="username" class="form-control" placeholder="Иванов Иван Иванович" required>
						</div>
						<div class="form-group">
							<label>Логин</label>
							<input type="text" name="login" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
						</div>
						<div class="form-group">
							<label>Пароль</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Повтор пароля</label>
							<input type="password" name="password_confirm" class="form-control" required>
							<?php
								if (isset($_SESSION['message'])) {
									echo '<label class="reg_msg py-1"> ' . $_SESSION['message'] . ' </label>';
								};
								unset($_SESSION['message']);
							?>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" required>
							<label>Согласие на обработку персональных данных</label>
						</div>
						<div class="leave_request text-center pt-3">
							<button type="submit" class="btn rounded-0 w-50 py-1">Зарегистрироваться</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>