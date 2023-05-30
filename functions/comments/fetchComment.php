<?php
require_once "../../connect/db.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$output = '';

$itemId = $_SESSION['item_id'];

$query = "SELECT comment.id, text, publish_date, id_parent_comm, login, img FROM comment JOIN user ON comment.id_user=user.id WHERE id_item ='$itemId' AND id_parent_comm='0' ORDER BY comment.id DESC";
$rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
while ($row = mysqli_fetch_assoc($rez)) {
if($row['img'] == NULL){
    $img = "default_user.png";
}else{
    $img = $img =$row['img'];
}
$date = date_create_from_format('Y-m-d H:i:s',$row['publish_date'] );
$publish =date_format($date, 'd-m-Y H:i');

 $output .= "<div>
                <div class='comment-card my-3'>
                    <div class='comment-img-div'>
                        <img class='comment-ava' src='http://horrowood.com/img/db/users/$img' alt='$img' title='$img'>
                    </div>
                    <div class='comment-text-section'>
                        <h5>".$row['login']."</h5>
                        <p class='comment-text'>".$row['text']."</p>
                    </div>
                    <div class='comment-buttons'>
                            <input type='submit' class='comment-button bbutton reply' id='".$row['id']."' value='Ответить'>
                        <div class='breadcrump'>".$publish."</div>
                    </div>
                </div>
                <form class='col-md-12 comment-card make-comment comment-hide'>
                    <textarea name='message' class='message input-shadow comment-text' 
                    maxlength='250' cols='1' rows='10' wrap='hard' placeholder='Введите сообщение'>".$row['login'].", </textarea>
                    
                    <div class='comment-bottom'>
                        <p class='comment-text'><span name='reply' class='comment-text reply'></span></p>
                        <div class='button'>
                            <input name='parentId' type='hidden' value='".$row['id']."'>
                            <input name='send-comment' type='button' class='send-comment comment-button bbutton' value='Отправить'>
                        </div>
                    </div>
                </form> 
            </div>
            ";

    $queryCheck = "SELECT COUNT(id) as ch FROM comment WHERE id_parent_comm = '".$row['id']."'";
    $result = mysqli_query($link, $queryCheck)or die("Ошибка " . mysqli_error($link)); 
    $row2 = mysqli_fetch_assoc($result);
    if($row2['ch'] > 0){
        $output .= "<p class='show-more' data-parent='".$row['id']."'>Показать больше...</p>";
        $output .= " <div data-parent='".$row['id']."' class='comment-hide mb-5'>";
    }

 $output .= get_reply_comment($link, $itemId, $row["id"], 0);
 if($row2['ch'] > 0){
$output .="</div>";
 }
}

echo $output;




function get_reply_comment($link, $itemId, $parent_id, $marginleft)
{
 $query = "SELECT comment.id, text, publish_date, id_parent_comm, login, img FROM comment JOIN user ON comment.id_user=user.id WHERE id_item='$itemId' AND id_parent_comm='$parent_id' ORDER BY comment.id DESC";
 $output = '';
 $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }

    while ($row = mysqli_fetch_assoc($rez)) {
        if($row['img'] == NULL){
            $img = "default_user.png";
        }else{
            $img = $img =$row['img'];
        }
    $date = date_create_from_format('Y-m-d H:i:s',$row['publish_date'] );
    $publish =date_format($date, 'd-m-Y H:i');
    
   $output .= "<div style='margin-left:".$marginleft."px;'>
                    <div class='comment-card my-3'>
                        <div class='comment-img-div'>
                            <img class='comment-ava' src='http://horrowood.com/img/db/users/$img' alt='$img' title='$img'>
                        </div>
                        <div class='comment-text-section'>
                            <h5>".$row['login']."</h5>
                            <p class='comment-text'>".$row['text']."</p>
                        </div>
                        <div class='comment-buttons'>
                            <input type='button' class='comment-button bbutton reply' id='".$row['id']."' value='Ответить'>
                            <div class='breadcrump'>".$publish."</div>
                        </div>
                    </div>
                    <form class='col-md-12 comment-card make-comment comment-hide'>
                        <textarea name='message' class='message input-shadow comment-text' 
                        maxlength='250' cols='1' rows='10' wrap='hard' placeholder='Введите сообщение'>".$row['login'].", </textarea>
                        
                        <div class='comment-bottom'>
                            <p class='comment-text'><span name='reply' class='comment-text reply'></span></p>
                            <div class='button'>
                                <input name='parentId' type='hidden' value='".$row['id']."'>
                                <input name='send-comment' type='button' class='send-comment comment-button bbutton' value='Отправить'>
                            </div>
                        </div>
                    </form> 
                </div>";

   $output .= get_reply_comment($link, $itemId, $row["id"], $marginleft);
  }
 
 return $output;
}

?>
