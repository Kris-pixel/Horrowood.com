<?php
require_once '../../connect/db.php';
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


$_SESSION['url'] = 'http://horrowood.com/index.php' ;

if (isset($_GET['id'])) {
    $tab = substr($_GET['id'],0,1) == 'f' ? "Film" : "Book";

    $id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "DELETE FROM comment WHERE id_item = '$id'";
    $result = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    var_dump($result);

    $query = "DELETE FROM likes WHERE id_item = '$id'";
    $result = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    var_dump($result);

    $query = "DELETE FROM frame WHERE id_item = '$id'";
    $result = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    var_dump($result);

    $query = "DELETE FROM genre WHERE id_item = '$id'";
    $result = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    var_dump($result);

    $query = "DELETE FROM lists WHERE id_item = '$id'";
    $result = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    var_dump($result);

    $query = "DELETE FROM items WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    if ($result) {
        echo "<script>location.href='http://horrowood.com/index.php?action=admin&tab=$tab&page=1';</script>";
    } else {
        echo "Failed to delete." . mysqli_error($link);
    }
}
mysqli_close($dbcon);