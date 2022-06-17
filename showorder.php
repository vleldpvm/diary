<!DOCTYPE html>
<html>
<head>
    <title>Doremi Pizza Mall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
			margin: 0;
			text-align: center;
		}
		#pizza {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 80%;
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
			background-color: #4CAF50;
			color: white;
		}
        #pizza img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: #4CAF50;
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
    </style>
	<link rel="stylesheet" href="menu.css">
</head>
<body>
<header style="padding: 0;">
			<?php include_once('menu.php');?>
		</header>
	<h1>주문내역</h1>
<?php
# cart 테이블로부터 레코드 검색해서 나열하는 프로그램.
#1. 세션시작하고 이메일 가져오기
$email = $_SESSION['uid'];
#2. DB 연결
include_once('connect.php');
#3. SELECT SQL 작성
$sql = "select * from dorder where email = '$email' order by odate desc";
#4. SQL 실행
$result = $conn->query($sql);
#5. 레코드들을 하나씩 나열
if(!$result)
	die('검색 오류..');
if($result->num_rows > 0) {
	$no = 1;
?>
<table id="pizza">
	<tr>
		<th>NO</th><th>주문번호</th><th>주문일자</th><th>우편번호</th><th>배달주소</th><th>주문금액</th><th>배달요금</th><th>결제금액</th>
	</tr>
<?php
while($row = $result->fetch_assoc()) {
?>
<tr>
	<td><?=$no++?></td>
	<td><a href="showorddet.php?ordno=<?=$row['ordno']?>"><?=$row['ordno']?></a></td>
	<td><?=$row['odate']?></td>
	<td><?=$row['postcode']?></td>
	<td><?=$row['address']." ".$row['detailAddress'].$row['extraAddress']?></td>
	<td><?=$row['amount']?></td>
	<td><?=$row['delamt']?></td>
	<td><?=$row['total']?></td>
</tr>
<?php } ?>
</table>
<?php } ?>
</body>
</html>

