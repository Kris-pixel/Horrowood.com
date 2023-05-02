<?php
require_once "../../connect/db.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$delid=$_POST['recordId'];

$query = "DELETE FROM lists WHERE id='$delid'";
$rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
var_dump($rez);
?>