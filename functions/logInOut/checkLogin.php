<?php
 require_once('../../connect/db.php');

 if(isset($_POST)){
    $login =  mysqli_real_escape_string($link, $_POST['login']);

    $sameUser = mysqli_query($link,"SELECT login FROM user WHERE login = '$login'") or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($sameUser); 
    $user = $row['login']; 
    if($user){
        echo "Логин $user уже занят";
    }else{
        echo "";
    }
 }