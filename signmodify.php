<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <style>
    * {
        box-sizing: border-box;
    }
    body{
		margin: 0;
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
    </style>
	<link rel="stylesheet" href="menu.css">
    </head>
    <body>
		<header style="padding: 0;">
			<?php include_once('menu.php');?>
		</header>
		<?php
		# 로그인한 사용자의 회원정보를 읽어와서 아래 입력 양식에 표시하기
		$email = $_SESSION['uid']; // 로그인한 사용자의 이메일(아이디)
		include_once('connect.php');
		$sql = "select * from user where email = '$email'";
		$result = $conn->query($sql);
		if(isset($result) && $result->num_rows > 0) {
			$row = $result->fetch_assoc();  // 검색된 레코드 하나가 연관배열로 $row에 저장 
		?>
		<div class="main">
        <h2>회원정보수정</h2>
        <p>다이어리  회원이 되어주셔서 감사드립니다.</p>
        <hr>
        <div class="container">
          <form action="signmodproc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="fname">이메일</label>
              </div>
              <div class="col-75">
                <input type="text" name="email" value="<?=$row['email']?>" readonly>
              </div>
            </div>
			<div class="row">
              <div class="col-25">
                <label for="lname">비밀번호</label>
              </div>
              <div class="col-75">
                <input type="password" name="pw" value="<?=$row['pw']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">이름</label>
              </div>
              <div class="col-75">
                <input type="text" name="uname" value="<?=$row['uname']?>">
              </div>
            </div>            
            <div class="row">
              <div class="col-25">
                <label for="lname">생년월일</label>
              </div>
              <div class="col-75">
                <input type="date" name="birth" value="<?=$row['birth']?>">
              </div>
			</div>
            <div class="row">
              <div class="col-25">
                <label for="lname">전화번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="telno" value="<?=$row['telno']?>">
              </div>
            </div>
			<div class="row">
              <div class="col-25">
                <label for="lname">주소</label>
              </div>
              <div class="col-75">
				<input type="text" id="sample6_postcode" name="postcode" value="<?=$row['postcode']?>">
				<input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
				<input type="text" id="sample6_address" name="address" value="<?=$row['address']?>"><br>
				<input type="text" id="sample6_detailAddress" name="detailAddress" value="<?=$row['detailAddress']?>">
				<input type="text" id="sample6_extraAddress" name="extraAddress" value="<?=$row['extraAddress']?>">
				
              </div>
			</div>
			<p class="notice">비밀번호 찾기 시 사용됩니다.</p>
			<div class="row">
              <div class="col-25">
                <label for="lname">비밀번호 질문</label>
              </div>
              <div class="col-75">
                <input type="text" name="pwq" value="<?=$row['pwq']?>">
              </div>
			</div>
			<div class="row">
              <div class="col-25">
                <label for="lname">비밀번호 답</label>
              </div>
              <div class="col-75">
                <input type="text" name="pwa" value="<?=$row['pwa']?>">
              </div>
			</div>
            <div class="row">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
		</div>
		<?php } // ?php} 붙여있으면 안됨. ?>   
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