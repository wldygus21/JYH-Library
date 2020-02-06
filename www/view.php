<?php
    include "common.php";
    include "header.php";
    

    $bookno=$_GET['bookno'];
    
	if($bookno == ""){
		$bookno = 0;
		
	}



	$data = mysqli_query($conn,"SELECT * FROM bookinfo WHERE no=$bookno");
	$row1 = mysqli_fetch_assoc($data);	
	

?>

<div class="container">
    <div class="wbg panel panel-default ">
        <div class="wbg panel-heading">
            <div class="ebg"style="padding: 20px;" >
                <?php echo "<h3>{$row1['book_title']}</h3>";?>
                <div class="row">
                    <div class="col-xs-3 "><h4>책 제목 </h4></div>
                    <div class="col-xs-9 "><?php echo "<h4>{$row1['book_title']}</h4>";?></div>
                </div>
                <div class="row">
                    <div class="col-xs-3 "><h4>저자</h4></div>
                    <div class="col-xs-9 "><?php echo "<h4>{$row1['book_author']}</h4>";?></div>
                </div><div class="row">
					<div class="col-xs-3 "><h4>출판사</h4></div>
					<div class="col-xs-9 "><?php echo "<h4>{$row1['book_outcp']}</h4>";?></div>
                </div>
				<div class="row">
					<div class="col-xs-3 "><h4>분류</h4></div>
					<div class="col-xs-9 "><?php echo "<h4>{$row1['book_group']}</h4>";?></div>
				</div>
				<div class="row">
					<div class="col-xs-3 "><h4>ISBN</h4></div>
					<div class="col-xs-9 "><?php echo "<h4>{$row1['book_isbn']}</h4>";?></div>
				</div>
				<div class="row">
					<div class="col-xs-3 "><h4>서고위치</h4></div>
					<div class="col-xs-9 "><?php echo "<h4>{$row1['book_location']}</h4>";?></div>
				</div>
				<div class="row">
					<div class="col-xs-3 "><h4>대출 / 여부</h4></div>
                	<div class="col-xs-9 "><?php echo "<h4>{$row1['book_loanck']}</h4>";?></div>
                </div>
            </div>
            <div style="padding: 20px 20px;">
				<h4>대출정보</h4>
                <table class="table table-bordered " style="box-shadow: 0.5px 0.5px 0px 0px gray; ">
                    <thead class="table" >
                        <tr>
                            <th>No.</th>
                            <th>등록 번호</th> 	
                            <th>분류</th> 	
                            <th>서고위치</th> 	
                            <th>ISBN</th> 	
                            <th>도서 상태</th> 	
                        </tr>
                        <tr>
                            <td>1</td> 	
                            <td><?php echo "{$row1['book_outcp']}";?></td> 	
                            <td><?php echo "{$row1['book_group']}";?></td> 	
                            <td><?php echo "{$row1['book_location']}";?></td> 	
                            <td><?php echo "{$row1['book_isbn']}";?></td> 	
                            <td><?php echo "{$row1['book_loanck']}";?></td> 	
                        </tr>
                    </thead>
                </table>
				<div class="text-right">
					<?php
					if($_SESSION['userlv']>= 9){
						echo "<a href='book_modify.php?bookmodify={$bookno}' class='btn btn-primary' >도서수정</a>";
					}else {
						
					}
					?>
					<?php
					if($_SESSION['userlv']>= 9){
						echo "<a href='delete.php?deleteno={$bookno}' class='btn btn-primary' >도서삭제 </a>";
//						echo "<td><a href='view.php?bookno={$row['no']}'>{$row['book_title']}</a></td>";
					}else {
					}
					?>
				</div>
            </div>
        </div>
    </div>
 </div>


<?php
    include "footer.php"
?>