<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改個人資料</title>
</head>
<body>
	<?php if(isset($_SESSION['user'])){ ?>
		<?php if(!isset($_POST['uid'])){ ?>
			<form method="POST" action="edit.php">
				<input type="hidden" value="<?php echo $_SESSION['uid'];?>" name="uid">
				<h4>密碼</h4>
				<input type="password" value="<?php echo $_SESSION['pass'];?>" name="pass">
				<h4>email</h4>
				<input type="text" value="<?php echo $_SESSION['email'];?>" name="email">
				<h4>電話</h4>
				<input type="text" value="<?php echo $_SESSION['phone'];?>" name="phone">
				<input type="submit" value="送出" style="display: block;">
			</form>
		<?php } else {
			include "connection.php";
			$uid = $_POST['uid'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$sql2 = "UPDATE user SET pass = '$pass', email = '$email', phone = '$phone' WHERE uid = '$uid'";
			mysqli_query($link, $sql2);
			$_SESSION['pass'] = $_POST['pass'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['phone'] = $_POST['phone'];
			header('Location: profile.php');
		} ?>
	<?php } else {
		header('Location: log.php');
	}
	?>
</body>
</html>
