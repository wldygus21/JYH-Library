<?php
	include "common.php";

	$logid = $_POST['logid'];
	$logpw = $_POST['logpw'];


	$findid = mysqli_query($conn,"SELECT user_id,user_pw,user_lv FROM member WHERE user_id='$logid';") or die(mysqli_error($conn));
	$findidlen = mysqli_num_rows($findid); # 행을 센다

	if($findidlen == 0){
		echo "<script>";
        echo "alert('아이디와 비밀번호를 확인해주세요.');";
        echo "location.href='login.php';";
        echo "</script>";
        exit;
	}else {
		$data1 = mysqli_fetch_array($findid); # 행을 깐다
		$hashpw = $data1['user_pw'];
		
//		echo "<script>alert('$logpw'+'/'+'$hashpw');</script>";
//		
//		$sss = password_verify($logpw, $hashpw);
//		echo "<script>alert('$sss');</script>";
		
		if(password_verify($logpw, $hashpw)){
				$_SESSION['log']= true;
				$_SESSION['id']= $data1['user_id'];
				$_SESSION['userlv']= $data1['user_lv'];
				warning('로그인 완료',-2);
			}else {
				warning('아이디와 비밀번호를 확인해주세요2.',-1);
			}
		}

?>