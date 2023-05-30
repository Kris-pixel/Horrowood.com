<?php if(empty($_SESSION['login'])){ 
    echo "<style> .make-comment{ display:none;} </style>";
?>

<div class="col-md-12 comment-card guest-comm-notice">
    <h4>Зарегистрируйтесь, <br> чтобы оставлять комментарии!</h4>
</div>  
<?php } ?>

<form class="col-md-12 comment-card make-comment">
    <textarea id="mess" name="message" class="input-shadow comment-text message" maxlength="250" cols="1" rows="10" wrap="hard" placeholder="Введите сообщение"></textarea>
    <div class="comment-bottom">
        <p class="comment-text"><span id="reply" class="comment-text"></span></p>
        <div class="button">
            <input name='parentId' type='hidden' value='0'>
            <input type="button" class="send-comment comment-button bbutton" value="Отправить">
        </div>
    </div>
</form>  

<div id="comment-place" data-login="<?=@$_SESSION['login'];?>">
              
</div>

<script src="js/comments.js"></script>