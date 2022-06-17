<?php
session_start();
#1. DB 접속
include_once('connect.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$pw = $_POST['pw'];
$uname = $_POST['uname'];
$birth = $_POST['birth'];
$telno = $_POST['telno'];
$postcode = $_POST['postcode'];
$address = $_POST['address'];
$detailAddress = $_POST['detailAddress'];
$extraAddress = $_POST['extraAddress'];
$pwq = $_POST['pwq'];
$pwa = $_POST['pwa'];
$rdate = date("Y/m/d");
//$rdate = date("Y/m/d");  // 컴퓨터의 현재 날짜를 년/월/일 형식으로 가져오기
//$point = 1000;
#3. UPDATE SQL 작성 
$sql = "UPDATE USER SET pw = '$pw', uname = '$uname', birth = '$birth', telno = $telno, postcode = '$postcode', address = '$address', detailAddress = '$detailAddress', extraAddress = '$extraAddress', pwq = '$pwq', pwa = '$pwa'
        WHERE email = '$email'";
#4. SQL 실행
if($conn->query($sql)) {
	$_SESSION['uname'] = $uname;  // 세션 데이터 변경 
	echo "회원정보수정 성공!! <a href='index.php'>피자몰</a>로 이동<br>";
}
else
	echo "회원정보수정 중에 오류가 발생했습니다.".$conn->error;
?>

