<?php
    $host = "localhost"; // адрес сервера
     $database = "horrorwood_db"; // имя базы данных
     $user = "root"; // имя пользователя
     $password = ""; // пароль
     $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

     if(!$link){
         die('Ошибка подключения к бд');
     }
?>