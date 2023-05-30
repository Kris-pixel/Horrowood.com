<?php
 require_once('../../connect/db.php');
 if(session_status()!=PHP_SESSION_ACTIVE) session_start();


 function test_input($data) {
  $data = trim($data);
  $data=strip_tags($data);
  $data = htmlspecialchars($data, ENT_QUOTES); 
  $data = stripslashes($data);
  return $data;
}

if(isset($_POST)){
  $login = mysqli_real_escape_string($link, $_POST['login']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $password = test_input($_POST['password']);
          
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
      
        echo "Добро пожаловать,<br> ".$_SESSION['login']."!"; 
        mysqli_close($link); 
        $data = "Registration succeed ".$tm."\n";
        file_put_contents('../../data/log.txt',$data,FILE_APPEND);
      } else {
        echo $rez; 
        $data = "Database error ".$tm."\n";
        file_put_contents('../../data/log.txt',$data,FILE_APPEND);
      } 
    }
}