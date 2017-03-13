<?php
session_start();
include_once 'dbconnect.php';
if(isset($_SESSION['usr_id'])!="") {
    $id = $_SESSION['usr_id'];
	$count = intval(mysqli_fetch_array(mysqli_query($con, "SELECT post_count FROM users WHERE id=".$id))[0]);
	$count = $count +1;
	echo (string)$count."  id=".$id;
	try{
		$title = $_POST['title'];
		$para = $_POST['para'];
		$f = fopen("usr".$id."_post".$count.".txt",'w') or die("Unable to open file!");
		fwrite($f,"__TITLE__\n");
		fwrite($f,$title."\n");
		fwrite($f,"__PARA__\n");
		fwrite($f,$para);
		fclose($f);
		echo "<h1>fwrite Successful</h1>";
		mysqli_query($con, "UPDATE users SET post_count='".$count."' WHERE id='".$id."'");
		echo mysql_error();
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}	
?>
