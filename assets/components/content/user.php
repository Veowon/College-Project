<?php
	if (!isset($_SESSION['user'])) {
		header('Location: auth.php');
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
					<h2>Список моих заявок</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div>
					<span class="fw-bold">Фильтр:</span>
					<span class="table_filter"><a href="user.php?sorting=all">все</a></span>
					<span class="table_filter"><a href="user.php?sorting=new">новые</a></span>
					<span class="table_filter"><a href="user.php?sorting=complete">решенные</a></span>
					<span class="table_filter"><a href="user.php?sorting=reject">отклоненные</a></span>
				</div>
				<table class=table>
				    <thead>
					    <tr>
					      <th scope=col>#</th>
					      <th scope=col>Временная метка</th>
					      <th scope=col>Название</th>
					      <th scope=col>Описание</th>
					      <th scope=col>Категория</th>
					      <th scope=col>Статус</th>
					      <th scope=col>Действие</th>
					    </tr>
				    </thead>
				    <tbody>
				  	<?php

				  		if (isset($_GET['sorting'])) {
				  			$sort = $_GET['sorting'];

				  			switch ($sort) {
				  			case 'all':
				  				$sorting = "";
				  				break;
				  			case 'new':
				  				$sorting = "AND orders.id_status = 3";
				  				break;
				  			case 'complete':
				  				$sorting = "AND orders.id_status = 1";
				  				break;
				  			case 'reject':
				  				$sorting = "AND orders.id_status = 2";
				  				break;
				  			default:
				  				$sorting = "";
				  				break;
				  			};
				  		} else {
				  			$sorting = "";
				  		};

				  		$user_id = $_SESSION['user']['id'];

				  		$str_out = "SELECT orders.id as orders_id,orders.name,orders.created_at,orders.description,orders.id_status,orders.id_category,orders.id_user,category.name_category,category.id,status.id,status.name_status FROM `orders`, `category`, `status` WHERE orders.id_category = category.id AND orders.id_status = status.id AND orders.id_user = $user_id $sorting ORDER BY orders.id";

					  	$run_out = mysqli_query($connect, $str_out);
					  	if (mysqli_num_rows($run_out)) {
					  		while ($out_orders=mysqli_fetch_array($run_out)) {
					  		echo "<tr>
							      <th scope=row>$out_orders[orders_id]</th>
							      <td>$out_orders[created_at]</td>
							      <td>$out_orders[name]</td>
							      <td>$out_orders[description]</td>
							      <td>$out_orders[name_category]</td>
							      <td>$out_orders[name_status]</td>
							      <td class=table_button><a href=assets/controllers/delete.php?request=delete&id='$out_orders[orders_id]' onclick=\"return confirm('Вы уверены что хотите удалить данную заявку?')\">Удалить</a></td>
							    </tr>
					  		";
					  		};
					  	} else {
					  		echo "
							<div class=text-center>
								<h4>Список заявок пуст</h4>
							</div>";
					  	}
				    ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>