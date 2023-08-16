<main class="py-5">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-lg-3">
				<div class="counter d-flex p-3 justify-content-evenly align-items-center">
					<p class="m-0">Решенных проблем:</p>
					<?php
						$count_sql = "SELECT * FROM `orders` WHERE `id_status` = 1";
					    $count_sql_query = mysqli_query($connect,$count_sql);
					    $count_sql_row = mysqli_num_rows($count_sql_query);

					    echo "<p class=\"fw-bold m-0\">$count_sql_row</p>";
					?>
				</div>
			</div>
		</div>
		<div class="row justify-content-center pb-4">
			<div class="col-lg-4">
				<div class="leave_request d-flex justify-content-center">
					<a href="add_request.php" class="text-decoration-none btn rounded-0 w-100 py-2">Оставить заявку</a>
				</div>
			</div>
		</div>
		<div class="row justify-content-center pb-4">
			<div class="col-lg-6">
				<div class="text-center">
					<h2>Последние решеные проблемы</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-around">
			<?php
				$str_out = "SELECT orders.name,orders.created_at,orders.id_category,orders.photo_off,orders.photo_on,category.name_category,category.id FROM `orders`, `category` WHERE `id_status` = 1 AND orders.id_category = category.id ORDER BY `created_at` DESC LIMIT 4";
				$run_out = mysqli_query($connect, $str_out);
				if (mysqli_num_rows($run_out)) {
					while ($out_orders=mysqli_fetch_array($run_out)) {
					echo "
					<div class=\"col-lg-5 mb-4\">
						<img src=assets/img/$out_orders[photo_on] onmouseover=this.src='assets/img/$out_orders[photo_off]'; onmouseout=this.src='assets/img/$out_orders[photo_on]'; class=\"w-100 request_photo\">
						<div class=\"require d-flex\">
							<div class=\"require_text w-100 text-center py-3\"><span>$out_orders[name]</span></div>
							<div class=\"require_text w-100 text-center py-3\"><span>$out_orders[created_at]</span></div>
							<div class=\"require_text w-100 text-center py-3\"><span>$out_orders[name_category]</span></div>
						</div>
					</div>";
					};
				} else {
					echo "
					<div class=text-center>
						<h4>Решенных проблем нет</h4>
					</div>";
				}
			?>
		</div>
	</div>
</main>