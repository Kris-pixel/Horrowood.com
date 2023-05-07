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


    if(isset($_POST)){
      $login =mysqli_real_escape_string($link, $_POST['login']);

      $query="SELECT * FROM user WHERE login ='$login'";
      $rez = mysqli_query($link, $query); 
      $row = mysqli_fetch_assoc($rez);
      if (!$row)
      {
          mysqli_close($link);
          echo 'Логина не существует!';
      }
      else {
        $password = test_input($_POST['password']);

          if ($row['password']==md5(md5($password).$row['salt']))
          {
              $_SESSION['id'] = $row['id']; 
              $_SESSION['login'] = $row['login']; 
              $_SESSION['role'] = $row['role']; 
              echo "";
          }
          else {
              echo "неверный пароль";
          }
          mysqli_close($link);
      }
    }
  ?>