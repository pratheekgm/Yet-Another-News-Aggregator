<?php
session_start();
include_once 'config.php';
if(isset($_SESSION['id'])!="") {
    $id = $_SESSION['id'];
	$count = intval(mysqli_fetch_array(mysqli_query($db, "SELECT post_count FROM admin WHERE id=".$id))['post_count']);
	$count = (string)($count +1);
	echo $count."  id=".$id;
	try{		
			if(mysqli_query($db, "UPDATE admin SET post_count = '".$count."' WHERE id = '".$id."'")){
			$title = $_POST['title'];
			$para = $_POST['para'];
		/*	$f = fopen("posts/usr".$id."_post".$count.".txt",'w') or die("Unable to open file!");
			fwrite($f,"__TITLE__\n");
			fwrite($f,$title."\n");
			fwrite($f,"__PARA__\n");
			fwrite($f,$para);
			fclose($f);
			echo "<h1>fwrite Successful</h1>";	*/
			mysqli_query($db, "INSERT into posts(username,title,content,time) VALUES('".$_SESSION['login_user']."','".$title."','".$para."','".date('Y-m-d H:i:s',time())."') ");
			header("Location: new_post.html");
		}
		else {
			echo mysql_error();
		}
			
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}	
?>
