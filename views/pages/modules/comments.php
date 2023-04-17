<?php if(empty($_SESSION['login'])){ echo "<style> #make-comment{ display:none;} </style>";} ?>

<form id="make-comment" class="col-md-12 comment-card" action="">
    <textarea id="message" class="input-shadow comment-text" maxlength="250" cols="1" rows="10" wrap="hard" placeholder="Введите сообщение"></textarea>

    <div class="comment-bottom">
        <p class="comment-text"><span id="reply" class="comment-text"></span></p>
        <div class="button">
            <input id="send-comment" type="button" class="comment-button bbutton" value="Отправить">
        </div>
    </div>
</form>  

<div id="comment-place">
              
</div>

<script src="js/comments.js"></script>