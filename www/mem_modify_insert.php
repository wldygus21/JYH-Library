<?php 
	include "common.php";

	$userid = $_POST['user_id'];
	if($userud == $_SESSION['id']){
	warning("잘못된 접근입니다.","http://police.go.kr");
	
	}


	$user_id = $_POST['user_id'];

	$user_pw = $_POST['user_pw'];
	if(!empty($user_pw)){
		
		$user_pw = password_hash($user_pw,PASSWORD_DEFAULT,['cost' => 10]);
		mysqli_query($conn,"UPDATE member SET user_pw='$user_pw' WHERE user_id='$user_id';") or die("pw 데이터 오류");
	}else{
		
	}
	$user_name = $_POST['user_name'];
	$user_rrn1 = $_POST['user_rrn1'];
	$user_rrn2 = $_POST['user_rrn2']; 
	$user_pn1 = $_POST['user_pn1'];
	$user_pn2 = $_POST['user_pn2'];
	$user_pn3 = $_POST['user_pn3'];
	$user_address = $_POST['user_address'];	

	mysqli_query($conn,"UPDATE member SET user_name='$user_name',user_rrn1='$user_rrn1',user_rrn2='$user_rrn2',user_pn1='$user_pn1',user_pn2='$user_pn2',user_pn3='$user_pn3',user_address='$user_address' WHERE user_id='$user_id';") or die("전체 오류");
	
	
	warning("회원 정보 수정이 완료 되었습니다.","index.php");






?>