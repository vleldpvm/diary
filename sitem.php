<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>상품 보기</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="board.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<style>
			.card {
				background: #fff;
				  border-radius: 2px;
				  display: inline-block;
				  height: 540px;
				  margin: 10px;
				  /*position: relative;*/
				  width: 300px;
					border: 1px solid #999;
			}
			.card img {
				object-fit: cover;
				display: block;
				width: 100%;
				height: 60%;
				transition: .3s transform ease-out;
			}
			.card-text {
				text-align: center;
			}
        </style>
    </head>
    <body>
        <?php
        include_once('connect.php');
        #2. SELECT SQL문 : mypizza 테이블의 전체 레코드 검색하는 구문
        $sql = "select * from item";
        #3. SQL 실행하기
        $result = $conn->query($sql); 
        #4. 실행결과 레코드들을 화면에 보이기
        if(!$result)
            die('피자 데이터 검색에 오류가 발생했습니다. Error : '.$conn->error);
        while($row = $result->fetch_array(MYSQLI_NUM)) {
        ?>
		<div class="card" style="width: 15rem;">
			<img src="images/<?=$row[1]?>.jpg" class="card-img-top">
			<div class="card-body">
				<form action="addcartproc.php" method="post">
				  <h5 class="card-title"><?=$row[1]?></h5>
				  <p class="card-text"><?=$row[2]?>원</p>
				  <input type="text" name="iname" value="<?=$row[1]?>" hidden>
				  <input type="number" name="price" value="<?=$row[2]?>" hidden>
				  <input type="number" name="qty" value="1" min="1" max="20">
				  <button class="btn btn-primary">장바구니에 추가</button>
				 </form>
			</div>
		</div>
        <?php } ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>