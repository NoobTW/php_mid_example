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

include "connection.php";
$id = $_POST['did'];

$uid = $_POST['uid'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$dorm = json_encode($_POST['dorm']);
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

$sql2 = "UPDATE dorm SET name='$name', gender='$gender', email='$email', dorm='$dorm', checkin='$checkin', checkout='$checkout' WHERE did = '$id'";

mysqli_query($link, $sql2);
header('Location: Admin.php');
?>
