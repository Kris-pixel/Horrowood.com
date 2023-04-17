<?php
require_once "../connect/db.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
$do = $_GET['do'];

if($do == 'dlt'){
    $itemId = $_SESSION['item_id'];
    $userId = $_SESSION['id'];

    $query = "DELETE FROM lists WHERE id_item='$itemId' AND id_user='$userId'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    if($rez){
        return 1;
    } 
}else{
    ChangeList($do, $link);
}

function ChangeList($do,$link)
{
    $itemId = $_SESSION['item_id'];
    $userId = $_SESSION['id'];

    $row = getInfoDB(
        "SELECT list_type_code FROM lists WHERE id_item='$itemId' AND id_user='$userId'",
        $link);
    if($row){
        $query = "UPDATE lists SET list_type_code = '$do' WHERE id_item='$itemId' AND id_user='$userId' ";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        if($rez){
            return 1;
        } 
    }else{
        var_dump($itemId);
        var_dump($userId);
        $query = "INSERT INTO lists (id_item, id_user, list_type_code) VALUES ('$itemId', '$userId', '$do'); ";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        if($rez){
            return 1;
        } 
    }
}


function getInfoDB($query, $link){
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row;
}
?>