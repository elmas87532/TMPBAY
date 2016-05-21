function openIMG(pro_name) {
	var pro_name=pro_name;
	var pro_path="img/"+pro_name+".png";
    window.open(pro_path, config='height=500,width=500');
}
$(function(){
	
	var $login = $('#login'),
		_top = $login.offset().top;
 
	// 當網頁捲軸捲動時
	var $win = $(window).scroll(function(){
		// 如果現在的 scrollTop 大於原本 #login 的 top 時
		if($win.scrollTop() >= _top){
			// 如果 $login 的座標系統不是 fixed 的話
			if($login.css('position')!='fixed'){
				// 設定 #login 的座標系統為 fixed
				$login.css({
					position: 'fixed',
					top: 0
				});
			}
		}else{
			// 還原 #login 的座標系統為 absolute
			$login.css({
				position: 'absolute',
				top:10
			});
		}
	});
});

/*------------------sketch------------------*/
$(function () {
    //產生不同顏色的div方格當作調色盤選項
    var colors =
    "red;orange;yellow;green;blue;indigo;purple;black;white".split(';');
    var sb = [];
    $.each(colors, function (i, v) {
        sb.push("<div class='option' style='background-color:" + v + "'></div>");
    });
    $("#dPallete").html(sb.join("\n"));
     //產生不同尺寸的方格當作線條粗細選項
    sb = [];
    for (var i = 1; i <= 9; i++)
        sb.push("<div class='option lw'>" +
     "<div style='margin-top:#px;margin-left:#px;width:%px;height:%px'></div></div>"
        .replace(/%/g, i).replace(/#/g, 10 - i / 2));
    $("#dLine").html(sb.join('\n'));
    var $clrs = $("#dPallete .option");
    var $lws = $("#dLine .option");
     //點選調色盤時切換焦點並取得顏色存入p_color，
     //同時變更線條粗細選項的方格的顏色
    $clrs.click(function () {
        $clrs.removeClass("active");
        $(this).addClass("active");
        p_color = this.style.backgroundColor;
        $lws.children("div").css("background-color", p_color);
    }).first().click();
     //點選線條粗細選項時切換焦點並取得寬度存入p_width
    $lws.click(function () {
        $lws.removeClass("active");
        $(this).addClass("active");
        p_width =
            $(this).children("div").css("width").replace("px", "");

    }).eq(3).click();
     //取得canvas context
    var $canvas = $("#cSketchPad");
    var ctx = $canvas[0].getContext("2d");
    ctx.lineCap = "round";
    ctx.fillStyle = "white"; //整個canvas塗上白色背景避免PNG的透明底色效果
    ctx.fillRect(0, 0, $canvas.width(), $canvas.height());
    var drawMode = false;
     //canvas點選、移動、放開按鍵事件時進行繪圖動作
    $canvas.mousedown(function (e) {
        ctx.beginPath();
        ctx.strokeStyle = p_color;
        ctx.lineWidth = p_width;
        ctx.moveTo(e.pageX - $canvas.position().left, e.pageY - $canvas.position().top);
        drawMode = true;
    })
    .mousemove(function (e) {
        if (drawMode) {
            ctx.lineTo(e.pageX - $canvas.position().left, e.pageY - $canvas.position().top);
            ctx.stroke();
        }
    })
    .mouseup(function (e) {
        drawMode = false;
    });
     //利用.toDataqURL()將繪圖結果轉成圖檔
    $("#bGenImage").click(function () {
        $("#dOutput").html(
        $("<img />", { src: $canvas[0].toDataURL(),
            "class": "output"
        }));
    });
    $("#bCleanImage").click(function () {
        ctx.clearRect(0, 0, $canvas.width(), $canvas.height());
    });

    var w_name=document.getElementById("w_name").value;
    $("#SAVE").click(function(){
    	var canvasData = $canvas[0].toDataURL("image/png");
    	var ajax = new XMLHttpRequest();
    	ajax.open("POST",'design.php',true);
		ajax.setRequestHeader('Content-Type', 'application/upload');
		ajax.send(canvasData );

		var xhr=new XMLHttpRequest();
		xhr.open("GET",'design.php?w_name='+w_name,true);
		xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send();
    })

 });

