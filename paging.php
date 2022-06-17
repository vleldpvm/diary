<?php
// 페이징을 위한 변수선언과 값 설정
	$list_size = 10; // 1 페이지의 레코드 개수
	$more_page = 3; // 현재 페이지 이전과 이후에 나올 페이지 수
	$page = 0; // 현재 페이지 번호
	$page = (isset($_GET['page']))? intval($_GET['page']) : 1;
	$sql = "select count(*) cnt from diary";  
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$rowcnt = $row['cnt'];  // 게시판에 있는 전체 레코드 개수
	$page_count = (int)($rowcnt / $list_size); // 페이지 개수
	if($rowcnt % $list_size > 0) $page_count++;
	// 현재 페이지 이전에 나올 페이지들의 시작번호
	$start_page = max($page - $more_page, 1); 
	$end_page = min($page + $more_page, $page_count);
	$offset = ($page - 1) * $list_size; // 건너갈 레코드 개수
?>