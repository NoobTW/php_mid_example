<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>首頁</title>
</head>
<body>
	<?php 
	if( isset($_SESSION['user'])){
		echo $_SESSION['user'] . '歡迎回來<br>';
		echo '上次登入時間為：' . $_SESSION['last_login'] . '<br>';
		echo '您的登入次數為：' . $_SESSION['login_time'];
		include 'connection.php';

		$user = $_SESSION['user'];

		$last_login = date_create($_SESSION['last_login']);
		$last_login = date_format($last_login, "Y-m-d");
		$today = date("Y-m-d");



		if( $last_login == $today  ){
			$login_time = $_SESSION['login_time'];
		}else{
			$login_time = $_SESSION['login_time'] + 1;
		}

		$last_login = date("Y-m-d H:i:s");
		$sql2 = "UPDATE user SET last_login = '$last_login', login_time = '$login_time' WHERE user = '$user'";
		mysqli_query($link, $sql2);

		echo '<br><a href="profile.php">點我修改資料</a>';
	}else{
		header('Location: log.php');
	}
	?>
</body>
</html>
