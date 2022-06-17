<!dottype html>
<html>
	<head>
		<title>DIARY</title>
		<meta charset="utf-8">
		<style>
		body {
			margin: 0;
			text-align: center;
			height: 100vh;
			background-image: url('images/back.png');
			background-size: cover;
			background-position: center;
		}
		body:before {
			content: '';
			background: linear-gradient(to top, black, transparent);
			position: absolute;
			left: 0;
			height: 100%;
			width: 100%;
		}
		h1 {
			color: white;
			font-size: 50px;
		}
		q {
			color: #8FBDD3;
			font-size: 20px;
			margin-top: 10px;
			position: absolute;
			transform: translate(-50%, -40%);
			top: 100px;
			text-shadow:1px 1px 1px #000;
		}
		.menu {
			position: absolute;
			top: 50%;
			left: 50%;
			display: inline-block;
			transform: translate(-50%, -50%);
			padding-top: 30px;
			width: 500px;
			height: 180px;
			background-color: white;
			border-radius: 10px;
			border: 4px solid #A97155;
		}
		button {
			margin: 10px;
			width: 200px;
			height: 80px;
			font-size: 20px;
			background-color: white;
			color: #A97155;
			padding: 12px 20px;
			border: 2px solid #8FBDD3;
			border-radius: 4px;
			cursor: pointer;
			margin-top: 10px;
			margin-left: 10px;
			float: center;
		}
		</style>
	</head>
	<body>
		<h1>Diary</h1>
		<?php
		include_once('connect.php');
		$sql = "select * from phrase order by rand() limit 1";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) { ?>
		<q><b><?=$row['content']; } ?></b></q>
		<br>
		<div class="menu">
			<button type="button" onclick="location.href='signup.html'"><b>회원가입</b></button>
			<button type="button" onclick="location.href='signin.html'"><b>로그인</b></button><br>
			<p><a href='findid.html'>아이디/비밀번호 찾기</a></p>
		</div>
	</body>
</html>