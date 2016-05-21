<?php
$w_name="test.png";
if (isset($_GET['w_name'])) {
	$w_name=$_GET['w_name'].".png";
}

if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
{
  // Get the data
  $imageData=$GLOBALS['HTTP_RAW_POST_DATA'];
 
  // Remove the headers (data:,) part.
  // A real application should use them according to needs such as to check image type
  $filteredData=substr($imageData, strpos($imageData, ",")+1);
 
  // Need to decode before saving since the data we received is already base64 encoded
  $unencodedData=base64_decode($filteredData);
 
  //echo "unencodedData".$unencodedData;
 
  // Save file. This example uses a hard coded filename for testing,
  // but a real application can specify filename in POST variable
  //$query="INSERT INTO work(w_name,w_public,w_date,u_id) VALUES('$w_name',1,'$w_date','$u_id')";
  $fp = fopen( 'img/works/u_tmp/'.$w_name, 'wb' );
  fwrite( $fp, $unencodedData);
  fclose( $fp );
}

?>
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
					<li><a href="#">會員專區</a>
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
		<div id="dPallete"></div>
		<div id="dLine"></div>
		
		<div id="dCanvas">
			<canvas id="cSketchPad" width="500" height="500" style="border: 2px solid gray" />
		</div>
		
		<input type="button" id="bGenImage" value="完成" />
		<input type="button" id="bCleanImage" value="清空" />
		<input type="text" id="w_name" name="w_name" />
		<input type="button" id="SAVE" value="儲存" />
		<div id="dOutput"></div>
		
		
		<div class="footer">
			<hr/>
			<p>MARKBAY @ phpdb</p>
		</div>
	</div>
</body>
</html>
