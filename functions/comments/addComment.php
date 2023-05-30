<?php
require_once('../../connect/db.php');
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

if(!empty($_POST['text']))
{
    $img ='default_user.png';
    $text = $_POST['text'];
    $parentId = $_POST['parentId'];
    $userId = $_SESSION['id'];
    $itemId= $_SESSION['item_id'];
    $query = "INSERT INTO `comment` (`text`, `id_user`, `id_parent_comm`, `id_item`) VALUES ('$text','$userId','$parentId','$itemId'); ";
    $result=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $query = "SELECT comment.id, text, publish_date, id_parent_comm, login, img FROM comment JOIN user ON comment.id_user=user.id WHERE id_user='$userId' AND id_item ='$itemId' AND id_parent_comm='$parentId' AND text = '$text'";
    $result=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $newrow = mysqli_fetch_assoc($result);
    echo "<div>
                <div class='comment-card my-3'>
                    <div class='comment-img-div'>
                        <img class='comment-ava' src='http://horrowood.com/img/db/users/".$newrow['img']."' alt='".$newrow['img']."' title='".$newrow['img']."'>
                    </div>
                    <div class='comment-text-section'>
                        <h5>".$newrow['login']."</h5>
                        <p class='comment-text'>".$newrow['text']."</p>
                    </div>
                    <div class='comment-buttons'>
                            <input type='submit' class='comment-button bbutton reply' id='".$newrow['id']."' value='Ответить'>
                        <div class='breadcrump'>".$publish."</div>
                    </div>
                </div>
                <form class='col-md-12 comment-card make-comment comment-hide'>
                    <textarea name='message' class='message input-shadow comment-text' 
                    maxlength='250' cols='1' rows='10' wrap='hard' placeholder='Введите сообщение'>".$newrow['login'].", </textarea>
                    
                    <div class='comment-bottom'>
                        <p class='comment-text'><span name='reply' class='comment-text reply'></span></p>
                        <div class='button'>
                            <input name='parentId' type='hidden' value='".$newrow['id']."'>
                            <input name='send-comment' type='button' class='send-comment comment-button bbutton' value='Отправить'>
                        </div>
                    </div>
                </form> 
            </div>
            ";
}
?>