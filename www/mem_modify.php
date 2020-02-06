<?php
	
	include "common.php";
	include "header.php";

	if(!isset($_SESSION['log'])){
		warning("로그인이 필요합니다.","login.php");
	}
	$memdata = mysqli_query($conn,"SELECT * FROM member WHERE user_id='{$_SESSION['id']}';");
	$memrow = mysqli_fetch_assoc($memdata);



?>

<link href="css/join.css" rel="stylesheet" />
	<div id='main' class="col-xs-10 col-xs-offset-1">
		<div class="wbg panel panel-default " id="border-color11">
			<div class="panel-heading">
				<h5>회원정보</h5>
			</div>
			<div class="panel-body">
			<!--		join_insert.php로 데이터를 보낼때 비밀번호가 있으므로 post 방식으로 전송한다.																		-->
				<form class="col-xs-10 col-xs-offset-1"id="form1" name="join" action="mem_modify_insert.php" method="post" >
					<label>
					    <h5>아이디 *</h5>
						<input  value="<?php echo $memrow['user_id'];?>" name="user_id"  type="text" class="form-control" readonly />
					</label>
					<label>
						<h5>비밀번호 *</h5>
						<input id="user_pw" name="user_pw"  type="password" class="form-control" required />
					</label>
					<label>
						<h5>비밀번호확인</h5>
						<input id="cpw" class="form-control" type="password" name="cpw" required />
					</label>
					<label>
						<h5>이름</h5>
						<input value="<?php echo $memrow['user_name'];?>" class="form-control" type="text" name="user_name" readonly />
					</label>
					<label>
						<h5>주민번호</h5>
						<div class="row">
							<div class="col-xs-6">
								<input id="user_rrn1" class="form-control" type="text" name="user_rrn1" required />
							</div>
							<div class="col-xs-6">
								<input id="user_rrn2" class="col-sm-4 form-control" name="user_rrn2" type="password" required />
							</div>
						</div>
					</label>
					<label>
						<h5>주소</h5>
						<input class="form-control" type="text" name="user_address" required />
					</label>
					<label>
						<h5>핸드폰번호</h5>
						<div class="row">
							<div class="col-xs-4">
								<select name="user_pn1" class="form-control">
									<option value="">Select</option>
									<option value="010">010</option>
									<option value="02">02</option>
									<option value="042">042</option>
								</select>
							</div>
							<div class="col-xs-4">
								<input name="user_pn2" type="text" class="form-control"/>
							</div>
							<div class="col-xs-4">
								<input name="user_pn3" type="text" class="form-control"/>
							</div>
                    	</div>
					</label>
					<label>
						<div class="text-center">
                            <br/>
							<button id="submit1" class="btn btn-lg btn-primary btn-block" type="button" >수정하기</button>
						</div>
					</label>
				</form>
			</div>
		</div>
	</div>
	<script>

			
			$(document).ready(function(){
				$("#user_pn1>option[value=<?php echo $memrow['user_pn1'];?>]").attr("selected","true");            
				$("#submit1").click(function(){
					if($("#user_pw").val() == $("#cpw").val() ){
						$("#form1").submit();
					}else{
						alert("비밀번호를 확인해주세요.");
					}
				})
				
				
			});
		
	</script>








<?php

	include "footer.php";

?>