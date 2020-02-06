<?php

	include "common.php";

	// unset: 지정된 변수 설정 해제
	unset($_SESSION['log']);
	unset($_SESSION['id']);
	unset($_SESSION['userlv']);
	echo "<script>history.go(-2);</script>";


?>