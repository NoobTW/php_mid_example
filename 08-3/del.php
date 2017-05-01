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
$id = $_GET['id'];
$sql2 = "DELETE FROM dorm WHERE did = '$id';";
mysqli_query($link, $sql2);
header('Location: Admin.php');
?>
