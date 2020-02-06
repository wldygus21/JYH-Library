<?php

	include "common.php";


$book_title = $_POST['book_title'];
$book_author = $_POST['book_author'];
$book_outcp = $_POST['book_outcp'];
$book_outday = $_POST['book_outday'];
$book_group = $_POST['book_group'];
$book_isbn = $_POST['book_isbn'];
$book_location = $_POST['book_location'];

$book_limitck = 0;
$book_loanck = 0;
$book_allloan = 0;
$book_inday = date("Y-m-d");

mysqli_query($conn, "INSERT INTO bookinfo (book_title, book_author, book_outcp, book_outday, book_group, book_isbn, book_location , book_limitck, book_loanck, book_allloan, book_inday)
VALUES ('$book_title','$book_author',$book_outcp,'$book_outday',$book_group,'$book_isbn',$book_location,$book_limitck,$book_loanck,$book_allloan,'$book_inday');") or die('실패');



echo "<script>";
echo "alert('도서등록이 완료되었습니다.');";
echo "location.href = 'booklist.php';";
echo "</script>";




?>





