<!doctype html>
<html>
	<head>
		<title>My Diary</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			body {
				margin: 0;
			    background: #e2e1e0;
			    text-align: center;
			}
			h1 {
				text-align: center;
				padding: 32px;
			}
			#pizza {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
            }
            #pizza td, #pizza th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #pizza tr:nth-child(even){background-color: #f2f2f2;}
            #pizza tr:hover {background-color: #ddd;}
            #pizza th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: orange;
                color: white;
            }
			
						
		</style>
		<link rel="stylesheet" href="menu.css">	
	</head>
	<body>
		<header style="padding: 0;">
			<?php include_once('menu.php'); ?>
		</header>
		<h1>My Diary</h1>
		<?php
		#2. SELECT SQL문 : mypizza 테이블의 전체 레코드 검색하는 구문
		$sql = "select * from diary";
		#3. SQL 실행하기
		$result = $conn->query($sql); 
		#4. 실행결과 레코드들을 화면에 보이기
		if(!$result)
			die('일기 데이터 검색에 오류가 발생했습니다. Error : '.$conn->error);
		?>
		<?php
	$number = 0;
		include_once('connect.php');
		if(isset($_GET['keyword']) && strpos($_GET['keyword'], "%") === false) {
			$keyword = $_GET['keyword'];
			$keyword = '%'.$keyword.'%';
		}
		else if(!isset($_GET['keyword'])) $keyword = "%";
		else $keyword = $_GET['keyword'];
		
        include_once('paging.php');
        //$sql = "select board.*, uname from board, user where board.email = user.email and title like '$keyword' order by no desc limit $offset, $list_size";
		$sql = "select * from diary where email = '$uid' order by dno desc limit $offset, $list_size";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
    ?>
		<hr>
        <table id='pizza'>
        <tr>
            <th>번호</th>
            <th>작성자</th>
            <th>작성일자</th>
            <th>제목</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
				$number++;
        ?>
        <tr>
            <td><a href="smydiarydet.php?dno=<?=$row['dno']?>"><?=$number?></a></td>
            <td><?=$row['email']?></td>
            <td><?=$row['wdate']?></td>
            <td><?=$row['title']?></td>
        </tr>
        <?php } ?>
        </table>
        
        
    
        <?php
		include_once('paging2.php');
        }
        else {
            echo "등록된 게시글이 없습니다.";
        }
        ?>
	</body>
</html>
