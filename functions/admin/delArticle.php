<?php
require_once '../../connect/db.php';
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


$_SESSION['url'] = 'http://horrowood.com/index.php' ;

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "DELETE FROM comment WHERE id_item = '$id'";
    $result = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    var_dump($result);

    $query = "DELETE FROM likes WHERE id_item = '$id'";
    $result = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    var_dump($result);

    $query = "DELETE FROM article WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    if ($result) {
        echo "<script>location.href='http://horrowood.com/index.php?action=admin&tab=Article&page=1';</script>";
    } else {
        echo "Failed to delete." . mysqli_connect_error();
    }
}
mysqli_close($dbcon);