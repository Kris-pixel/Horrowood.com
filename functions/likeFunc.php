<?php
require_once "../connect/db.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


if(isset($_POST['like'])){
    $itemId = $_SESSION['item_id'];
    $userId = $_SESSION['id'];

    $query = "SELECT * FROM likes WHERE id_item = '$itemId' AND id_user = '$userId'"; 
    $res = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($res);

    if($row){
        $query2 = "DELETE FROM likes WHERE id_item = '$itemId' AND id_user = '$userId'"; 
        $result = mysqli_query($link, $query2)or die("Ошибка " . mysqli_error($link));
        echo "img/icons/unlike.png";
    
    }else{
        $query2 = "INSERT INTO likes (id_item, id_user) VALUES ('$itemId', $userId)"; 
        $result = mysqli_query($link, $query2)or die("Ошибка " . mysqli_error($link));
        echo "img/icons/like.png";
    }
}