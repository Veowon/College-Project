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
		<div class="row justify-content-center pb-1">
			<div class="col-lg-6">
				<div class="text-center">
					<h2>Категории заявок</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center pb-4">
			<div class="col-lg-4">
				<div class="leave_request">
					<a href="add_category.php" class="text-decoration-none btn rounded-0 w-100 py-2">Добавить категорию</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th class="text-center w-100" scope="col">Название</th>
				      <th class="text-center" scope="col">Действие</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		$str_out = "SELECT * FROM `category` ORDER BY `id` ASC";
				  		$run_out = mysqli_query($connect, $str_out);
				  		while ($out_orders=mysqli_fetch_array($run_out)) {
				  			echo "<tr>
							      <th scope=row>$out_orders[id]</th>
							      <td class=text-center>$out_orders[name_category]</td>
							      <td class=\"table_button text-center\"><a href=assets/controllers/delete.php?category=delete&id='$out_orders[id]' onclick=\"return confirm('Вы уверены что хотите удалить данную категорию?')\">Удалить</a></td>
							    </tr>
				  			";
				  		};
				  	?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</main>