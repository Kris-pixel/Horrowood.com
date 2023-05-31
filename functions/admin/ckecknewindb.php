<?php 
require_once('../../connect/db.php');
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

// var_dump($_POST);
// var_dump($_FILES);
if (isset($_POST) && isset($_FILES)) {


    $prefix = $_POST['id-prefix'].'-';
    $title =  mysqli_real_escape_string($link, $_POST['title']);
    $origTitle = mysqli_real_escape_string($link, $_POST['orig-title']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $country = mysqli_real_escape_string($link, $_POST['country']);
    $releaseDate = $_POST['release-date'];
    $date = date_create($releaseDate);
    $date = date_format($date,'Y-m-d');

    $status = $_POST['status'];
    $type = $_POST['type'];


    $query = "SELECT * FROM items WHERE id LIKE '$prefix%' AND title = '$title' AND orig_title = '$origTitle' AND author = '$author' AND release_date = '$date' AND satus_code = '$status' AND type_code = '$type'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    $check = mysqli_fetch_assoc($rez);

    echo $check["id"];
}