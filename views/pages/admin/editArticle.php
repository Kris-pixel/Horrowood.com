<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$id = $_GET['id'];

$query = "SELECT * FROM article WHERE id = '$id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    echo "<script>location.href='http://horrowood.com/index.php?action=404';</script>";
}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$topic = $row['topic'];
$description = $row['body'];
$img = $row['img'];

if (isset($_POST['upd'])) {
    var_dump($_POST);
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $topic = mysqli_real_escape_string($link, $_POST['topic']);

    $query2 = "UPDATE article SET title = '$title', body = '$description', topic = '$topic' WHERE id = '$id'";

    if (mysqli_query($link, $query2)) {
        echo "<script>location.href='http://horrowood.com/index.php?action=article&id=$id';</script>";
    } else {
        echo "failed to edit.".mysqli_error($link);
        var_dump($query2);
    }
}
?>

<div class="form rectangle-shadow px-sm-5 p-3 py-4">
    <div>

        <div class="edit-title-div">
            <h2>Редактировать статью</h2>
            <a class="bbutton comment-button goto-article py-1 px-2" href="http://horrowood.com/index.php?action=article&id=<?=$id;?>">Перейти к статье</a>
        </div>

        <form method="POST" class="article-form">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="box-input my-3">
                <label class="form-label mr-2">Заголовок</label>
                <input type="text" class="input input-shadow" name="title" value="<?php echo $title; ?>">
            </div>

            <div class="box-input mb-3">
                <label class="form-label mr-4">Рубрика</label>
                <input type="text" class="input input-shadow" name="topic" value="<?php echo $topic; ?>">
            </div>

            <div class="box-input mb-3">
                    <label>Обложка</label><br>
                    <img class="edit-article-img" name="img" src="http://horrowood.com/img/db/article/<?=@$img;?>">
            </div>

            <div class="box-input mb-2">
                <label>Текст</label>
                <textarea class="r" id="description" name="description"><?php echo $description; ?> </textarea>
            </div>

            <div class="edit-title-div article-info">
                <input type="submit" class="mt-3 bbutton button-shadow" name="upd" value="Сохранить">
                <p class="breadcrump del-admin-but" data-id="<?php echo $id;?>" data-script="http://horrowood.com/functions/admin/delArticle.php?id=">[Удалить]</p>
            </div>
        </form>
    </div>
</div>

<?php

mysqli_close($link);?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/trumbowyg.min.js"></script>
<script>
    $('#description').trumbowyg();
</script>
<script src="js/confirm.js"></script>
