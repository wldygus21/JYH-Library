<?php
	include "common.php";

	// botable / no를 알아내야하는데
	// 그게 get으로 올지 post올지 모르겠어요.
	// 그런데 혹시 post로 온다면 pass도 같이 온대요.
	// post로 pass값도 같이 왔다면 그건 비회원이 쓴 글이므로
	// 비밀번호 비교할 각오를 해야겠죠
	
	$deleteno = $_GET['deleteno'];


// 게시물 자체를 지우기 
	mysqli_query($conn, "DELETE FROM bookinfo WHERE no=$deleteno");

	warning("게시물이 삭제되었습니다.","booklist.php");

	

?>