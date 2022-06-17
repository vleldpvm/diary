<!doctype html>
<html>
	<head>
		<title>My Diary</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
            /* Style Page */
            .paging_area { 
                width: 100%;
                height: 50px;
                padding-top: 7px;
                margin-left: auto;
            }
            .paging_area a, .paging_area span {
                /*
                color: black;
                display: inline-block;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;*/
                display: inline-block;
                border-radius: 3px;
                border: solid 1px #c0c0c0;
                background: #e9e9e9;
                box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
                padding: 3px 9px;
                font-weight: bold;
                text-decoration: none;
                color: #717171;
                text-shadow: 0px 1px 0px rgba(255,255,255, 1);
            }
            .paging_area a.active {
                background-color: dodgerblue;
                color: white;
            }
            .paging_area a:hover:not(.active) {background-color: #fefefe;}
            /* Search */
            .topnav .search-container {
              float: right;
            }
		</style>
	</head>
	<body>
		<div class="paging_area">
            <?php
            // 현재 페이지 이전으로 가도록 PREV 링크 생성
            if($page > 1) {
            ?>
            <a href="showboard2.php?page=<?=($page - 1)?>&keyword=<?=$keyword?>">PREV</a>
            <?php } else { ?>
            <span>PREV</span>
            <?php } ?>
            <?php
            // 현재 페이지를 중심으로 이전 이후에 페이지번호 나열하기
            for($p=$start_page; $p<=$end_page; $p++) {
                if($p == $page)
                    echo "<a class='active' href='#'>$p</a>";
                else {
            ?>
            <a href="showboard2.php?page=<?=$p?>&keyword=<?=$keyword?>"><?=$p?></a>
            <?php }} ?>
            <?php
            // 현재 페이지 다음에 NEXT를 표시하기
            if($page < $end_page) { ?>
            <a href="showboard2.php?page=<?=($page + 1)?>&keyword=<?=$keyword?>">NEXT</a>
            <?php } else { ?>
            <span>NEXT</span>
            <?php } ?>
		</div>
	</body>
<html>