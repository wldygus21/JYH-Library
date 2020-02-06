<?php
	include "common.php";
	include "header.php";

	if($_SESSION['userlv'] < 8){
		warning("잘못된 접근입니다.","index.php");
	}
	// 보고 싶은 (보고잇는) 페이지 번호
	$page = $_GET['page'];
	if($page == ""){
		$page = 0;
	}
	



	//데이터베이스에서 쿼리 수행

	$data = mysqli_query($conn, "SELECT no FROM member ORDER BY no DESC;");
	//total posts 개수 = 전체 게시물 수
	$len = mysqli_num_rows($data);
	// 전체 페이지 수
	// 올림이 필요하다  123/10 = 12.3 - > 올림 
	// = ceil(123 / 10 ) =13;
	$pagelen = ceil($len / $postlen);   #len= 13	#postlen =6;
	// 전체 블록 수 
	//  = ceil(13/5) -> 3blocks 
	$blocklen = ceil($pagelen / $pbtnlen); #pagelen = 2 / 5;

	// 한 페이지에서 첫번쨰 게시물 번호
	$firstpostno = $postlen * $page;  #postlen =5 * 1;  #firstpostno = 5
	// 현재 보고 있는 페이지가 몇번째 블록에 있는지 블록번호 
	$blockno = floor($page / $pbtnlen);			#1/ 5;
	// 현재 보고 있는 블록에서 첫번쨰 페이지 
?>

<body>
    <div class="container">
		<div class="wbg panel panel-default" >
			<div class="panel-heading">
				<h5>관리자</h5>
            </div>
			<div class="panel-body">
                <form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<select class="form-control">
							<option>1</option>
							<option>2</option>
						</select>
						<input type="text" class="form-control" placeholder="Search">
					
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<table class="table table-bordered">
					<thead class="table">
						<tr>
							<th>번호</th>
							<th>아이디</th>
							<th>이름</th>
							<th>핸드폰번호</th>
							<th>주소</th>
							<th>현재대여수</th>
							<th>누적대여수</th>
							<th>연체자 여부</th>
							<th>가입일</th>
							<th>회원 레벨</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						$data2 = mysqli_query($conn, "SELECT * FROM member ORDER BY no DESC LIMIT $firstpostno,$postlen;"); # firstpostno 현재 보고있는 페이지  #postlen 6 한페이지 당 보여줄 게시물
						for($i=0; $i<$postlen; $i++){ #postlen 한페이당 보여줄 게시물 레코드
							$row = mysqli_fetch_array($data2);  #fetch_array  배열을 레코드로 변환 
							if($row['no' != ""]){
								echo "<tr>";
									echo "<td>{$row['no']}</td>";
									echo "<td>{$row['user_id']}</td>";
									echo "<td>{$row['user_name']}</td>";
									echo "<td>{$row['user_pn1']}-{$row['user_pn2']}-{$row['user_pn3']}</td>";
									echo "<td>{$row['user_address']}</td> ";
									echo "<td>{$row['new_loan']}</td>";
									echo "<td>{$row['all_loan']}</td>";
									echo "<td>{$row['defaulter_check']}</td>";
									echo "<td>{$row['join_day']}</td>";
                                    echo "<td>";
									   echo "<select class='lavsel select-control' data='{$row['userlv']}'>{$row['user_lv']}'>";
                                    
                                        for($k=0; $k<9; $k++){
                                            $num = $k + 1;
                                            if($row['user_lv'] == $num){
                                                echo "<option selected disabled value='$num'>$num</option>";
                                            }else{
                                                echo "<option value='$num'>$num</option>";
						                  }
                                        }
                                        echo "</select>";
								    echo "</ td>";
                                echo "</tr>";
                                
							}
						}
						
						?>
                        
					</tbody>
				</table>
			</div>
				<div class="panel-body ">
					<table class="table">
						<tr>
							<td colspan="9">
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">
										<?php
										//1. 이전블록이 존재하는가?
										//1-1. 이번블록은 몇번인가?
										//1-2. 이전블록 = 이번블록 -1;
										//1-3. 만약 이전블록 번호가 마이너스가 되면 이전블록은 없는것 
										//2. 이전 블록의 마지막 페이지 번호가 무엇인가?
										//  $firstbtnno -1 
										// 3. 이전 블록의 마지막 페이지로 가도록 링크 주소 만들어주기 
										$prevdisabled = "";
										$prevurl = "";
										
										
										if($blockno - 1 < 0)    {
											$prevdisabled = "disabled";
											
										}else{
											$prevno = $firstbtnno -1;
											$prevurl = "?page=".$prevno;
											
										}
										
										
										$nextdisabled = "";
										$nexturl = "";
										
										
										if($blockno >= $blocklen -1)    {
											$nextdisabled = "disabled";
											
										}else{
											$nextno = $firstbtnno + $pbtnlen;
											$nexturl = "?page=".$nextno;
											
										}
										
										
										?>
										
										
										<li class="page-item <?php echo $prevdisabled; ?>">
											<a class="page-link" href="<?php echo $prevurl; ?>">&laquo;</a>
										</li>
										
										
										<?php
										// 첫번째 시작하는 버튼 번호 부터 시작해서 1씩 늘어나면서 버튼을 만들되 
										// pbtnlen(5) 개만 만들다.
										// 그런데 버튼 안에 써야할 그 숫자가 페이지 개수 보다 크면 do notthing
										// 그런데 마침 버튼에 써야하는 숫자가 지금 보고있는 페이지번호 +1와 같다면 
										// 그 버튼에는 active라는 클래스를 추가한다. 
										
										
										for($j=0; $j<$pbtnlen; $j++){
											$btnno = $firstbtnno + $j + 1;
											
											if($btnno <= $pagelen ){
												$active="";
												if($page + 1 == $btnno){
													$active = "active"; 
												}
												$pageurl = "?page=".($btnno - 1)."&tab=4" ;
												echo "<li class='page-item $active'><a class='page-link' href='$pageurl'>$btnno</a></li>";
												
											}
											
										}  
										?>
										<li class="page-item <?php echo $nextdisabled; ?>">
											<a class="page-link" href="<?php echo $nexturl; ?>">&raquo;</a>
										</li>
									</ul>
								</nav>
							</td>
						</tr>					
                	</table>
            	</div>
			
			
			</div>
		</div>
</body>





<?php
	
	$tab = $_GET['tab'] - 1;
	if($tab != ""){
		echo "<script> setTimeout(function(){ $('.tabbtn').eq($tab).trigger('click'); },50); </script>";
	}
	include "footer.php";
	
?>