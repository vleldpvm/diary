<?php
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
$point = 1000;
$role = "member";
#3. INSERT SQL 작성
$sql = "insert into user values('$email','$pw','$uname','$birth',$telno,'$postcode','$address','$detailAddress','$extraAddress', '$pwq', '$pwa','$rdate',$point,'$role')";
#4. SQL 실행
if($conn->query($sql)) 
	//echo "회원가입 성공!! <a href='index.html'>피자몰</a>로 이동<br>";
	echo "<script>alert('회원가입 성공!!'); location.href='index.php';</script>";
else
	echo "회원가입 중에 오류가 발생했습니다.".$conn->error;

/*
if($add == null) {
	
?>
<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
    if (!confirm("주소를 입력하지 않았습니다. 다음에 입력하시겠습니까?")) {
        alert('주소를 입력해주세요.');
		location.href='sign.html';
    } else {
        alert('회원가입 성공!!');
		location.href='index.php';
	}
	</script>
	
		
<?php }
else
	echo "회원가입 중에 오류가 발생했습니다.".$conn->error;
*/
?>

