<?php
#addcart.php로부터 데이터 받아와서 cart 테이블에 삽입하는 프로그램
session_start();
#1.DB 연결 
include_once('connect.php');
#2.데이터 읽어오기
$email = $_SESSION['uid'];
$iname = $_POST['iname'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$price = $qty * $price;
#3.INSERT SQL 작성하기
$sql = "insert into cart values('$email','$iname', $qty, $price)";
#4.SQL 실행하기
if($conn->query($sql)) 
	echo "<script> var yes;
			yes = confirm('장바구니로 이동하시겠습니까?');
			if(yes) location.href='showcart.php';
			else location.href='sitem.php';
         </script>";
else
	echo "장바구니 추가 오류 발생 : ".$conn->error;
?>
