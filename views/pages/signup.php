<?php
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/loginForm.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Регистрация</title>
</head>
<body>
    <?php 
        include_once("../modal.php");
    ?>
        <div class="container">
            <div class="logo">
                <lottie-player src="https://lottie.host/013ee497-545e-491f-b56e-559af13611bf/tah8gFDirT.json" background="transparent" speed="1" style="width: 130px; height: 130px;" loop autoplay></lottie-player>
            </div>
            <div class="form rectangle-shadow">
                <label class="form-name"> Регистрация</label>

                <form>
                    <div class="box-input ">
                        <label class="form-label">Логин  <span class="er-login ml-2"></span> </label>
                        <input class="input input-shadow" type="text" name="login" value="" maxlength="25">
                    </div>
        
                    <div class="box-input">
                        <label class="form-label">Email <span class="er-email ml-2"></span></label>
                        <input class="input input-shadow" type="text" name="email" value="" placeholder="example@gmail.com" maxlength="25">
                    </div>
        
                    <div class="box-input">
                        <label class="form-label pas">Пароль <span class="er-password ml-2"></span></label>
                        <input class="input input-shadow" name="password" type="password" maxlength="25">
                    </div>
                    <div class="box-input">
                        <label class="form-label">Повторите пароль <span class="er-password2 ml-2"></span></label>
                        <input class="input input-shadow" name="password2" type="password" maxlength="25">
                        <input type="hidden" name="url" value="<?=@$_SESSION['url'];?>">
                    </div>
                </form>
            </div>
            <div class="button">
                <input type="button" class="bbutton button-shadow" value="Регистрация">
            </div>
        </div>

    <script type="text/javascript" src="../../js/lottie.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
    <script type="text/javascript" src="../../js/hiAnim.js"></script>
    <script src="../../js/regForm.js"></script>
</body>
</html>