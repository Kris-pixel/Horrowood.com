<?php
require_once "../../connect/db.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$newlist = $_POST['newList'];
$newmark = $_POST['newMark'];
$newAmount = $_POST['newAmount'];
$recordId = $_POST['recordId'];
var_dump($_POST);

$query = "SELECT * FROM lists  WHERE id ='$recordID'";
$rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
$row = mysqli_fetch_assoc($rez);

if($newlist != $row['list_type_code'] || $newlist != ''){
    $query = "UPDATE lists SET list_type_code = '$newlist' WHERE id = '$recordId' ";
    var_dump("here");
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
}

if($newmark != $row['mark'] || $newmark !=''){
    $query = "UPDATE lists SET mark = '$newmark' WHERE id = '$recordId' ";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        var_dump($rez);
}
if($newAmount != $row['w_amount'] || $newAmount != ''){
    $query = "UPDATE lists SET w_amount = '$newAmount' WHERE id = '$recordId' ";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
         var_dump($rez);
}

?>