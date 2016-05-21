<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MarkBay</title>
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script src="js/all.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/all.js"></script>
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
					<li><a href="#">設計馬克杯</a>
						<ul>
							<li><a href="upimg.php">上傳圖片</a></li>
							<li><a href="design.php">親自繪圖</a></li>
						</ul>
					</li>
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
		<div id="login">
			<a href="login.php">會員登入</a>
		</div>
		<div class="info">
			<h2 class="bh2">商品專區</h2>
			<div class="product">
			<?php
			include 'connect.php';
			$read="SELECT * FROM product ORDER BY `uploadtime` DESC";
			$readresult=mysqli_query($conn,$read);
			while($result=mysqli_fetch_array($readresult)){ 
				//$pro_path=$result[3];
echo <<<_END

<div class='each_pro'><a href='#' onclick="window.open('$result[3]', '$result[1]', config='height=500,width=500');"><img src='$result[3]' width='200px' height='200px'/></a><p><a href='#' onclick="window.open('$result[3]', '$result[1]', config='height=500,width=500');">$result[1]</a></p><p class='ri_un'>$result[2]</p><p class='pro_addtocart'><form action='cart.php' method='post'><input type='hidden' name='p_id' value=$result[0]><input type='submit' value='加入購物車'/></form></p></div>
_END;
			}//sth to replace
			?>
			</div>
		</div>
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
	</div>
</body>
</html>
