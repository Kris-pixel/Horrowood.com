<?php
require_once "../connect/db.php";
require_once "itemFunc.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$userId = $_SESSION['id'];
$itemId = $_SESSION['item_id'];
$mark = $_GET['mark'];

if(GetUserRaitingStars($link, $itemId) != NULL){
    $query = "UPDATE lists SET mark = '$mark' WHERE id_item='$itemId' AND id_user='$userId'";

    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
}else{
    $query = "INSERT INTO lists ( id_item, id_user,mark) VALUES ('$itemId', $userId ,$mark)";

    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
}
?>