<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MarkBay</title>
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<div class="top"></div>
	<div class="wrap">
		<div class="header">
			<div class="logo"><a href="index.php"><img src="img/mb_logo.png"/></a></div>
			<div class="options">
				<ul>
					<li><a href="shop.php"> 商品賣場</a></li>
					<li><a href="rank.php">每週排行</a></li>
					<li><a href="design.php">設計馬克杯</a></li>
					<li><a href="member.php">會員專區</a>
						<ul>
							<li><a href="my_design.php">我的作品</a></li>
							<li><a href="select_order.php">訂單查詢</a></li>
							<li><a href="profile.php">修改資料</a></li>
						</ul>
					</li>
					<li><a href="cart.php">購物車</a></li>
				</ul>
			</div>
		</div>
		<div class="cart">
		<h2 class="bh2">訂單完成</h2>
		<?php
		echo "<table><tr><th>商品編號</th><th>日期</th><th>狀態</th><th>總金額</th></tr>";
		$num_in_session=5; //have to replace
		$total_price=0;
		for ($i=0; $i < $num_in_session; $i++) {
			echo "<tr><td>o_id</td><td>o_date</td><td>o_stat</td><td>o_totalprice</td></tr>";
			//$total_price=$total_price+$p_price;
		}
		echo "</table>";
		?>
		</div>
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
		
	</div>

</body>
</html>