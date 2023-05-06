<?php
require_once "../connect/db.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
$do = $_GET['do'];
$epAmount = $_GET['ep-amount'];

if($do == 'dlt'){
    $itemId = $_SESSION['item_id'];
    $userId = $_SESSION['id'];

    $query = "DELETE FROM lists WHERE id_item='$itemId' AND id_user='$userId'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    if($rez){
        echo 'dlt';
    } 
}else{
    ChangeList($do, $link, $epAmount);
}

function ChangeList($do,$link, $epAmount)
{
    $itemId = $_SESSION['item_id'];
    $userId = $_SESSION['id'];

    $row = getInfoDB(
        "SELECT list_type_code, w_amount FROM lists WHERE id_item='$itemId' AND id_user='$userId'",
        $link);
    if($row){
        $query = "UPDATE lists SET list_type_code = '$do' WHERE id_item='$itemId' AND id_user='$userId' ";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));  
        if($do =='w'){
            $query = "UPDATE lists SET w_amount = '$epAmount' WHERE id_item='$itemId' AND id_user='$userId' ";
            $rezz = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        }  
        if($rez){
            echo 'upd';
        } 
    }else{
        // var_dump($itemId);
        // var_dump($userId);
        $query = "INSERT INTO lists (id_item, id_user, list_type_code, w_amount) VALUES ('$itemId', '$userId', '$do','1'); ";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        if($do =='w'){
            $query = "UPDATE lists SET w_amount = '$epAmount' WHERE id_item='$itemId' AND id_user='$userId' ";
            $rezz = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        }
        if($rez){
            echo 'ins';
        } 
    }
}


function getInfoDB($query, $link){
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row;
}
?>