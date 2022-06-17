<?php
session_start();
#1.DB 연결 
include_once('connect.php');
#2.데이터 읽어오기
$email = $_SESSION['uid'];
$wdate = $_POST['wdate'];
$title = $_POST['title'];
$content = $_POST['content'];
$tag = $_POST['content'];
$image = $_POST['att'];
$scope = $_POST['scope'];
if($scope == '') 
	echo "<script>alert('공유범위를 선택하세요!!'); history.go(-1) </script>";
else {
	#3.INSERT SQL 작성하기
	$sql = "insert into diary(email, wdate, title, content, image, scope)
			values('$email','$wdate', '$title','$content', '$image','$scope')";
	#4.SQL 실행하기
	if($conn->query($sql)) 
		echo "<script>alert('일기 작성 완료!!'); location.href='index.php';</script>";
	else
		echo "일기 작성 오류 발생 : ".$conn->error;
}
?>
