<?php
//include 'connect.php';

if (isset($_POST['have_sign'])) {
	
	if(isset($_POST['u_name']) && $_POST['u_name']!=null){
		$u_name=$_POST['u_name'];
	}else{
		$u_name="";
		//echo "<script>alert('姓名不可空白！')</script>";
		header("Location: sign.php?none=name");
	}
	if(isset($_POST['u_pw']) && $_POST['u_pw']!=null){
		$u_pw=$_POST['u_pw'];
	}else{
		$u_pw="";
		//echo "<script>alert('密碼不可空白！')</script>";
		header("Location: sign.php?none=pw");
	}
	if(isset($_POST['u_id']) && $_POST['u_id']!=null){
		$u_id=$_POST['u_id'];
	}else{
		$u_id="";
		//echo "<script>alert('帳號不可空白！')</script>";
		header("Location: sign.php?none=id");
	}
	

	

	if ($u_id!=null && $u_pw!=null && $u_name!=null) {
		/*$query="SELECT u_id FROM user WHERE u_id='$u_id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_row($result);
		if ($row[0]==null) {
			$query="INSERT INTO user(u_id,u_pw,u_name) VALUES('$u_id','$u_pw','$u_name')";
			mysqli_query($conn,$query);
		}else{
			header("Location: sign.php?idyet=exist");
		}*/
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MarkBay</title>
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="refresh" content="3;url=login.php" />
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
		<h2 class="bh2">註冊完成，3秒後回登入頁</h2>
		

		</div>
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
		
	</div>

</body>
</html>