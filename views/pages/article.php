<?php

$id = $_GET['id'];
$query = "Select * FROM article WHERE id = '$id'";
$result = mysqli_query($link, $query);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    echo "<script>location.href='http://horrowood.com/index.php?action=404';</script>";
}

$query = "SELECT * FROM article WHERE id = '$id'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$topic = $row['topic'];
$img = $row['img'];
$description = $row['body'];
$author = $row['login_user'];
$date = date_create($row['created_at']);
$time = date_format($date,'h:m:s d.m.Y');

$_SESSION['item_id'] = $id;

?>
        <div class="col-md-12 mt-1 mb-3">
            <p class="breadcrump"> <a href="http://horrowood.com/index.php?action=articles&page=1">Статьи</a> / 
            <a href="http://horrowood.com/index.php?action=article&id=<?=@$id;?>"><?=@$title;?></a></p>
        </div>

        <div  class="col-md-12 row m-0  ">
           <div class="col-lg-9 col-md-12 px-5 py-4 rectangle-shadow mb-4">
            <h1><?=@$title;?></h1>
            <div class="article-info">
                <p class="breadcrump">Автор: <?=@$author;?></p>
                <p class="breadcrump"><?=@$time;?></p>
            </div>
            <img class="article-img my-3 p-0 col-md-12" src="http://horrowood.com/img/db/article/<?=@$img;?>" alt="<?=@$img;?>" title="<?=@$img;?>">
            <div class="reading-text">
                <?=@$description;?>
</div>
        <div id="reload"> 
            <div class="col-md-12 article-bottom px-0">
                <h5 id="articleTag" class="dark-card py-2 px-3"><?=@$topic;?></h5>
                <?php
                    if(isset($_SESSION['login'])){
                        $query = "SELECT * FROM likes WHERE id_item = '$id' AND id_user = '".$_SESSION['id']."'"; 
                        $res = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($res);
                        $guestlike ='';

                        if($row){
                            $src='img/icons/like.png';
                        }else{
                            $src='img/icons/unlike.png';
                        }
                    }else{
                        $guestlike ='guestLike';
                        $src='img/icons/unlike.png';
                    }
                ?>
               <img id='heart' class="<?=@$guestlike;?>" src='<?=@$src;?>' alt='сердечко'>
            </div>
                </div>

            <?php
            if (isset($_SESSION['login']) && $_SESSION['role']==1) {
                ?>
            <div class="article-info">
                <p class="breadcrump edit-admin-but"><a href="http://horrowood.com/index.php?action=editArticle&id=<?php echo $id; ?>">[Редактировать]</a></p>
                <p class="breadcrump del-admin-but" data-id="<?php echo $id;?>" data-script="http://horrowood.com/functions/admin/delArticle.php?id=">[Удалить]</p>
            </div>
            <?php
                }
                ?>

           </div>
           <div class="col-lg-3 col-md-12 pl-3 pr-0">
           <div class="col-md-12 dark-card"> <h4>Читайте также</h4></div>

           <?php include_once('modules/sameArticles.php');?>

           </div>
        </div>
   
        <div class="col-md-12">
            <div class="col-lg-9 col-12">
                <div class="col-md-12 dark-card mb-3"> <h4>Комментарии</h4></div>

                <?php include_once('modules/comments.php');?>
            </div>

        </div>

<?php
$_SESSION['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
?>
<script src="js/like.js"></script>
<script src="js/confirm.js"></script>




