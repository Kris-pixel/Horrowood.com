<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/icons/logo16x16.png" type="image/png">

    <link rel="stylesheet" href="css/style.css">
    <?php
        if($_GET['action'] == "bookItem" || $_GET['action'] == "filmItem"){
            echo "<link rel='stylesheet' href='css/listButton.css'>";
        }else{
            echo " <link rel='stylesheet' href='css/customSelect.css'>";
        }
        if($_GET['action'] == "newItem"){
            echo " <link rel='stylesheet' href='css/multipleSelect.css'>";
        }
    ?>
    <link rel="stylesheet" href="css/stars.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Horrorwood <?php $head= $_GET["action"]? '- '.$_GET["action"] : '';
                            echo $head;?></title>
    </head>
<body>
    <?php include_once("views/preloader.php");?>
    <?php 
         if(session_status()!=PHP_SESSION_ACTIVE) session_start();

        //  сюда подключать все нужные функции
        require_once('connect/db.php');
        require_once('functions/userFunc.php');
        require_once('functions/itemFunc.php');?>
        
    <?php    include ("views/header.php");?>
    <?php    include ("views/pageContainer.php");?>
    <?php    include ("views/footer.php");?>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script type="text/javascript" src="js/lottie.js"></script>
    <script type="text/javascript" src="js/logo.js"></script>
    <script type="text/javascript" src="js/welcomAnim.js"></script>
    <script type="text/javascript" src="js/ghostAnim.js"></script>
    <!-- <script src="js/customSelect.js"></script> -->
</body>
</html>