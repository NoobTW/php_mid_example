<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>宿舍管理系統</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if(!isset($_POST['user'])){ ?>
	<div class="wrapper">
		<h1>宿舍管理系統</h1>
		<form method="POST" action="index.php">
			<h4>帳號</h4>
			<input type="text" name="user" required">
			<h4>密碼</h4>
			<input type="password" name="pass" required">
			<input type="submit" value="登入">
		</form>
	</div>
	<?php } else { 
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		include "connection.php";
		$sql2 = "SELECT * FROM user WHERE userid = '$user' AND password = '$pass';";
		$result = mysqli_query($link, $sql2);
		$row = mysqli_fetch_assoc($result);
		if(isset($row)){
			$_SESSION['user'] = $row['userid'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['password'] = $row['password'];
			if($_SESSION['type'] == 1){
				header('Location: Admin.php');
			}else{
				header('Location: Apply.php');
			}
		}else{
			$_POST = array();
			header('Location: index.php');
		}
	} ?>
</body>
</html>
