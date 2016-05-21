<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MarkBay</title>
	<link rel="stylesheet" type="text/css" href="css/all.css">
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
		<div class="cart">
		<h2 class="bh2">購物車</h2>
		<?php
		include 'connect.php';
		ob_start();
		session_start();

		if (!isset($_SESSION['items']) && !isset($_SESSION['num'])) {
		$_SESSION['items']=array();
		$_SESSION['num']=array();
		}
		$_POST['num']=1;
		
		if(isset($_POST['num']) && isset($_POST['p_id'])){
		$id=$_POST['p_id'];
		//echo 'success';
		
		if(is_numeric(array_search($id,$_SESSION['items']))){
			//echo "yes";
			$index=array_search($id,$_SESSION['items']);
			$_SESSION['num'][$index]=$_SESSION['num'][$index]+$_POST['num'];
		}else{
			//echo "no";
			array_push($_SESSION['items'], $_POST['p_id']);
			array_push($_SESSION['num'], $_POST['num']);
		}
	 }//else{
	// 	echo "failed";
	// }

	 if(isset($_POST['del_item'])){
	 	$del=$_POST['del_item'];
	 	unset($_SESSION['items'][$del]);
	 	$_SESSION['items']=array_values($_SESSION['items']);
	 	unset($_SESSION['num'][$del]);
	 	$_SESSION['num']=array_values($_SESSION['num']);
	 	//echo "sus";
	 }

	 if(isset($_POST['diminish'])){
	 	$d_index=$_POST['d_i'];
	 	$_SESSION['num'][$d_index]=$_SESSION['num'][$d_index]-1;
	 }

	 if(isset($_POST['add'])){
	 	$a_index=$_POST['a_i'];
	 	$_SESSION['num'][$a_index]=$_SESSION['num'][$a_index]+1;
	 }

	$tmp_item=$_SESSION['items'];
	//print_r($tmp_item);
	$tmp_num=$_SESSION['num'];
	//print_r($tmp_num);

		
		echo "<table><tr><th></th><th>商品編號</th><th>名稱</th><th>數量</th><th>價格</th><th>刪除</th></tr>";
		//$num_in_session=5; //have to replace
		$total_price=0;
		for ($i=0; $i < count($_SESSION['items']); $i++) {
			$read="SELECT * FROM product WHERE p_id='$tmp_item[$i]'";
			$readresult=mysqli_query($conn,$read);
			$result=mysqli_fetch_row($readresult); 
			$p_price=$result[2]*$tmp_num[$i];
			$vi=$i+1;
			echo "<tr><td><img src=$result[3]></td><td>$vi</td><td>$result[1]</td><td><form action='cart.php' method='post'><input type='hidden' name='add' value='true'/><input type='hidden' name='a_i' value='$i'/><input type='submit' value='＋'/></form>$tmp_num[$i]<form action='cart.php' method='post'><input type='hidden' name='diminish' value='true'/><input type='hidden' name='d_i' value='$i'/><input type='submit' value='－'/></form></td><td>$p_price</td><form action='cart.php' method='post'><td><input type='hidden' name='del_item' value='$i'/><input type='submit' value='刪除'/></td></form></tr>";
			$total_price=$total_price+$p_price;
		}
		echo "</table>";
		echo "<p>總金額：$total_price</p>";
		?>
		<p class="next"><a href="pay.php">下一步</a></p>
		</div>
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
		
	</div>

</body>
</html>