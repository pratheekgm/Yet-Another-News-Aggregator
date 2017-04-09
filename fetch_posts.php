<?php
	session_start();
include_once 'config.php';
	$id = $_GET['id'];
	$arr = array();
	$file_list = mysqli_query($db, "SELECT * FROM posts WHERE id <= '".$id."'");
	//echo "<p>$file_list";
	//echo "</p>";
	while($row = mysqli_fetch_array($file_list,MYSQL_ASSOC)){
			$row_array['id'] = $row['id'];
			$row_array['username'] = $row['username'];
			$row_array['title'] = $row['title'];
			$row_array['content'] = $row['content'] ;
			array_push($arr,$row_array);
	}

	echo json_encode($arr);
?>