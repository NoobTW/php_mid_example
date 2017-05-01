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
	<?php
		include "connection.php";
		$sql = "SELECT * FROM dorm";
		$result = mysqli_query($link, $sql);
	?>
	<div class="wrapper_result">
		<table>
			<tr>
				<td>使用者id</td>
				<td>使用者姓名</td>
				<td>使用者性別</td>
				<td>使用者email</td>
				<td>選擇的宿舍</td>
				<td>入住日期</td>
				<td>退住日期</td>
				<td>申請時間</td>
			</tr>
			<?php while($row = mysqli_fetch_assoc($result)){
				$gender = '';
				switch($row['gender']){
					case 'male':
						$gender = '男';
						break;
					case 'female':
						$gender = '女';
						break;
					default:
						$gender = '其他';
				}
				$ddorm = json_decode($row['dorm']);
				$dorm = [];
				foreach($ddorm as $d){
					switch($d){
						case 'dorm1': 
							array_push($dorm, '學一宿舍');
							break;
						case 'dorm2':
							array_push($dorm, '學二宿舍');
							break;
						case 'dorm0':
							array_push($dorm, '綜合宿舍');
							break;
						case 'dormnuk':
							array_push($dorm, '高大藝苑');
							break;
					}
				}
				$dorm = join('、', $dorm);
				echo '<tr>';
				echo '<td>' . $row['uid'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $gender . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $dorm . '</td>';
				echo '<td>' . $row['checkin'] . '</td>';
				echo '<td>' . $row['checkout'] . '</td>';
				echo '<td>' . $row['applydate'] . '</td>';

				echo '</tr>';
			};
			?>
		</table>
	</div>
</body>
</html>
