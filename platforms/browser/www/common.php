<?php
#													--------------------- 1.1.1 header() utf-8설정 시작 
header('Content-Type:text/html; charset=UTF-8;');
#													--------------------- 1.1.1 header() utf-8설정 종료 



#													--------------------- 1.1.2 sql접속 / db선택 시작
# mysqli_connect 함수는 php에서 MySQL 을 연결해주는 함수
$conn = mysqli_connect('localhost','jikkk8','wldkfka!23') or die ("서버 접속 에러");
# mysqli_select_db 함수는 mysqli_connect 를 통해 연결된 객체가 선택하고 있는 DB를 다른 DB로 바꾸기 위해 사용되어집니다.
$result = mysqli_select_db($conn,'jikkk8') or die ("DB 선택 오류");
#													--------------------- 1.1.2 sql접속 / db선택 종료 




#													--------------------- 1.1.3 db에서 uft-8 시작
mysqli_query($conn,'SET SESSION CHARACTER_SET_CIBBECTION=utf8');
mysqli_query($conn,'SET SESSION CHARACTER_SET_RESULTS=utf8');
mysqli_query($conn,'SET SESSION CHARACTER_SET_CLIENT=utf8');
#													--------------------- 1.1.3 db에서 uft-8 종료


#													--------------------- 1.1.4 session_start() 시작
session_start(); # 세션 시작 (세션을 사용하기 위한 세션기능 켜기)
#													--------------------- 1.1.4 session_start() 종료 


#													--------------------- 1.1.5 로그인여부 확인 초기화 시작

if(!isset($_SESSION['log'])){
	$_SESSION['log'] = false;
	$_SESSION['user_id'] == "";
	$_SESSION['user_lv'] = 0;    # 다른곳에서 SESSION 사용하는법 echo $_SESSION['userlv'];
	# isset 세션이 있다면  true를 보내 다음으로 넘어가소 	없다면 0으로 만들고 시작한다. 
	# isset :isset으로 변수가 설정되었는지 확인할 수 있습니다.
	# $_SESSION 서버와 클라이언트가 접속된 시점부터 서버에 정보를 기록한다.
	# 페이지가 달라져도 세션시록은 계속남는다.
	
}
#													--------------------- 1.1.5 로그인여부 확인 초기화 종료

#													--------------------- 1.1.6 게시판 설정값 시작 
# 	(리스트당 보여줄 글개수, 한블록당보여줄 페이지 개수 , 게시판별 권한 , 파일업로드주소 등)

include "config.php"; // 게시판 설정 값

#													--------------------- 1.1.6 게시판 설정값 종료



#													--------------------- 1.1.7 사용자 함수 시작



// sql 인젝션 방어하는법

function sqlfilter($txt){
	$txt = str_replace("%' or%","",$txt);
	$txt = str_replace("%' OR%","",$txt);
	$txt = str_replace("%' oR%","",$txt);
	$txt = str_replace("%' Or%","",$txt);
	$txt = str_replace("%\" or%","",$txt);
	$txt = str_replace("%\" OR%","",$txt);
	$txt = str_replace("%\" oR%","",$txt);
	$txt = str_replace("%\" Or%","",$txt);
	$txt = str_replace("%\" Or%","",$txt);
	$txt = str_replace("% or%","",$txt);
	$txt = str_replace("% OR%","",$txt);
	$txt = str_replace("% Or%","",$txt);
	$txt = str_replace("% oR%","",$txt);
	$txt = str_replace("% and%","",$txt);
	$txt = str_replace("% AND%","",$txt);
	$txt = str_replace("% And%","",$txt);
	return $txt;
}






#													--------------------- 1.1.7 사용자 함수 종료



function warning($message, $move){
	echo "<script>";
	echo "alert('$message');";
	if(is_numeric($move)){
		echo "history.go($move);";
	}else {
		echo "location.href='$move'";
	}
	echo "</script>";
	exit;
}
	
	
function txtini($text){
	$text = addslashes($text);
	$text = htmlentities($text);
	return $text;
}











?>
