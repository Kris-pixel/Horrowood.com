<?php 
require_once('../../connect/db.php');
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

// var_dump($_POST);
// var_dump($_FILES);
if (isset($_POST) && isset($_FILES)) {

    $uploaddir = '../../img/db/items'; // . - текущая папка где находится submit.php

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

    $prefix = $_POST['id-prefix'].'-';
    $id =  uniqid($prefix);
    $title =  mysqli_real_escape_string($link, $_POST['title']);
    $origTitle = mysqli_real_escape_string($link, $_POST['orig-title']);
    $country = mysqli_real_escape_string($link, $_POST['country']);
    $releaseDate = $_POST['release-date'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $raiting =  $_POST['rating'];
    $epAmount = $_POST['ep-amount'];
    $duration =  $_POST['duration'];
    $trailer = mysqli_real_escape_string($link, $_POST['trailer']);
    $dascription = mysqli_real_escape_string($link, $_POST['description']);
    $genres = explode(' ', $_POST['genres']);

    // var_dump($genres);
    if($prefix == 'f-'){
        $query = "INSERT INTO items (id, type_code, episode_amount, duration, satus_code, 
                country, rating, img, release_date, title, orig_title, description, trailer)
                VALUES('$id', '$type', '$epAmount', '$duration','$status',
                '$country', '$raiting', '".$_FILES['0']['name']."', '$releaseDate', '$title', '$origTitle', '$dascription', '$trailer')";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        // var_dump($rez);

        $query = "INSERT INTO frame (id_item, img)
        VALUES('$id', '".$_FILES['1']['name']."'),
        ('$id', '".$_FILES['2']['name']."'),
        ('$id', '".$_FILES['3']['name']."')
        ";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        // var_dump($rez);
    }
    if($prefix == 'b-'){
        $query = "INSERT INTO items (id, type_code, episode_amount, duration, satus_code, 
        country, rating, img, release_date, title, orig_title, description)
        VALUES('$id', '$type', '$epAmount', '$duration','$status',
        '$country', '$raiting', '".$_FILES['0']['name']."', '$releaseDate', '$title', '$origTitle', '$dascription')";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        // var_dump($rez);
    }

    foreach ($genres as $key => $value) {
        $query = "INSERT INTO genre (id_item, genre_code)
        VALUES('$id', '$value')";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link));
        // var_dump($rez);
    }

    die( json_encode( $data ) );
}