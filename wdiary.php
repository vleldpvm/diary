<!DOCTYPE html>
<html>
	<head>
		<title>일기 작성</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="board.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<style>
            * {
                box-sizing: border-box;
            }
            body {
                height: 100vh;
                margin: 0;
                background-color: white;
            }
            .wrapper > * {
                padding: 10px;
            }
            .wrapper {
                height: 100%;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
					grid-template-rows: 100px auto;
					grid-template-areas:
						"hd hd hd hd hd hd"
						"main main main main main main"
						;
            }
            header {
                grid-area: hd;
            }
            .main {
                grid-area: main;
            }
                      
            
            select, button,.date > input[type=text] {
                width: 100%;
                height: 100%;
                align-items: center;
                justify-content: center;
            }
			button {
				border: none;
				background-color: #8FBDD3;
				color: white;
				text-shadow:1px 1px 1px gray;
			}
            input[type=text], textarea {
                width: 100%;
                align-items: center;
                justify-content: center;
            }
			#select {
				font-size: 20px;
				text-align: center;
				margin: 0;
				height: 60px;
				display: inline;
				width: 20%;
			}
		</style>
		<link rel="stylesheet" href="menu.css">
    </head>
    <body>
        <?php
        $wdate = date('Y/m/d');
        ?>
        <div class="wrapper">
            <header style="padding: 0;">
				<?php include_once('menu.php');?>
			</header>
			<div class="main">
			<form action="wdiaryproc.php" method="post">
				<div class="select">
					<button id="select" onclick="location.href='wpicture.php'">일기</button>
					<input type="text" id="select" style="width: 59%;" name="wdate" value="<?=$wdate?>" readonly>
					<select id="select" name="scope">
						<option value="">공유범위</option>
						<option value="전체">전체</option>
						<option value="친구만">친구만</option>
						<option value="나만보기">나만보기</option>
					</select>
				</div>
                <input type="text" name="title" placeholder="Title..">
                <textarea rows="30" name="content" placeholder="Content.."></textarea>
                <label for="lname">이미지</label>
                <input type="file" name="att" onchange="loadFile(this)">
				<div class="image-show" id="image-show"></div><br>
                <input type="submit" value="Submit">
			</div>
			</form>
		
		
		<script>
			function loadFile(input) {
                var file = input.files[0];	//선택된 파일 가져오기
            
                //새로운 이미지 div 추가
                var newImage = document.createElement("img");
                newImage.setAttribute("class", 'img');
            
                //이미지 source 가져오기
                newImage.src = URL.createObjectURL(file);   
            
                newImage.style.width = "70%";
                newImage.style.height = "70%";
                newImage.style.objectFit = "contain";
            
                //이미지를 image-show div에 추가
                var container = document.getElementById('image-show');
                container.appendChild(newImage);
            };
        </script>
		<script>
 
			window.addEventListener('load', function() {
				var allElements = document.getElementsByTagName('*');
				Array.prototype.forEach.call(allElements, function(el) {
					var includePath = el.dataset.includePath;
					if (includePath) {
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function () {
							if (this.readyState == 4 && this.status == 200) {
								el.outerHTML = this.responseText;
							}
						};
						xhttp.open('GET', includePath, true);
						xhttp.send();
					}
				});
			});
	 
		</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>

