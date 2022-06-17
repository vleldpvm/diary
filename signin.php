<?php
#0. 세션 처리 시작하기
session_start(); // 이 페이지에서 세션 데이터 처리하고자 한다.
#1. DB 접속
include_once('connect.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$pw = $_POST['pw'];
#3. SELECT SQL 작성
$sql = "select * from user where email = '$email' and pw = '$pw'";
//echo "$sql<br>";
#4. SQL 실행
$result = $conn->query($sql);
if(isset($result) && $result->num_rows) {
	$row = $result->fetch_assoc();  // 검색된 레코드 한 개를 연관배열로 가져온다.
	//쿠키 데이터 확인
	$cookie_name = "user";
	if(isset($COOKIE[$cookie_name])) {
		echo "test cookie : $COOKIE($cookie_name";
		echo "<script>alert(".$COOKIE($cookie_name)."님 반갑습니다.
		마지막 방문일자 : ".$_COOKIE['logdate'].")</script>";
	}
	else "<script>쿠키 데이터 설정없음</script>";
	
	// 세션 데이터 생성
	$_SESSION['uid'] = $email;  // $_SESSION은 연관배열. uid 키 생성하고 값으로 $email 저장
	$_SESSION['uname'] = $row['uname']; // 세션 키 uname = user 테이블의 name 컬럼

	
	//쿠키 데이터 생성하고
	$cookie_name = "user";
	$cookie_value = $row['uname'];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //86400 24시간, 30일 (유효기간)
	$cookie_name = "logdate";
	$cookie_value = date('Y/m/d');
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //86400 24시간, 30일 (유효기간)


	echo "<script>location.href='index.php'</script>";
}
else
	echo "이메일 또는 비밀번호가 맞지 않습니다."

?>
