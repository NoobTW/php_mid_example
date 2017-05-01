<?php

	$id = $_GET['id'];
	if(isset($_GET['check']) && $_GET['check']=='yes'){
		include "connection.php";
		$sql2 = "DELETE FROM user WHERE uid = '$id'";
		mysqli_query($link, $sql2);
		mysqli_close($link);
		header('Location: reg.php');
	}else{
		echo '<h1>R U sure to delete this account?</h1>';
		echo '<h1><a href="checkdel.php?id=' .$id . '&check=yes">Y</a></h1>';
		echo '<h1><a href="profile.php">N</a></h1>';
	}

