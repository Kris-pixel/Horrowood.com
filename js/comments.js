
$(document).ready(function(){
  let modal = $("#modal");

  $(".modal-div input[value=ОК]").on("click", function () {
    modal.removeClass("show");
  });

  let auth = $('#comment-place').attr("data-login");
  let parentId = 0;
  let text='';
  let coomlength = 0;

   
  $(document).on('click', '.send-comment', function(){
    let thiscomm = $(this).parent().parent().parent().parent();
    parentId = $(this).prev("input[type=hidden]").val();
    text = $(this).parent().parent().prev("textarea").val().trim();
    let id = $(this).prev().val(); 

    if(parentId && (text.length > coomlength)){
      $.ajax({
        url:"../functions/comments/addComment.php",
        method:"POST",
        cache: false,
        data:{'parentId': parentId, 'text': text },
        dataType:"html",
        success:function(data)
        {
          console.log(data);
          if(data.error != ''){
            $("#mess").val("");
            // load_comment();
            if(parentId == "0"){
              load_comment();
            }else{
              let margin = Number(thiscomm.css("margin-left").slice(0,-2)) + 48;
              console.log(margin);
              thiscomm.after(data);
              thiscomm.next().css("margin-left", margin+"px");
              $('.reply#'+id).trigger("click");
            }
            
          }
        }
      });
    }
  });

  load_comment();  // подгрузка комментов при загруске страницы

  function load_comment()
  {
    $.ajax({
      url:"../functions/comments/fetchComment.php",
      method:"POST",
      success:function(data)
      {
        $('#comment-place').html(data);
      }
    });
  }
  
if(auth){
    $(document).on('click', '.reply', function(){
      let replyForm = $(this).parent().parent().next();
      coomlength = replyForm.children("textarea").val().length; 
      
      if($(this).val() == "Ответить"){
        
        $(this).val("Отмена");
        $(this).css("background", "#FEB483");
        $(this).css("outline", "1px solid #FEB483");
      }else{
        $(this).val("Ответить");
        $(this).css("background", "#99FF33");
        $(this).css("outline", "1px solid #99ff33");
        replyForm.children("textarea").text("");  
      }
      // console.log(replyForm.children("textarea").val().length);
      replyForm.toggleClass('comment-hide');
    });
  }else{
    $(document).on('click', '.reply', function(){
      $("h1.modal-name").html("Зарегистрируйтесь, <br> чтобы ставить оценки!");
      $("#modal .modal-div div").html("<img src='http://horrowood.com/img/icons/info.png' alt='info.png' title='info.png'>");
      modal.addClass("show");
    });
  }

    $(document).on('click', '.show-more', function(){
      $(this).toggleClass("open");

      if($(this).hasClass("open")){
        $(this).text("Скрыть...");
      }else{
        $(this).text("Показать больше...");
      }
      let openId = $(this).attr("data-parent");
      $("div[data-parent="+ openId +"]").toggleClass("comment-hide");
      if( $("div[data-parent="+ openId +"]").next().attr('[data-parent]')){
        $(this).toggleClass("comment-hide");
      }
      // console.log($("div[data-parent]"));
    });

  });