<?php
 require_once('../../connect/db.php');

  function test_input($data) {
    $data = trim($data);
    $data=strip_tags($data);
    $data = htmlspecialchars($data, ENT_QUOTES); 
    $data = stripslashes($data);
    return $data;
  }
 
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eEn = $e1 = $e2 = "";


    if(empty($_POST['login'])){
      $e1 = "заполните поле";
    }else{
      $login = test_input($_POST['login']);
    }

    if(empty($_POST['password'])){
      $e2 = "заполните поле";
    }

  $eEn=$e1.$e2;

  if($eEn==""){
    if(isset($_POST["password"])){

      $query="SELECT * FROM user WHERE login ='$login'";
      $rez = mysqli_query($link, $query); 
      $row = mysqli_fetch_assoc($rez);
      if (count($row) == 0)
      {
          mysqli_close($link);
          $e1 .='Такого логина не существует!';
      }
      else {
        $password = test_input($_POST['password']);

          if ($row['password']==md5(md5($password).$row['salt']))
          {
              $_SESSION['id'] = $row['id']; 
              $_SESSION['login'] = $row['login']; 
              $_SESSION['role'] = $row['role']; 
              print "<script language='Javascript' type='text/javascript'>
              window.location.href = 'http://horrowood.com/';
              </script>";
          }
          else {
              print "<script language='Javascript' type='text/javascript'>
              alert ('Вы ввели не верные данные!');
              </script>";
          }
          mysqli_close($link);
      }
    }
  }

}
  ?>