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
	<?php if(!isset($_SESSION['type'])) header('Location: index.php');?>
	<?php if(!isset($_POST['name'])){ ?>
	<div class="wrapper">
		<h1>申請宿舍</h1>
		<form method="POST" action="Apply.php">
			<input type="hidden" name="uid" value="<?php echo $_SESSION['user'];?>">
			<h4>使用者姓名</h4>
			<input type="text" name="name" required>
			<h4>使用者性別</h4>
			<input type="radio" name="gender" value="male">男<br>
			<input type="radio" name="gender" value="female">女<br>
			<input type="radio" name="gender" value="other">其他<br>
			<h4>使用者email</h4>
			<input type="email" name="email">
			<h4>宿舍選擇</h4>
			<input type="checkbox" name="dorm[]" value="dorm1"> 學一宿舍
			<input type="checkbox" name="dorm[]" value="dorm2"> 學二宿舍
			<input type="checkbox" name="dorm[]" value="dorm0"> 綜合宿舍
			<input type="checkbox" name="dorm[]" value="dormnuk"> 高大藝苑
			<h4>入住日期</h4>
			<input type="date" name="checkin" required>
			<h4>退住日期</h4>
			<input type="date" name="checkout" required>
			<input type="hidden" name="applydate" value="<?php echo date("Y-m-d H:i:s");?>">
			<input type="submit" value="申請">
		</form>
	</div>
	<?php } else {
		$uid = $_POST['uid'];
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$dorm = json_encode($_POST['dorm']);
		$checkin = $_POST['checkin'];
		$checkout = $_POST['checkout'];
		$applydate = $_POST['applydate'];
		include "connection.php";
		$sql2 = "INSERT INTO dorm SET uid='$uid', name='$name', gender='$gender', email='$email', dorm = '$dorm', checkin = '$checkin', checkout = '$checkout',	applydate = '$applydate';";
		mysqli_query($link, $sql2);
		header('Location: Applyresult.php');
	}?>
</body>
</html>
