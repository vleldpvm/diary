<?php
session_start();
include_once('connect.php');
#1. 데이터 가져오기
$ordno = $_POST['ordno'];
$email = $_SESSION['uid'];
$postcode = $_POST['postcode'];
$address = $_POST['address'];
$detailAddress = $_POST['detailAddress'];
$extraAddress = $_POST['extraAddress'];
$amount = $_POST['amount'];
$delamt = $_POST['delamt'];
$total = $_POST['total'];
$odate = date('Y/m/d'); 

# Transaction 처리 : autocommit(FALSE), rollback(), commit() 
$conn->autocommit(FALSE);  // autocommit 기능을 해제 
#2. porder 테이블에 레코드 추가하기
$sql = "insert into dorder values('$ordno','$email','$odate','$postcode','$address','$detailAddress','$extraAddress',$amount,$delamt,$total)";
if(!$conn->query($sql)) { // insert sql 실행 오류 발생
	$conn->rollback();  // 이전에 실행한 SQL 구문(insert)을 취소 
	die('배달주문 생성 오류!! ERROR : '.$conn->error);
}
#3. orderitem 테이블에 레코드 추가하기
$sql = "select * from cart where email = '$email'";
$result = $conn->query($sql);
if(!$result)
	die('장바구니 검색 오류!! ERROR : '.$conn->error);
if($result->num_rows > 0) {
	$seq = 0;
	while($row = $result->fetch_assoc()) {
		$seq++;
		$iname = $row['iname'];
		$qty = $row['qty'];
		$price = $row['price'];
		//$sql = "insert into orditem values('$ordno',$seq,'$iname',$qty,$price)";
		// Prepared Statement 생성해서 실행
		$stmt = $conn->prepare("insert into orditem values(?,?,?,?,?)");
		if(!$stmt) {
			$conn->rollback();  // 이전에 실행한 SQL 구문(insert)을 취소 
			die('배달주문상세내역 생성 오류!! ERROR : '.$conn->error);			
		}
		// 매개변수 바이딩 : s - string, i - int, d - double, b - BLOB
		$stmt->bind_param("sisii",$ordno,$seq,$iname,$qty,$price);
		$stmt->execute(); // 실행하기 
		/*
		if(!$conn->query($sql)) { // insert sql 실행 오류 발생
			$conn->rollback();  // 이전에 실행한 SQL 구문(insert)을 취소 
			die('배달주문상세내역 생성 오류!! ERROR : '.$conn->error);
		}*/
	}
}
#4. cart 테이블 삭제하기
$sql = "delete from cart where email = '$email'";
if(!$conn->query($sql)) { // insert sql 실행 오류 발생
	$conn->rollback();  // 이전에 실행한 SQL 구문(insert)을 취소 
	die('장바구니 삭제 오류!! ERROR : '.$conn->error);
}
// 정상적으로 완료
$conn->commit();  // 실행을 최종 확정(완료)
$conn->autocommit(TRUE);
echo "<script>alert('배달주문이 완료되었습니다.'); location.href='index.php'</script>";
?>