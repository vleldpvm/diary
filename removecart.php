<?php
#1.세션처리
session_start();
#2.DB 연결
include_once('connect.php');
#3.데이터 가져오기
$email = $_SESSION['uid'];  // 로그인한 사용자의 아이디(이메일)
$chk = $_POST['chk'];
//var_dump($chk);  
#4.DELETE SQL 작성 & 5.SQL 실행
for($i=0; $i<count($chk); $i++) {
	$iname = $chk[$i];
	$sql = "delete from cart where email = '$email' and iname = '$iname'";
	if(!$conn->query($sql))
		die('장바구니 삭제 중에 오류 발생!! Error: '.$conn->error);
}
echo "<script>location.href='showcart.php'</script>";
?>