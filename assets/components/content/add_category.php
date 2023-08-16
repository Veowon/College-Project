<?php
	if (!isset($_SESSION['admin'])) {
		header('Location: auth.php');
	}
?>
<main class="py-5">
	<div class="container">
		<div class="row justify-content-between pb-4">
			<div class="col-lg-5">
				<div class="leave_request">
					<a href="admin_requests.php" class="text-decoration-none btn rounded-0 w-100 py-2">Список заявок</a>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="look_request">
					<a href="admin_categories.php" class="text-decoration-none btn rounded-0 w-100 py-2">Категории заявок</a>
				</div>
			</div>
		</div>
		<div class="row justify-content-center pb-4">
			<div class="col-lg-6">
				<div class="text-center">
					<h2>Добавить категорию</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="d-flex justify-content-center">
					<form method="POST" action="assets/controllers/add.php?category=new" enctype="multipart/form-data" class="w-50 ">
						<div class="form-group">
							<label>Название</label>
							<input type="text" name="category_name" class="form-control" placeholder="Дорожные работы" required>
						</div>
						<div class="leave_request text-center pt-3">
							<button type="submit" class="btn rounded-0 w-50 py-1">Создать категорию</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>