<?php
// require_once('connect\db.php');

function getUserForHeader($link,$login){
    $query = "SELECT img FROM user  WHERE login ='$login'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row;
}