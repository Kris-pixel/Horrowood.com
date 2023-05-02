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
$time = $row['created_at'];

$_SESSION['item_id'] = $id;

?>
        <div class="col-md-12 mt-1 mb-3">
            <p class="breadcrump"> <a href="http://horrowood.com/index.php?action=articles&page=1">Статьи</a> / 
            <a href="http://horrowood.com/index.php?action=articles&page=<?=@$id;?>"><?=@$title;?></a></a></p>
        </div>

        <div  class="col-md-12 row">
           <div class="col-md-9 px-5 py-4 rectangle-shadow mb-4">
            <h1><?=@$title;?></h1>
            <div class="article-info">
                <p class="breadcrump">Автор: <?=@$author;?></p>
                <p class="breadcrump"><?=@$time;?></p>
            </div>
            <img class="article-img my-3 p-0 col-md-12" src="http://horrowood.com/img/db/article/<?=@$img;?>" alt="<?=@$img;?>" title="<?=@$img;?>">
            <p class="reading-text">
                <?=@$description;?>
            </p>

            <div class="col-md-12 article-bottom">
                <h5 id="articleTag" class="dark-card py-2 px-3"><?=@$topic;?></h5>
                <img id="heart" src="heart.svg" alt="">
            </div>

            <?php
            if (isset($_SESSION['login']) && $_SESSION['role']==1) {
                ?>
            <div class="article-info">
                <p class="breadcrump edit-admin-but"><a href="http://horrowood.com/index.php?action=editArticle&id=<?php echo $row['id']; ?>">[Редактировать]</a></p>
                <p class="breadcrump del-admin-but"><a href="http://horrowood.com/functions/admin/delArticle.php?id=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this post?'); ">[Удалить]</a></p>
            </div>
            <?php
                }
                ?>

           </div>
           <div class="col-md-3 pl-4 pr-0">
           <div class="col-md-12 dark-card"> <h4>Читайте также</h4></div>

           <?php include_once('modules/sameArticles.php');?>

           </div>
        </div>
   
        <div class="col-md-12 row mt-5">
            <div class="col-md-9">
                <div class="col-md-12 dark-card mb-3"> <h4>Комментарии</h4></div>

                <?php include_once('modules/comments.php');?>
            </div>

        </div>





