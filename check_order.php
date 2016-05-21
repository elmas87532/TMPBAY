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
		<h2 class="bh2">訂單確認</h2>
		<?php
		echo "<table><tr><th></th><th>商品編號</th><th>名稱</th><th>數量</th><th>價格</th></tr>";
		$num_in_session=5; //have to replace
		$total_price=0;
		for ($i=0; $i < $num_in_session; $i++) {
			echo "<tr><td><img src='img/tmp_cup.png'/></td><td>p_id</td><td>p_name</td><td>p_num</td><td>p_price</td></tr>";
			//$total_price=$total_price+$p_price;
		}
		
		echo "</table>";
		echo "<p>總金額：$total_price</p>";
		?>
		<p class="next"><a href="order.php">確認送出</a></p>
		</div>
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
		
	</div>

</body>
</html>