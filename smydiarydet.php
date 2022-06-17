<!DOCTYPE html>
<html>
<head>
    <title>도레미피자</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {

        box-sizing: border-box;

    }
	body {
		margin:0;
	}
    body .main{

        width: 600px;

        margin-left: auto;

        margin-right: auto;

    }

    input[type=text], select, textarea {

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

 

    input[type=submit], button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        margin-left: 10px;
        float: right;
    }
    input[type=submit]:hover, button:hover {
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
			<?php include_once('menu.php'); ?>
		</header>
		<div class="main">
        <?php
        if(!isset($_GET['dno'])) {
            header("location: showboard.php");
        }
        include_once('connect.php');
        $dno = $_GET['dno'];  // 선택한 게시글 번호
        $sql = "select * from diary where dno = $dno";
        $result = $conn->query($sql);
        if(!$result) {  // 검색오류가 있을 때
            echo $conn->error;
            die("게시판 글 검색에 오류가 있습니다.");
        }
        $row = $result->fetch_assoc();  // 한 건의 레코드 가져옴
        $email = $row['email'];
        $wdate = $row['wdate'];
        $title = $row['title'];
        $note = $row['content'];
		$att = $row['image'];
        ?>
        <h2>게시글 확인</h2>
        <p>선택한 게시글을 확인합니다.</p>
        <hr>
        <div class="container">
          <form action="modboard.php" method="post">
              <input type="text" name="no" value="<?=$no?>" hidden>
            <div class="row">
              <div class="col-25">
                <label for="fname">작성자</label>
              </div>
              <div class="col-75">
                <input type="text" name="email" value="<?=$email?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">작성일</label>
              </div>
              <div class="col-75">
                <input type="text" name="wdate" value="<?=$wdate?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">제목</label>
              </div>
              <div class="col-75">
                <input type="text" name="title" value="<?=$title?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">게시글</label>
              </div>
              <div class="col-75">
                <textarea rows="10" name="note"><?=$note?></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">첨부파일</label>
              </div>
              <div class="col-75">
                <p><a href='filedownload.php?file=<?=$att?>'><?=$att?></a></p>
				<p><a href='uploads/<?=$att?>'><?=$att?></a></p>
              </div>
            </div>
			<?php
			// 글 작성자가 로그인한 사용자라면 수정과 삭제 버튼 추가
			if($email == $_SESSION['uid']) {
			?>
			<button type="submit">글수정</button>
			<button type="button" onclick="location.href='removeboard.php?no=<?=$no?>'">글삭제</button>
			<?php } ?>
			<button type="button" onclick="location.href='showboard2.php'">글목록</button>
          </form>
        </div>
		</div>
    </body>
</html>

















