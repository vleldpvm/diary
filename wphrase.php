<?php
<?php
#1. DB 접속
include_once('connect.php');
#2. 폼 데이터 읽어오기
$content = $_POST['content'];
$parson = $_POST['parson'];

#3. INSERT SQL 작성
$sql = "insert into phrase values('$content', '$parson')";

#4. SQL 실행
if($address == null) {
		echo "<script>alert('주소를 입력하지 않았습니다.');</script>";
		
}
if($conn->query($sql))
			echo "<script>alert('글귀 등록 성공!!'); location.href='index.php';</script>";
else
	echo "회원가입 중에 오류가 발생했습니다.".$conn->error;
?>



?>