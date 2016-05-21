<?php
//include 'connect.php';

if (isset($_GET['none'])) {
	$none=$_GET['none'];
	switch ($none) {
		case 'id':
			echo "<script>alert('帳號不可空白！')</script>";
			break;
		case 'pw':
			echo "<script>alert('密碼不可空白！')</script>";
			break;
		case 'name':
			echo "<script>alert('姓名不可空白！')</script>";
			break;
		
		default:
			# code...
			break;
	}
}
if (isset($_GET['idyet'])) {
	echo "<script>alert('此帳號已存在')</script>";
}

?>
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
		<div class="next">
		<h2 class="bh2">會員登入</h2>
		<br/><br/>
		<form action="signresult.php" method="post">
					*帳號：<input type="text" name="u_id" size="24" maxlength="16" onkeyup="value=value.replace(/[\W]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"><br/>
					(限16英文數字)<br/>
					*密碼：<input type="password" name="u_pw" size="24" maxlength="16" onkeyup="value=value.replace(/[\W]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"><br/>
					(限16英文數字)<br/>
					*姓名：<input type="text" name="u_name" size="24" /><br/>
					
					<input type="hidden" name="have_sign" value="true" /><br/><br/>
					<input type="submit" value="送出">
				</form>
		</div>
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
		
	</div>

</body>
</html>