<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>台灣鐵路局</title>
	<style>
		td{
			border: 1px solid #333;
		}
		table{
			border: 1px solid #333;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<?php if(!isset($_POST['price'])){ ?>
	<div class="wrapper">
		<h4>請輸入票價</h4>
		<form method="post" action="price.php">
			<input type="number" name="price" step="0.1" placeholder="票價">
			<input type="submit" name="送出">
		</form>
	</div>
	<?php } else {
		$km = [
			"基隆" => 0,
			"七堵" => 6.0,
			"台北" => 28.3,
			"新竹" => 106.4,
			"台中" => 193.3,
			"彰化" => 210.9,
			"嘉義" => 291.8,
			"臺南" => 353.2,
			"高雄" => 399.8,
			"屏東" => 420.8
		];
		function kmPrice($station_a, $station_b, $price_per_km){
			global $km;
			if($station_a == $station_b) return 'X';
			$kilometer = $km[$station_a] - $km[$station_b];
			if(abs($kilometer) < 10) $kilometer = $kilometer > 0 ? 10 : -10;
			$kilometer = $kilometer <= 0 ? $kilometer * -0.5 : $kilometer;
			return round($kilometer * $price_per_km);
		}
		?>
			<table>
		<?php
			$price = $_POST['price'];
			echo '<tr>';
			echo '<td>X</td>';
			foreach($km as $index=>$value){
				echo '<td>'.$index.'</td>';
			}
			echo '</tr>';
			foreach($km as $index_i=>$value_i){
				echo '<tr><td>' . $index_i . '</td>';
				foreach($km as $index_j=>$value_j){
					echo '<td>' . kmPrice($index_i, $index_j, $price);
				}
				echo '</tr>';
			}
		?>
			</table>
		<?php
	} ?>
</body>
</html>
