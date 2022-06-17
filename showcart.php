<!DOCTYPE html>
<html>
<head>
    <title>Doremi Pizza Mall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
                text-align: center;
				margin: 0;
        }
        #pizza {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        #pizza td, #pizza th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #pizza tr:nth-child(even){background-color: #f2f2f2;}
        #pizza tr:hover {background-color: #ddd;}
        #pizza th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #8FBDD3;
            color: white;
        }
        #pizza img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: #8FBDD3;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 70%;
            opacity: 0.9;
            margin-top: 10px;
        }
        .btn:hover {
            opacity: 1;
        }
		
		.totalprice {
            font-size: 20px;
            color: #A97155;
            border: 5px solid #8FBDD3;
            width: 66%;
            padding: 20px;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
	<link rel="stylesheet" href="menu.css">
</head>
<body>

<header style="padding: 0;">
	<?php include_once('menu.php');?>
</header>
<?php
# cart 테이블로부터 레코드 검색해서 나열하는 프로그램.
#1. 세션시작하고 이메일 가져오기
$email = $_SESSION['uid'];
$totalprice = 0;
#2. DB 연결
include_once('connect.php');
#3. SELECT SQL 작성
$sql = "SELECT * FROM cart WHERE email = '$email'";
#4. SQL 실행
$result = $conn->query($sql);
#5. 레코드들을 하나씩 나열
if(!$result)
	die('검색 오류..');
if($result->num_rows > 0) {
	$no = 1;
?>
		<h1 style="color:#A97155;">장바구니</h1>
<form action="removecart.php" method="post">
	<table id="pizza">
		<tr>
			<th></th><th>NO</th><th>사진</th><th>상품명</th><th>수량</th><th>금액</th>
		</tr>
	<?php
	while($row = $result->fetch_assoc()) {
	?>
	<tr>
		<td><input type="checkbox" name="chk[]" value="<?=$row['iname']?>"></td>
		<td><?=$no++?></td>
		<td><img src="images/<?=$row['iname']?>.jpg"></td>
		<td><?=$row['iname']?></td>
		<td><?=$row['qty']?></td>
		<td><?=$row['price']?></td>
	</tr>
	<?php
	$totalprice += $row['price']; }
	?>
	</table>
	<div class="totalprice"><b>총 금액 : <?=$totalprice?></b></div>
	<button type="submit" class="btn">장바구니삭제</button>
</form>
	<button class="btn" onclick="location.href='ordernew.php'">배달주문</button>
<?php }
else {
		echo "<br>장바구니에 상품이 없습니다.";
	}?>
</body>
</html>

