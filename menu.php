<?php session_start();?>

<!DOCTYPE html>
<html>
	<head>
		<title>일기 작성</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	</head>
	<body>
		<?php
			$logged = false;
			if(isset($_SESSION['uid'])) {  // 세션에 uid 키가 정의되어 있으면 
				$uid = $_SESSION['uid'];
				$uname = $_SESSION['uname'];
				//echo "$uid : $uname<br>";
				$logged = true;
			}
			#1. Database connection
			include_once('connect.php');
			if($logged) { // log in 상태 
				// 장바구니 검색
				$sql = "select count(*) rowcnt from cart where email = '$uid'";
				$result = $conn->query($sql);
				//$row = $result->fetch_array(MYSQLI_NUM);
				$row = $result->fetch_assoc();
			}
			else // 로그인상태가 아니면
			header("location: login.php"); // 로그인페이지로 이동하기
		?>
		<header>
			<ul id="ul">
				<li class="menus"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
				  </svg>전체메뉴</a>
				  <div class="menu">
						<a href="wdiary.php">일기작성</a>
						<a href="smydiary.php">내일기보기</a>
						<a href="sdiary.php">공유일기보기</a>
						<hr>
						<a href="sitem.php">상품목록</a>
						<a href="showcart.php"><?="장바구니(".$row['rowcnt'].")"?></a>
						<a href="showorder.php">주문내역</a>
						<hr>
						<a href="signmodify.php">회원정보수정</a>
						<a href="signdel.php">회원탈퇴</a>
					</div>
				</li>
				<li class="menus"><a href="#">DIARY</a>
					<div class="menu">
						<a href="wdiary.php">일기작성</a>
						<a href="smydiary.php">내일기보기</a>
						<a href="sdiary.php">공유일기보기</a>
					</div>
				</li>
				<li class="menus"><a href="#">SHOP</a>
					<div class="menu">
						<a href="sitem.php">상품목록</a>
						<a href="showcart.php"><?="장바구니(".$row['rowcnt'].")"?></a>
						<a href="showorder.php">주문내역</a>
					</div>
				</li>
				<li class="menus" style="float: right;"><a href="#">회원정보<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
					<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
				  </svg></a>
				  <div class="menu">
						<a href="signmodify.php">회원정보수정</a>
						<a href="signdel.php">회원탈퇴</a>
					</div>
				</li>
				<li class="menus" style="float: right; width: 100px; padding: 0; border-radius: 4px; background-color: #BE8C63"><a href="index.php">홈으로</a></li>
				<br>
				<br>
				<li class="menus" style="float: right;"><a href='signout.php'>로그아웃</a>
				<li class="menus" style="width: auto; float: right;"><a href="#"><?="{$uname}님 환영합니다."?></a>
			</ul>
		</header>
	</body>
</html>