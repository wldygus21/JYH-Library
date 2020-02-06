<?php
    include "common.php";
    include "header.php";
//
//	if(!isset($_SESSION['log']){
//		warning("로그인이 필요합니다.","login.php");
//	}
//	   
	$bookmodify=$_GET['bookmodify'];

	$data = mysqli_query($conn,"SELECT * FROM bookinfo WHERE no=$bookmodify");
	$row1 = mysqli_fetch_assoc($data);	
	

?>
	
<div class="container col-xs-10 col-xs-offset-1 ">
		<div class="wbg panel panel-default ">
			<div class="panel-heading">
				<h5>도서수정</h5>
            </div>
            <div class="tabelem" >
				<div class="panel-body ">
                    <form id="form1" action="book_insert.php" method="post" class=" col-xs-10 col-xs-offset-1">
				
						<h5>책제목</h5>
                        <input id="book_title" value="<?php echo "{$row1['book_title']}";?>" name="book_title"  type="text" class="form-control" required />
                        <h5>저자</h5>
                        <input id="book_author" value="<?php echo "{$row1['book_author']}";?>" name="book_author"  type="text" class="form-control" required />
                        <h5>출판사</h5>
                        <input id="book_outcp" value="<?php echo "{$row1['book_outcp']}";?>" name="book_outcp"  type="text" class="form-control" required />
                        <h5>출판일</h5>
                        <input id="book_outday" value="<?php echo "{$row1['book_outday']}";?>" name="book_outday"  type="text" class="form-control" required />
                        <h5>분류</h5>
                        <input id="book_group" value="<?php echo "{$row1['book_group']}";?>" name="book_group"  type="text" class="form-control" required />
                        <h5>ISBN</h5>
                        <input id="book_isbn" value="<?php echo "{$row1['book_isbn']}";?>" name="book_isbn"  type="text" class="form-control" required />
                        <h5>서고위치</h5>
                        <input id="book_location"  value="<?php echo "{$row1['book_location']}";?>" name="book_location"  type="text" class="form-control" required />
                        <div class="text-center">
                        <br/>
                            <button id="submit3" class="btn btn-lg btn-primary btn-block" type="button" >도서 입력</button>
                        </div>
                    </form>
                </div>
            </div >
		</div>
	</div>
	<script>

		$(document).ready(function(){
            $("#submit3").click(function(){
                var a1 = $("#book_title").val().length;
                var a2 = $("#book_author").val().length;
                var a3 = $("#book_outcp").val().length;
                var a4 = $("#book_outday").val().length;
                var a5 = $("#book_group").val().length;
                var a6 = $("#book_isbn").val().length;
                var a7 = $("#book_location").val().length;
			
                var result = a1*a2*a3*a4*a5*a6*a7;
                if(result == 0) {
                    alert("필수 입력칸을 채워주세요.");
                }else{
					$("#form1").submit();
				}
            });
		});
			
    </script>



<?php

	include "footer.php";
	
?>