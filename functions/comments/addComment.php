<?php
require_once('../../connect/db.php');
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

if(!empty($_POST['text']))
{
    $text = $_POST['text'];
    $parentId = $_POST['parentId'];
    $userId = $_SESSION['id'];
    $itemId= $_SESSION['item_id'];
    var_dump($text);
    var_dump($parentId);
    var_dump($userId);
    var_dump($itemId);
    $query = "INSERT INTO `comment` (`text`, `id_user`, `id_parent_comm`, `id_item`) VALUES ('$text','$userId','$parentId','$itemId'); ";
    $result=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
}
?>