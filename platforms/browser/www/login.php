<!--


	$user_id = $_POST['user_id'];
	$user_pw = $_POST['user_pw'];
	$user_name = $_POST['user_name'];
	$user_rrn1 = $_POST['user_rrn1'];
	$user_rrn2 = $_POST['user_rrn2'];
	$user_pn1 = $_POST['user_pn1'];
	$user_pn2 = $_POST['user_pn2'];
	$user_pn3 = $_POST['user_pn3'];
	$user_address = $_POST['user_address'];	
	$new_loan = 5;
	$all_loan =	0;
	$defaulter_check = 0;
	$join_day =	date("Y-m-d");
	$member_lv = 1;	


-->


<?php
	#회원가입 하는 페이지이다. 회원의 아이디 , 비밀번호, 성명등을 입력한다.
	#본 예제에서는 DB명을 [vision], 게시판의 테이블명을 [meber]라고 명령한다.
	#[meber]테이블의 스키마는 아래와 같다. 

	include "common.php";
	include "header.php";
	
?>
	<link href="css/join.css" rel="stylesheet" />


	<div class="container">
		<div class="panel panel-default ">
			<div class="panel-heading " >
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="tabbtn active"><a href="#">로그인</a></li>
                        <li role="presentation" class="tabbtn "><a href="#">회원가입</a></li>
                    </ul>
            </div>
			<div class="tabelem" >
				<div class="panel-body">
					<div class="panel-body">
					<form class="col-sm-6 col-md-offset-3" id="logform" action="login_insert.php" method="post">
						<br />
						<input id="logid" type="text" class="form-control" name="logid" placeholder="ID">
						<br />
						<input id="logpw" type="password" class="form-control" name="logpw" placeholder="비밀번호">
						<br />
						<button id="lsubmit" type="button"class="btn btn-lg btn-primary btn-block">로그인</button>
					</form>
				</div>
				</div>
			</div>
			<div class="tabelem" style="display: none;" >
				<div class="panel-body">
			<!--		join_insert.php로 데이터를 보낼때 비밀번호가 있으므로 post 방식으로 전송한다.																		-->
					<form class="col-sm-6 col-md-offset-3" id="form1" name="join" action="join_insert.php" method="post" >
						<label>
							아이디 *
							<span id='chkresult' class="badge badge-danger"></span>
							<input id="user_id" name="user_id"  type="text" class="form-control" required />
							<br />
						</label>
						<label>
							비밀번호 *
							<input id="user_pw" name="user_pw"  type="password" class="form-control" required />
							<br/>
						</label>
						<label>
							비밀번호확인
							<input id="cpw" class="form-control" type="password" name="cpw" required />
							<br/>
						</label>
						<label>
							이름
							<input id="user_name" class="form-control" type="text" name="user_name" required />
							<br/>
						
						</label>
						<label>
							주민번호
							<div class="row">
								<div class="col-sm-6">
									<input id="user_rrn1" class="form-control" type="text" name="user_rrn1" required />
								</div>
								<div class="col-sm-6">
									<input id="user_rrn2" class="col-sm-4 form-control" name="user_rrn2" type="password" required />
								</div>
							</div>
						</label>
						<label>
							주소
							<input class="form-control" type="text" name="user_address" required />
							<br/>
						</label>
						<label>
							핸드폰번호
							<div class="row">
								<div class="col-sm-4">
									<select name="user_pn1" class="form-control">
										<option value="">Select</option>
										<option value="010">010</option>
										<option value="02">02</option>
										<option value="042">042</option>
									</select>
								</div>
								<div class="col-sm-4">
									<input name="user_pn2" type="text" class="form-control"/>
								</div>
								<div class="col-sm-4">
									<input name="user_pn3" type="text" class="form-control"/>
								</div>
                    	</div>
						</label>
						<label>
							<br/>
							<div class="text-center">
								<button id="submit1" class="btn btn-lg btn-primary btn-block" type="button" >가입하기</button>
							</div>
						</label>
					</form>
				</div>
			</div>
			
		</div>
	</div>
				



	
<!--			2.1.1.2 아이디 중복체크(ajax)   |시작|-->
			
    <script>
    	$("#lsubmit").click(function(){
			var logid = $("#logid").val().length;
			var logpw = $("#logpw").val().length;
			if(logid * logpw == 0 ){
				alert("아이디와 비밀번호를 확인 해주세요!");
			}else {
				$("#logform").submit();
				
			}
			// #logid 와 DB에 있는 기존 아이디랑 비교한다. 
			// 일치하면 서브밋한다;.

		});
		
		    $(document).ready(function(){
			var chk = false;
			
            $("#submit1").click(function(){
                var a1 = $("#user_id").val().length;
                var a2 = $("#user_pw").val().length;
                var a3 = $("#cpw").val().length;
                var a4 = $("#user_name").val().length;
                var a5 = $("#user_rrn1").val().length;
                var a6 = $("#user_rrn2").val().length;
				
                var result = a1*a2*a3*a4*a5*a6;
                if(result == 0) {
                    alert("필수 입력칸을 채워주세요.");
                }else{
                    if($("#user_pw").val() == $("#cpw").val()){
						if(chk){
							$("#form1").submit();
						}else{
							alert("아이디를 체크해 주세요.");
						}
                    }else{
						alert("비밀번호를 확인해주세요");
					}
                }
            });
			
//        	<!-- 데이터 중복체크 스크립트	-->
		// 글자를 눌렀다 땔때마다
			$("#user_id").keyup(function(){
				var key = $(this).val();
				$.ajax({
					method:"get",
					url:"chkid.php",
					data:"user_id="+key,
					dataType:"html",
					success:function(result){
//						alert(result);
						if(result == 0){
							$("#chkresult").text("사용할수 있는 아이디 ");
							$("#chkresult").removeClass("badge-danger");
							$("#chkresult").addClass("badge badge-success");
							chk = true;
						}else if(result >= 1){
							$("#chkresult").text("사용할수 없는 아이디 ");
							$("#chkresult").removeClass("badge-success");
							$("#chkresult").addClass("badge badge-danger");
							chk = false;
						}else if(result == "empty"){
							$("#chkresult").text("아이디를 입력하세요");
							$("#chkresult").removeClass("badge-success");
							$("#chkresult").addClass("badge badge-danger");
							chk = false;
						}
					}
				});
			});
		});
			
    </script>


<?php

	include "footer.php";

?>