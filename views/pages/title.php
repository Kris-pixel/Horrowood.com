<?php
if($action == "bookItem")
{
    $amount="Количество томов";
    $amount2="Количество глав";
    $bredhref="http://horrowood.com/index.php?action=bookCatalog";
    $bredtitle="Каталог книг";
    $hide="display:none;";
    $time="";
    $author = "Автор";
}
if($action == "filmItem")
{
    $hide="";
    $amount="Количество эпизодов";
    $amount2="Длительность эпизода";
    $bredhref="http://horrowood.com/index.php?action=filmCatalog";
    $bredtitle="Каталог фильмов";
    $author = "Режиссёр";
    $time="мин";
}

$id= $_GET['id'];
$_SESSION['item_id'] = $id;
$item = GetItemById($link, $id);
if ($item == 0) {
    echo "<script>location.href='http://horrowood.com/index.php?action=404';</script>";
}
$genres = GetItemGanresById($link, $id);
$frames = GetItemFramesById($link, $id);

$date = date_create($item['release_date']);
$itemDate = date_format($date,'d.m.Y');
?>


<div class="col-md-12 mt-1 mb-3">
            <p class="breadcrump"> <a href="<?=@$bredhref;?>"><?=@$bredtitle;?></a> / <a href=""><?=@$item['title'];?></a></a></p>
        </div>

        <div  class="col-md-12 row">
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="card col-md-12 mb-4">
                    <div class='card-div-img'><img src="http://horrowood.com/img/db/items/<?=@$item['img'];?>" alt="<?=@$item['img'];?>" title="<?=@$item['img'];?>"></div>
                </div>

                <?php

                if(!empty($_SESSION['login'])){
                    $loginId = $_SESSION['id'];
                    include_once ('modules/listManageDropdow.php');
                }else{?>
                    <div class="col-md-12 guest-list-notice">
                        <p>Зарегистрируйтесь, <br> чтобы добавить в закладки!</p>
                    </div> 
               <?php }

                ?>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="col-md-12 heart-row pl-0">
                <h1><?=@$item['title'];?></h1>
                </div>
                <div>
                    <p class="reading-text">Оригинальное название: <?=@$item['orig_title'];?></p>
                    <p class="reading-text"><?=@$author;?>: <?=@$item['author'];?></p>
                    <p class="reading-text">Страна: <?=@$item['country'];?></p>
                    <p class="reading-text">Тип:  <?=@$item['name'];?></p>
                    <p class="reading-text">Дата выпуска: <?=@$itemDate;?></p>
                    <p id="<?=@$item['episode_amount'];?>" class="reading-text ep-amount"><?=@$amount;?>: <?=@$item['episode_amount'];?></p>
                    <p class="reading-text"><?=@$amount2;?>: <?=@$item['duration'];?> <?=@$time;?></p>
                    <p class="reading-text">Статус: <?=@$item['status_name'];?></p>
                    <p class="reading-text">Возрастной рейтинг: <?=@$item['rating'];?></p>
                    <p class="reading-text" style="<?=@$hide;?>">трейлер: <a class="pagelink" href=""><?=@$item['trailer'];?></a></p>
                    <p class="reading-text">Поджанры: <?=@$genres;?></p>
                    <p class="reading-text">Описание: <?=@$item['description'];?></p>
                </div>
                <div class="col-md-12 dark-card" style="<?=@$hide;?>"> <h4>Кадры</h4></div>
                <div class="frame-row mx-2" style="<?=@$hide;?>">
                    <img src="http://horrowood.com/img/db/items/<?=@$frames[0];?>" alt="<?=@$frames[0];?>" title="<?=@$frames[0];?>" class="mb-3">
                    <img src="http://horrowood.com/img/db/items/<?=@$frames[1];?>" alt="<?=@$frames[1];?>" title="<?=@$frames[1];?>" class="mb-3">
                    <img src="http://horrowood.com/img/db/items/<?=@$frames[2];?>" alt="<?=@$frames[2];?>" title="<?=@$frames[2];?>" class="mb-3">
                </div>
            </div>

            <div class=" same col-lg-3 col-md-8 col-sm-12">
                <div class="col-md-12 dark-card"> <h4>Оценки</h4></div>

                <?php include_once('modules/stars.php');?>

                <div class="col-md-12 dark-card"> <h4>Похожее</h4></div>
                <?php include_once('modules/sameTitles.php');?>
            </div>
        </div>
   
        <div class="col-md-12 row mt-4">
            <div class="col-md-2"></div>
            <div class="col-md-12 col-lg-9">
                <div class="col-md-12 dark-card mb-3"> <h4>Комментарии</h4></div>

               <?php include_once('modules/comments.php');?>

            </div>

        </div>

        <?php
$_SESSION['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
?>