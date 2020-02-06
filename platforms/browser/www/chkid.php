<?php

include "common.php";

$user_id = $_GET['user_id'];

//
//
//echo "<script>";
//echo "alert($user_id);";
//echo "</script>";

if(!empty($user_id)){

	
	$data = mysqli_query($conn,"SELECT no FROM member WHERE user_id='$user_id';");
	$len = mysqli_num_rows($data);
	echo $len;

}else{
	echo "empty";
}

?>