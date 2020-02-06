<?php

	# 아이디 중복체크는 join.php 내의 iframe 내에서 실행되는 페이지로 사용자 화면에서는 보이지 않도록 숨겨져 있다.
	# join.php의 스크립트에 의하여 사용자가 입력한 아이디를 쿼리로 받아들여
    # 이를 member 테이블에서 중복되는 아이디가 있는지 검사하여 그 여부를 알려준다.

	include "common.php";

	// GET방식 쿼리로 받아온 userid를 변수로 저장한다
	$id = $_GET['userid'];


	if($id == ""){
				
				# Parent 사용한 이유는 join에 사용할때에 parent 를 사용
		echo "<script>
				alert('사용할 수 없는 아이디입니다.');
				parent.document.join.chkbool.value = 0;
				parent.document.join.chkbtn.value = '중복체크';
			 </script>";
		exit;
		
	}
	
	$data = mysqli_query($conn,"SELECT * FROM member WHERE userid='$id'");
	$num = mysqli_num_rows($data);

	if($num > 0) {
		echo "<script>
			alert('사용할 수없는 아이디 입니다.');
			parent.document.join.chkbool.value = 0;
			parent.document.join.chkbtn.value = '중복체크';
		</script>"
		
	}else {
		"<script>
			alert('사용 가능한 아이디 입니다.');
			parent.document.join.chkbool.value = 1;
			parent.document.join.chkbtn.value = '시용가능';
		</script>" 
		
		
	}


?>