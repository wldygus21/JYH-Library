<!--

회원  Member   :  no

회원아이디 Member ID : user_id

회원비밀번호 Member Password : user_pw

성명 name : user_name

주민번호 Resident registration number [레지던트 레지스트레이션 넘버] : user_rrn  

핸드폰 번호 Phone number : user_pn

주소 address : user_address

현재대여수 Current number of loans : new_loan

누적대여수 Accumulated loan number : all_loan

연제차 여부 Defaulter status [디폴터 스태터스] : defaulter_check

가입일 Date of accession  : Join_day

회원넘버 Member level : member_lv

-->
<?php


	include "common.php";

	$user_id = $_POST['user_id'];
	$user_pw = $_POST['user_pw'];
	$user_pw = password_hash($user_pw,PASSWORD_DEFAULT,['cost' => 10]);
	$user_name = $_POST['user_name'];
	$user_rrn1 = $_POST['user_rrn1'];
	$user_rrn2 = $_POST['user_rrn2']; 
	$user_pn1 = $_POST['user_pn1'];
	$user_pn2 = $_POST['user_pn2'];
	$user_pn3 = $_POST['user_pn3'];
	$user_address = $_POST['user_address'];	
	$new_loan = 0;
	$all_loan =	0;
	$defaulter_check = 0;
	$join_day =	date("Y-m-d");
	$user_lv = 1;	
	

mysqli_query($conn, "INSERT INTO member (user_id, user_pw, user_name,user_rrn1, user_rrn2, user_pn1, user_pn2,user_pn3, user_address ,new_loan,all_loan, defaulter_check, join_day, user_lv ) VALUES ('$user_id', '$user_pw', '$user_name','$user_rrn1', '$user_rrn2', '$user_pn1', '$user_pn2','$user_pn3', '$user_address' ,$new_loan,$all_loan, $defaulter_check,'$join_day',$user_lv);") or die("데이터입력 오류");  


echo "<script>";
echo "alert('회원가입이 완료되었습니다. 로그인해 주세요.');";
echo "location.href = 'login.php';";
echo "</script>";












?>


