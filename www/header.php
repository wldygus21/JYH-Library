<!-- 상단 페이지 -->
<!--
	HTML의 헤드 헤더 및 로고 메뉴바 등 작성

-->




<!doctype html>
<html lang="ko">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
	<title> 리스트형 게시판</title>
	<link href="css/common.css" rel="stylesheet" />
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
<!--	jquery cdn -->
	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	
</head>
<body style="background-color: #eee;" >
	
	<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						 <!-- 오른쪽 메뉴바 시작-->
						<button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#nav_menu" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span>
						</button>
						<!-- 오른쪽 메뉴바 종료 -->
						<a class="navbar-brand" href="index.php">
						   도서 관리시스템
						</a>
					</div>
					<div class="collapse navbar-collapse" id="nav_menu">
						<ul class="nav navbar-nav">
	<!--						active : -->
							<li >
								<?php
									if($_SESSION['log']){
//										echo "<a id='logout' class='btn btn-primaty' href='#'>Logout({$_SESSION['id']})</a>";
										echo  "<a id='logout' href='#'>로그아웃({$_SESSION['id']})</a>";
									}else{
										echo "<a href='login.php'>로그인(회원가입)</a>";
									}
								?>
								
							</li>
							<li >
								<?php
										echo "<a href='booklist.php' >책 목록</a>";
								?>
								
							</li>
							<li >
								<?php
									if($_SESSION['log']){
										echo "<a href='mem_modify.php' >회원정보수정</a>";
										
									}
								?>
							</li>
							<li>
								<?php
									if($_SESSION['userlv'] >= 9){
										echo "<a href='book.php'>도서관리</a>";
									}
								?>
							</li>
							<li>
								<?php
									if($_SESSION['userlv'] >= 8){
										echo "<a href='memberlist.php' >관리자</a>";
									}
								?>
							</li>
							<script>
								$(".nav a").click(function(){
//									$(this).parent().removeClass();
									$(this).parent().toggleClass('active');
									
								})
								$("#logout").click(function(){
									if(confirm("정말로 로그아웃 하시렵니까?")){
										location.href='logout.php';
									}else{

									}
								});
							</script>
						</ul>
					</div>
				</div>
			</nav>
		<?php
	#		if($_SESSION['userlv'] != 0){				# 사용자 레벨이 0이 아니라면 (로그인 사용자라면)
	#			echo"<a href='logut.php'>로그아웃</a>";  # 로그아웃 버튼을 보여주고
	#			
	#		}else {
	#			echo"<a href='login.php'>로그인</a>"; 	#사용자 레벨이 0이라면(비로그인 사용자라면)
	#			echo"<a href='join.php'>회원가입</a>"; #로그인. 회원가입 버튼을 보여준다.
	#		}
		?>
	<section>
