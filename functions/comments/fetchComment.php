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

 $output .= "
 <div class='comment-card my-3'>
    <div class='comment-img-div'>
        <img class='comment-ava' src='http://horrowood.com/img/db/users/$img' alt='$img' title='$img'>
    </div>
    <div class='comment-text-section'>
        <h5>".$row['login']."</h5>
        <p class='comment-text'>".$row['text']."</p>
    </div>
    <div class='comment-buttons'>
        <div>
            <input type='submit' class='comment-button bbutton reply' id='".$row['id']."' value='Ответить'>
            <input type='hidden' class='postName' name='postName' value='".$row['login']."'>
        </div>
        <div class='breadcrump'>".$publish."</div>
    </div>
</div>";

 $output .= get_reply_comment($link, $itemId, $row["id"], 0);
}

echo $output;




function get_reply_comment($link, $itemId, $parent_id, $marginleft)
{
 $query = "SELECT comment.id, text, publish_date, id_parent_comm, login, img FROM comment JOIN user ON comment.id_user=user.id WHERE id_item='$itemId' AND id_parent_comm='$parent_id' ORDER BY comment.id";
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
    
   $output .= "
<div class='comment-card my-3' style='margin-left:$marginleft;'>
    <div class='comment-img-div'>
        <img class='comment-ava' src='http://horrowood.com/img/db/users/$img' alt='$img' title='$img'>
    </div>
    <div class='comment-text-section'>
        <h5>".$row['login']."</h5>
        <p class='comment-text'>".$row['text']."</p>
    </div>
    <div class='comment-buttons'>
        <div >
            <input type='button' class='comment-button bbutton reply' id='".$row['id']."' value='Ответить'>
            <input type='hidden' class='postName' name='postName' value='".$row['login']."'>
        </div>
        <div class='breadcrump'>".$publish."</div>
    </div>
</div>";
   $output .= get_reply_comment($link, $itemId, $row["id"], $marginleft);
  }
 return $output;
}

?>
