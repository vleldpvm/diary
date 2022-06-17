<!DOCTYPE html>
<html>
<head>
    <title>다이어리 용품 주문</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <style>
    * {
        box-sizing: border-box;
    }
	body{
		margin: 0;
		text-align: center;
	}
    body .main {
        width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    input[type=text], input[type=password], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }
    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
		margin-top: 10px;
        float: right;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }
    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }
    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
	#sample6_postcode{
		display: inline;
		width:70%;
	}
	.postcode {
		float:right;
		display: inline;
		width:30%;
		height:40px;
	}
    </style>
	<link rel="stylesheet" href="menu.css">
    </head>
    <body>
		<header style="padding: 0;">
			<?php include_once('menu.php');?>
		</header>
		<div class="main">
	<?php
		$uname = $_SESSION['uname'];
		$email = $_SESSION['uid'];
		$amount = 0;
		$delamt = 3000;
		
		#. DB연결. cart 테이블에서 금액을 합계 구하기.
		include_once('connect.php');
		
		# 주문번호 생성 : 현재 마지막 주문번호 가져오기, - 기호를 중심으로 앞 뒤를 자르기, 번호 생성
		$sql2 = "SELECT MAX(ordno) maxno FROM dorder";
		$result = $conn->query($sql2);
		$row = $result->fetch_assoc();
		$maxno = $row['maxno'];  // 마지막 주문번호
		//echo $maxno;
		$front = substr($maxno, 0, strpos($maxno, '-'));
		$rear = substr($maxno, strpos($maxno, '-')+1, 2);
		$today = date("Ymd");
		if($today == $front) {  // 오늘 날짜로 이미 저장된 주문이 있는 것. 순번만 증가
			$rear++; 
			$ordno = $front."-".$rear;
		}
		else {
			$ordno = $today."-1";
		}
		
		$sql = "SELECT * FROM cart WHERE email = '$email'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$no = 1;
			while($row = $result->fetch_assoc())
				$amount += $row['price'];
		}
		$total = $amount + $delamt;
		$sql3 = "select * from user where email = '$email'";
		$result = $conn->query($sql3);
		if(isset($result) && $result->num_rows > 0) {
			$row = $result->fetch_assoc();  
		
 	?>
		
			<h2>다이어리 용품 주문</h2>
			<p>장바구니에 담은 상품를 배달 주문합니다.</p>
			<hr>
			<div class="container">
			  <form action="ordernewproc.php" method="post">
				<div class="row">
				  <div class="col-25">
					<label for="fname">주문번호</label>
				  </div>
				  <div class="col-75">
					<input type="text" name="ordno" value="<?=$ordno?>" readonly>
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="fname">주문자</label>
				  </div>
				  <div class="col-75">
					<input type="text" name="uname" value="<?=$uname?>" readonly>
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="lname">주소</label>
				  </div>
				  <div class="col-75">
					<input type="text" id="sample6_postcode" name="postcode" value="<?=$row['postcode']?>">
					<input type="button" class="postcode" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
					<input type="text" id="sample6_address" name="address" value="<?=$row['address']?>"><br>
					<input type="text" id="sample6_detailAddress" name="detailAddress" value="<?=$row['detailAddress']?>">
					<input type="text" id="sample6_extraAddress" name="extraAddress" value="<?=$row['extraAddress']?>">
					
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="fname">주문금액</label>
				  </div>
				  <div class="col-75">
					<input type="text" name="amount" value="<?=$amount?>" readonly>
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="fname">배달요금</label>
				  </div>
				  <div class="col-75">
					<input type="text" name="delamt" value="<?=$delamt?>" readonly>
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="fname">결제금액</label>
				  </div>
				  <div class="col-75">
					<input type="text" name="total" value="<?=$total?>" readonly>
				  </div>
				</div>
				<div class="row">
				  <input type="submit" value="Submit">
				</div>
			  </form>
			</div>
			<?php } ?>
			</div>
			<script>
			function sample6_execDaumPostcode() {
				new daum.Postcode({
					oncomplete: function(data) {
						// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

						// 각 주소의 노출 규칙에 따라 주소를 조합한다.
						// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
						var addr = ''; // 주소 변수
						var extraAddr = ''; // 참고항목 변수

						//사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
						if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
							addr = data.roadAddress;
						} else { // 사용자가 지번 주소를 선택했을 경우(J)
							addr = data.jibunAddress;
						}

						// 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
						if(data.userSelectedType === 'R'){
							// 법정동명이 있을 경우 추가한다. (법정리는 제외)
							// 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
							if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
								extraAddr += data.bname;
							}
							// 건물명이 있고, 공동주택일 경우 추가한다.
							if(data.buildingName !== '' && data.apartment === 'Y'){
								extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
							}
							// 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
							if(extraAddr !== ''){
								extraAddr = ' (' + extraAddr + ')';
							}
							// 조합된 참고항목을 해당 필드에 넣는다.
							document.getElementById("sample6_extraAddress").value = extraAddr;
						
						} else {
							document.getElementById("sample6_extraAddress").value = '';
						}

						// 우편번호와 주소 정보를 해당 필드에 넣는다.
						document.getElementById('sample6_postcode').value = data.zonecode;
						document.getElementById("sample6_address").value = addr;
						// 커서를 상세주소 필드로 이동한다.
						document.getElementById("sample6_detailAddress").value = '';
						document.getElementById("sample6_detailAddress").focus();
					}
				}).open();
			}
		</script>
	</body>
</html>
