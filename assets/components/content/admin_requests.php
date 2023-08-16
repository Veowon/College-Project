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
					<h2>Список заявок</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div>
					<span class="fw-bold">Фильтр:</span>
					<span class="table_filter"><a href="admin_requests.php?sorting=all">все</a></span>
					<span class="table_filter"><a href="admin_requests.php?sorting=new">новые</a></span>
					<span class="table_filter"><a href="admin_requests.php?sorting=complete">решенные</a></span>
					<span class="table_filter"><a href="admin_requests.php?sorting=reject">отклоненные</a></span>
				</div>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Временная метка</th>
				      <th scope="col">Название</th>
				      <th scope="col">Описание</th>
				      <th scope="col">Категория</th>
				      <th scope="col">Статус</th>
				      <th scope="col">Причина отклонения</th>
				      <th class="text-center" colspan="2" scope="col">Изменить статус</th>
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

					  	$str_out = "SELECT orders.id as orders_id,orders.name,orders.created_at,orders.description,orders.id_status,orders.id_category,orders.reject_comment,category.name_category,category.id,status.id,status.name_status FROM `orders`, `category`, `status` WHERE orders.id_category = category.id AND orders.id_status = status.id $sorting ORDER BY orders.id";
					  	$run_out = mysqli_query($connect, $str_out);
					  	while ($out_orders=mysqli_fetch_array($run_out)) {
					  		echo "<tr>
							      <th scope=row>$out_orders[orders_id]</th>
							      <td>$out_orders[created_at]</td>
							      <td>$out_orders[name]</td>
							      <td>$out_orders[description]</td>
							      <td>$out_orders[name_category]</td>
							      <td>$out_orders[name_status]</td>
							      <td>$out_orders[reject_comment]</td>
							      ";
							      if ($out_orders['id_status'] == 3) {
							      	echo "
							      	<td class=\"table_button text-center\"><a href=status.php?status=complete&id='$out_orders[orders_id]'>Решена</a></td>
				      			  	<td class=\"table_button text-center\"><a href=status.php?status=reject&id='$out_orders[orders_id]'>Отклонена</a></td>";
							      } else {
							      	echo "
							      	<td></td>
				      			  	<td></td>";
							      };
							      echo "</tr>";
					  	};
				    ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</main>