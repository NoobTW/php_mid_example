<?php
session_start();

	if(!isset($_SESSION['type'])){
        header('Location: index.php');
        exit();
    }
    if($_SESSION['type'] != 1){
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>宿舍管理系統</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper">
		<h1>編輯宿舍</h1>
		<?php
		if(!isset($_GET['id'])) header('Location: Admin.php');
		$id = $_GET['id'];
		include "connection.php";
		$sql = "SELECT * FROM dorm WHERE did = '$id'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
		?>
		<form method="POST" action="editexec.php">
			<input type="hidden" name="did" value="<?php echo $id;?>">
			<h4>使用者姓名</h4>
			<input type="text" name="name" required value="<?php echo $row['name'];?>">
			<h4>使用者性別</h4>
			<?php
			function checkedOrNot($value, $k){
				if($value == $k){
					echo 'checked';
				}
			}
			?>
			<input type="radio" name="gender" value="male" <?php checkedOrNot($row['gender'], 'male');?>>男<br>
			<input type="radio" name="gender" value="female" <?php checkedOrNot($row['gender'], 'female');?>>女<br>
			<input type="radio" name="gender" value="other" <?php checkedOrNot($row['gender'], 'other');?>>其他<br>
			<h4>使用者email</h4>
			<input type="email" name="email" value="<?php echo $row['email'];?>">
			<h4>宿舍選擇</h4>
			<?php
				function checkedOrNotDorm($k){
					global $row;
					$ddorm = json_decode($row['dorm']);
					$dorm = [];
					foreach($ddorm as $d){
						if($d == $k) echo 'checked';
					}
				}
			?>
			<input type="checkbox" name="dorm[]" value="dorm1" <?php checkedOrNotDorm('dorm1') ?>> 學一宿舍
			<input type="checkbox" name="dorm[]" value="dorm2" <?php checkedOrNotDorm('dorm2') ?>> 學二宿舍
			<input type="checkbox" name="dorm[]" value="dorm0" <?php checkedOrNotDorm('dorm0') ?>> 綜合宿舍
			<input type="checkbox" name="dorm[]" value="dormnuk" <?php checkedOrNotDorm('dormnuk') ?>> 高大藝苑
			<h4>入住日期</h4>
			<input type="date" name="checkin" value="<?php echo $row['checkin'];?>" required>
			<h4>退住日期</h4>
			<input type="date" name="checkout" value="<?php echo $row['checkout'];?>" required>
			<input type="submit" value="編輯">
		</form>
	</div>
</body>
</html>
