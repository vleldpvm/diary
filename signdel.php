<?php
# 회원탈퇴는 로그인한 사용자의 이메일로 user 테이블에서 레코드 삭제하기
session_start();
$email = $_SESSION['uid'];
include_once('connect.php');
$sql = "delete from user where email = '$email'"; // 삭제하는 구문.
if($conn->query($sql)) {
	session_destroy();
	echo "<script>alert('회원탈퇴 성공!!'); location.href='index.php';</script>";
}
else
	echo "회원탈퇴 처리 중에 오류가 발생했습니다.".$conn->error;
?>