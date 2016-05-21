<?php
include 'connect.php';

echo <<<_END
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>MarkBay</title>
	<link rel="stylesheet" type="text/css" href="css/all.css">
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
		<div class="main_info">
			<img src="img/tmp_m_photo.png">
			<a href="design.php">DESIGN MY OWN BAY</a>
		</div>
		<div class="info">
			<h2 class="bh2">本週排行</h2>
_END;

			echo "<ul>";
			for ($i=0; $i < 5; $i++) { 
				echo "<li><a href='rank_info.php?r_id=r_id'><img src='img/tmp_cup.png'/></a><p><a href='rank_info.php?r_id=r_id'>work_name</a></p><p class='ri_un'>user_name</p></li>";
			}

echo <<<_END
		</div>
		<div class="info">
			<h2 class="gh2">推薦商品</h2>
_END;

			$read="SELECT * FROM product ORDER BY 'sell_quantity' DESC limit 5";
			$readresult=mysqli_query($conn,$read);
			echo "<ul>";
			//for ($i=0; $i < 5; $i++)
			while($result=mysqli_fetch_array($readresult)){
// echo <<<_END

// <div class='each_pro2'><a href='#' onclick="window.open('$result[3]', '$result[1]', config='height=500,width=500');"><img src='$result[3]' width='200px' height='200px'/></a><p><a href='#' onclick="window.open('$result[3]', '$result[1]', config='height=500,width=500');">$result[1]</a></p></div>
// _END; 
				 echo "<li><a href='#' onclick='window.open('$result[3]', '$result[1]', config='height=500,width=30');'><img src='".$result[3]."'width='200px' height='130px'/></a><p><a href='#' onclick='window.open('$result[3]', '$result[1]', config='height=500,width=500');'>".$result[1]."</a></p></li>";
				 // echo "<li><a href='product.php?pro_name=".$result[1]."'><img src='".$result[3]."'width='200px' height='130px'/></a><p><a href='product.php?pro_name=".$result[1]."'>".$result[1]."</a></p></li>";
			}

echo <<<_END
</div>
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
	</div>
</body>
</html>

_END;

?>
