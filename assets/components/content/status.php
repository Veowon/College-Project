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
					<h2>Изменить статус заявки</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="d-flex justify-content-center">

					<?php
						$id = $_GET['id'];
					?>

					<?php if (isset($_GET['status']) and $_GET['status']=='complete'): ?> 

						<form method="POST" action="assets/controllers/change_status.php?status=complete" enctype="multipart/form-data" class="w-50 ">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<div class="row justify-content-center pb-4">
								<div class="col-lg-6">
									<div class="text-center">
										<h4>Заявка решена</h4>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Фотография решения завки</label>
								<input type="file" name="request_photo_complete" class="form-control" required>
							</div>
							<div class="leave_request text-center pt-3">
								<button type="submit" class="btn rounded-0 w-50 py-1">Изменить</button>
							</div>
						</form>

					<?php elseif (isset($_GET['status']) and $_GET['status']=='reject'): ?>

						<form method="POST" action="assets/controllers/change_status.php?status=reject" class="w-50 ">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<div class="row justify-content-center pb-4">
								<div class="col-lg-6">
									<div class="text-center">
										<h4>Заявка отклонена</h4>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Причина отказа</label>
								<textarea type="text" name="request_comment_reject" class="form-control" required></textarea>
							</div>
							<div class="leave_request text-center pt-3">
								<button type="submit" class="btn rounded-0 w-50 py-1">Изменить</button>
							</div>
						</form>

					<?php else: ?>

						<div class="row justify-content-center pb-4">
							<div class="col-lg-6">
								<div class="text-center">
									<h4>Ошибка</h4>
									<p>Вернитесь назад и повторите попытку.</p>
								</div>
							</div>
						</div>

					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</main>