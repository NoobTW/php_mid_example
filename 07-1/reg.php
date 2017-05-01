<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>註冊</title>
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
			echo '<form method="post" action="reg.php">';
				echo '<h4>帳號</h4>';
				echo '<input type="text" name="user">';
				echo '<h4>密碼</h4>';
				echo '<input type="password" name="pass">';
				echo '<h4>email</h4>';
				echo '<input type="text" name="email">';
				echo '<h4>phone</h4>';
				echo '<input type="text" name="phone">';
				echo '<input type="submit" class="button" value="註冊">';
			echo '</form>';
		echo '</div>';
	} else {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$login_time = 0;
		$last_login = date("Y-m-d H:i:s");
		echo $user . '<br>';
		echo $pass . '<br>';
		echo $email . '<br>';
		echo $phone . '<br>';
		// echo @$noob;
		include 'connection.php';
		$sql2 =  "INSERT INTO user (user, pass, email, phone, login_time, last_login) VALUES ('$user', '$pass', '$email', '$phone', '$login_time', '$last_login');";
		echo $sql2;
		mysqli_query($link, $sql2);
		mysqli_close($link);
		header('Location: log.php');
	}?>
</body>
</html>
