<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>網路書店</title>
</head>
<body>
<?php
if(isset($_GET['price'])){
	$price = $_GET['price'];
	$new_price = $price;
	if($price >= 100000){
		$new_price = $price * 0.6;
	}else if($price >= 50000){
		$new_price = $price * 0.8;
	}else if($price >= 10000){
		$new_price = $price * 0.9;
	}
	$date = date('H');
	$style = '';
	if($date >= 6 && $date < 18){
		$style = "color:black;font-weight:bold;";
	}else{
		$style = "color:red;font-style:italic;";
	}
	echo '<div style="'.$style.'">';
	echo '<p>' . date('Ymd H:i:s') . '</p>';
	echo '<div>折扣前：' . $price . '</div>';
	echo '<div>折扣後：' . $new_price . '</div>';
}else{
	echo '請輸入金額';
}
?>
</body>
</html>
