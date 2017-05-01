<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php if(isset($_GET['key'])){
		$link = mysqli_connect('localhost', 'phpmyadmin', 'urshit', 'ur5hit');
		$url = $_GET['key'];
		$sql2 = "SELECT * FROM url WHERE shorturl = '$url';";
		$result = mysqli_query($link, $sql2);
		$row = mysqli_fetch_assoc($result);
		if(isset($row)){
			header('Location: ' . $row['longurl']);
		}else{
			header('Location: index.php');
		}

	} else { ?>
	<form method="POST" action="new.php">
		<input type="text" name="url" placeholder="請輸入長網址" style="width:100%">
		<input type="submit" value="產生短網址！">
	</form>
	<?php } ?>
</body>
</html>
