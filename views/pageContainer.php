<?php

    $action = "index";
    if($_GET["action"]){
        $action = $_GET["action"];
    }
?>


<div class="container mt-3">

    <?php
          switch ($action) {
           case 'index':
                include_once("pages/index.php");
                break;
            case 'articles':
                include_once("pages/articles.php");
                break;
            case 'article':
                include_once("pages/article.php");
                break;
            case 'logout':
                include_once("functions/logInOut/logout.php");
                break;
            case 'bookCatalog':
                include_once("pages/catalog.php");
                break;
            case 'filmCatalog':
                include_once("pages/catalog.php");
                break;
            case 'bookItem':
                include_once("pages/title.php");
                break;
            case 'filmItem':
                include_once("pages/title.php");
                break;
            case 'user':
                include_once("pages/user.php");
                break;

                default:
                include_once("404.php");
                break;
            }
          
    ?>

</div>