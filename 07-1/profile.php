<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改個人資料</title>
	<style>
		table{
			border: 1px solid #aaa;
			border-collapse: collapse
		}
		td{
			border: 1px solid #aaa;
			padding: 2px;
			font-size: 1.2rem;
		}
	</style>
</head>
<body>
	<?php if(isset($_SESSION['user'])){ ?>
	<table>
		<tr>
			<td>帳號</td>
			<td>密碼</td>
			<td>email</td>
			<td>電話</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $_SESSION['user'];?></td>
			<td><?php echo $_SESSION['pass'];?></td>
			<td><?php echo $_SESSION['email'];?></td>
			<td><?php echo $_SESSION['phone'];?></td>
			<td><a href="edit.php?id=<?php echo $_SESSION['uid'];?>">編輯</a></td>
			<td><a href="checkdel.php?id=<?php echo $_SESSION['uid'];?>">刪除</a></td>
		</tr>
	</table>
	<?php } else {
		header('Location: log.php');
	}
	?>
</body>
</html>
