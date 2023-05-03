<?php
require_once('../../connect/db.php');
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
$prefix = "a-";
// var_dump($_POST['img']);
$login = $_SESSION['login'];
if (isset($_POST)) {

	$uploaddir = '../../img/db/article'; // . - текущая папка где находится submit.php

	$files      = $_FILES; // полученные файлы
	$done_files = array();

	// переместим файлы из временной директории в указанную
	foreach( $files as $file ){
		$file_name = $file['name'];

		if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
			$done_files[] = realpath( "$uploaddir/$file_name" );
		}
	}

	$data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');


    $id = uniqid($prefix);
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST ['text']);
    $topic = mysqli_real_escape_string($link, $_POST ['topic']);
    $date = date('Y-m-d H:i');
    $posted_by = mysqli_real_escape_string($link, $login);
    $img= $_POST['img'];


    $query = "INSERT INTO article (id, topic, title, body, login_user, created_at, img) VALUES('$id', '$topic', '$title', '$description','$posted_by', '$date', '$img')";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
    // var_dump($rez);
    die( json_encode( $data ) );
}