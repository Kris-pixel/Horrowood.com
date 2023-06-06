$(document).ready(function(){

    $(document).on('click', '.edit', function(){

        $(this).text("Отмена").toggleClass("active");
        let show = $(this).attr('id');
        let listType = $(this).next().val();

        $('#form'+show).toggleClass("show");
        $(".editform:not(#form"+show+")").removeClass("show");
        $(".edit:not(#"+show+")").removeClass("active");
        $(".edit:not(.active)").text("Изменить");

        let plaholder = $("#form"+show).children().children().children().children().children().children("option[value='"+listType+"']").text();
        $("#form"+show).children().children().children().children().children().next('.select-selected').prepend(plaholder);
      });

    let page = new URLSearchParams(location.href).get('page');
    $(".user-link[id=" + page + "]").css("opacity",1);

    $(document).on('click', '.user-link', function(){
        $(".user-link").css("opacity", 0.5);
        $(this).css("opacity",1);
        page = $(this).attr("id");
        history.pushState(null, null, "http://horrowood.com/index.php?action=user&page=" + page);
        load_content();
    });

    $(document).on('click', '.delete', function(){
        let recordId = $(this).next().next().val();
        
        $.ajax({
            url:"../functions/userPage/deleteList.php",
            method:"POST",
            cache: false,
            data:{
                'recordId': recordId,
            },
            dataType:"html",
            success:function(data)
            {
              if(data.error != '')
              {
              $('#content').text('');
              load_content();
              }
            }
            });
    });
    $(document).on('click', '.edit-submit', function(){
      let newList='';
        let form = $(this).parent().parent();
        let recordId = $(this).next().val();
        let key= form.children().children().children('.select-items').children('.same-as-selected').text();
        switch (key) {
          case "прочитано":
            newList='w';
            break;
            case "просмотрено":
              newList='w';
            break;
            case "смотрю":
              newList='s';
            break;
            case "читаю":
              newList='s';
            break;
            case "запланировано":
              newList='p';
            break;
            case "брошено":
              newList='t';
            break;
        
          default:
            break;
        }
        let newMark = form.children().children("input[name = 'mark']").val();
        let newAmount = form.children().children("input[name = 'wctd']").val();
        $.ajax({
            url:"../functions/userPage/editList.php",
            method:"POST",
            cache: false,
            data:{
                'recordId': recordId,
                'newList': newList,
                'newMark': newMark,
                'newAmount': newAmount 
            },
            dataType:"html",
            success:function(data)
            {
              if(data.error != '')
              {
              $('#content').text('');
              load_content();
              }
            }
            });

    });

    load_content();
    function load_content()
      {
        if(page == "achiv" || page == "book" || page == "film" || page == "like"){
          $.ajax({
          url:"../functions/userPage/" + page + ".php",
          method:"POST",
          success:function(data)
          {
            $('#content').html(data);
          }
          });
        }else{
          location.href='http://horrowood.com/index.php?action=404';
        }
      }   
});