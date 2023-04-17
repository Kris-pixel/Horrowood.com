<?php
 require_once('../../connect/db.php');

 function test_input($data) {
  $data = trim($data);
  $data=strip_tags($data);
  $data = htmlspecialchars($data, ENT_QUOTES); 
  $data = stripslashes($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eEn = $e1 = $e2 = $e3 = $e4 = "";
  
    if(empty($_POST['login'])){
      $e1 = "заполните поле";
    }elseif(!preg_match('/^(\w|\d){3,15}$/i', $_POST['login'])){
      $e1 = "Логин должен содержать от 3 до 15 символов";
    }else{
      $login = test_input($_POST['login']);
    }
  
    if(empty($_POST['password'])){
      $e2 = "заполните поле";
    }elseif(!preg_match('/^\d{8,}$/', $_POST['password'])){
      $e2 = "Пароль должен содержать минимум 8 символов";
    }else{
      $password = test_input($_POST['password']);
    }
  
    if(empty($_POST['password2'])){
      $e3 = "заполните поле";
    }elseif ($_POST['password']!=$_POST['password2']){
      $e3.="Пароли не совпадают<br>"; 
    }else{
      $password2 = test_input($_POST['password2']);
    }
  
    if(empty($_POST['email'])){
      $e4 = "заполните поле";
    }elseif(!preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $_POST['email'])){
      $e4 = "неверный формат";
    }else{
      $email = test_input($_POST['email']);
    }
  
  
    $eEn=$e1.$e2.$e3.$e4;

    if($eEn==""){
        $sameUser = mysqli_query($link,"SELECT login FROM user WHERE login LIKE '%$login%'") or die("Ошибка " . mysqli_error($link)); 
        $row = mysqli_fetch_assoc($sameUser); 
        $user = $row['login']; 
      
        if(!$user){
          $salt = mt_rand(100, 999); 
          $passwordHash = md5(md5($password).$salt); 
          $query="INSERT INTO user (login, password, email, salt) VALUES ('$login','$passwordHash','$email', '$salt')"; 
          $result=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
      
          if ($result) { 
            $query="SELECT * FROM user WHERE login='$login'";
            $rez = mysqli_query($link, $query); 
            if ($rez) { 
              $row = mysqli_fetch_assoc($rez); 
              $_SESSION['id'] = $row['id'];
              $_SESSION['login'] = $row['login'];
              $_SESSION['role'] = $row['role']; 
      
              echo "Вы успешно зарегистрированы, ".$_SESSION['login']; 
              mysqli_close($link); 
              // выводим уведомление об успехе операции и перезагружаем страничку 
              print "<script language='Javascript' type='text/javascript'> 
              alert ('Вы успешно зарегистрировались! Спасибо!');
              window.location.href = 'http://horrowood.com/';
              </script>"; 
              $data = "Registration succeed ".$tm."\n";
              file_put_contents('data/log.txt',$data,FILE_APPEND);
            } else {
              print "<script language='Javascript' type='text/javascript'> 
              alert ('Ваши данные не были снесены в БД!');
              </script>"; 
              $data = "Database error ".$tm."\n";
              file_put_contents('log.txt',$data,FILE_APPEND);
            } 
        }
        }else{
          print "<script language='Javascript' type='text/javascript'> 
          alert ('Такой пользователь уже существует!');
          </script>"; 
        }
      }else{
        echo"<script language='Javascript' type='text/javascript'> 
        alert ('Неверные данные!!');
        </script>"; 
        $time = date("Y-m-d H:i:s",time());
        $data = "Registration completed with errors ".$time."\n";
        file_put_contents('../../data/log.txt',$data,FILE_APPEND);
      }
      }
