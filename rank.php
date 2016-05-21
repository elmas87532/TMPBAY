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
		<div id="login">
			<a href="login.php">會員登入</a>
		</div>
		
			<div class="rank">
			<h2 class="bh2">人氣作品排行</h2>
			<?php
			$page=1;
			if (isset($_GET['page'])) {
				$page=$_GET['page'];
				$page=(int)$page;
			}
			
			$rows=100;//have to replace
			$pages=1;
			if ($rows%10==0) {
				$pages=$rows/10;
			}else{
				$pages=$rows/10+1;
			}
			//$query="SELECT * FROM rank ORDER BY CAST(r_like AS UNSIGNED)ASC";
			//mysqli_query($conn,$query);

			echo "<table><tr><th>排名</th><th></th><th>名稱</th><th class='m_none'>作者</th><th></th><th></th></tr>";
			for ($i=0; $i < $rows; $i++) {
				if ($i<(($page*10)-10)) {
					continue;
				}
				if ($i>=($page*10)) {
					break;
				}
				$rank=$i+1; 
				$u_name="u_tmp";
				$w_name="w_tmp";
				$path="img/works/$u_name/tmp_cup.png";
				echo "<tr><td>$rank</td><td><img src='$path'/></td><td>$w_name</td><td class='m_none'>$u_name</td><td><p class='like'><a href='rank.php?like=1'>like</a></p></td><td><p class='dislike'><a href='rank.php?dislike=1'>dislike</a></p></td></tr>";
			}//sth to replace
			echo "</table>";
			echo "<ul class='pages'>";
			for($i=1;$i<=$pages;$i++){
				if($i==$page){
					echo "<li style='color:#FFC000;'>$i </li>";
				}else{
					echo "<li><a href='rank.php?page=$i'>$i </a></li>";
				}
			}
			echo "</ul>";
			?>
			</div>
		
		
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
	</div>
</body>
</html>
