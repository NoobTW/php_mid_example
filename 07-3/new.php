<?php

$url = $_POST['url'];

$link = mysqli_connect('localhost', 'phpmyadmin', 'urshit', 'ur5hit');

	$length = 10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $randomString;

$sql2 = "INSERT INTO url (longurl, shorturl) VALUES ('$url', '$randomString');";
mysqli_query($link, $sql2);
echo '<a href="index.php?key=' . $randomString . '">短網址</a>';
echo '<a href="index.php">回首頁</a>';

#header('Location: index.php');
?>
