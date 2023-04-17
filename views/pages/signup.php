<?php
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/loginForm.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    .error{
        color: #FEB483;
        font-family:'Corbel';
        font-size: 10px;
        position: absolute;
        margin-right:1%;
    }
</style>

    <title>Регистрация</title>
</head>
<body>
    <?php 
        require "../../functions/logInOut/regForm.php";
    ?>
        <div class="container">
            <div class="logo">
                <lottie-player src="https://lottie.host/013ee497-545e-491f-b56e-559af13611bf/tah8gFDirT.json" background="transparent" speed="1" style="width: 130px; height: 130px;" loop autoplay></lottie-player>
            </div>
            <div class="form rectangle-shadow">
                <label class="form-name"> Регистрация</label>

                <form method="post">
                    <div class="box-input ">
                        <label class="form-label">Логин</label>
                        <input class="input input-shadow" type="text" name="login" value="<?=@$login;?>" maxlength="25">
                        <span class="error"><?=@$e1;?></span> 
                    </div>
        
                    <div class="box-input">
                        <label class="form-label">Email</label>
                        <input class="input input-shadow" type="text" name="email" value="<?=@$email;?>" maxlength="25">
                        <span class="error"><?=@$e4;?></span>
                    </div>
        
                    <div class="box-input">
                        <label class="form-label">Пароль</label>
                        <input class="input input-shadow" name="password" type="password" maxlength="25">
                        <span class="error"><?=@$e2;?></span>
                    </div>
                    <div class="box-input">
                        <label class="form-label">Повторите<br>пароль</label>
                        <input class="input input-shadow" name="password2" type="password" maxlength="25">
                        <span class="error"><?=@$e3;?></span>
                    </div>
            </div>
            <div class="button">
                <input type="submit" class="bbutton button-shadow" value="Регистрация">
            </div>
        </div>

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
</body>
</html>