<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登入</title>
	<style>
		.wrapper{
			text-align: center;
			margin; 0 auto;
		}
		.button{
			display: block;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<?php
		if(!isset($_POST['user'])){
		echo '<div class="wrapper">';
			echo '<form method="post" action="log.php">';
				echo '<h4>帳號</h4>';
				echo '<input type="text" name="user">';
				echo '<h4>密碼</h4>';
				echo '<input type="password" name="pass">';
				echo '<input type="submit" class="button" value="登入">';
			echo '</form>';
		echo '</div>';
	} else {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		echo $user . '<br>';
		echo $pass . '<br>';
		// echo @$noob;
		include 'connection.php';
		$sql2 = "SELECT * FROM user WHERE user='$user' AND pass='$pass'";
		// echo $sql2;
		$result = mysqli_query($link, $sql2);
		$row = mysqli_fetch_assoc($result);
		if(isset($row)){
			echo '登入成功';
			$_SESSION['uid'] = $row['uid'];
			$_SESSION['user'] = $row['user'];
			$_SESSION['pass'] = $row['pass'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['login_time'] = $row['login_time'];
			$_SESSION['last_login'] = $row['last_login'];
			header('Location: index.php');
		}else{
			echo '登入失敗';
		}
		mysqli_close($link);
	}?>
</body>
</html>
