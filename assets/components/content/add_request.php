<?php
	if (!isset($_SESSION['user'])) {
		header('Location: reg.php');
	}
?>
<main class="py-5">
	<div class="container">
		<div class="row justify-content-between pb-4">
			<div class="col-lg-5">
				<div class="leave_request">
					<a href="add_request.php" class="text-decoration-none btn rounded-0 w-100 py-2">Добавить заявку</a>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="look_request">
					<a href="user.php" class="text-decoration-none btn rounded-0 w-100 py-2">Посмотреть заявки</a>
				</div>
			</div>
		</div>
		<div class="row justify-content-center pb-4">
			<div class="col-lg-6">
				<div class="text-center">
					<h2>Создать заявку</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="d-flex justify-content-center">
					<form method="POST" action="assets/controllers/add.php?request=new" enctype="multipart/form-data" class="w-50 ">
						<input type="hidden" name="id">
						<div class="form-group">
							<label>Название</label>
							<input type="text" name="request_name" class="form-control" placeholder="Дерево" required>
						</div>
						<div class="form-group">
							<label>Описание</label>
							<textarea type="text" name="request_comment" class="form-control" placeholder="Упало дерево" required></textarea>
						</div>
						<div class="form-group">
							<label>Категория</label>
							<select name="request_category" class="form-control" required>
								<option disabled selected>Выберите категорию</option>
								<?php
									$cat = mysqli_query($connect, "SELECT * FROM `category`");
									while ($cat_out = mysqli_fetch_array($cat)) {
                                        echo "<option value=$cat_out[id]>$cat_out[name_category]</option>";
                                    };
						    	?>
						    </select>
						</div>
						<div class="form-group">
							<label>Фото</label>
							<input type="file" name="request_photo" class="form-control" required>
						</div>
						<div class="leave_request text-center pt-3">
							<button type="submit" class="btn rounded-0 w-50 py-1">Создать заявку</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>