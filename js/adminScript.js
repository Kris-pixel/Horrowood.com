$(document).ready(function(){
    let page = new URLSearchParams(location.href).get('tab');
    let pageNumber = new URLSearchParams(location.href).get('page');
    $(".user-link[id=" + page + "]").css("opacity",1);

    $(document).on('click', '.user-link', function(){
        $(".user-link").css("opacity", 0.5);
        $(this).css("opacity",1);
        page = $(this).attr("id");
        history.pushState(null, null, "http://horrowood.com/index.php?action=admin&tab=" + page+"&page=1");
        load_content();
    });

     load_content();
    function load_content()
      {
        if(page == "Film" || page == "Article" || page == "Book"){
            $.ajax({
                url:"../functions/admin/list" + page + ".php",
                method:"GET",
                data:{
                  'page': pageNumber,
              },
              dataType:"html",
                success:function(data)
                {
                  $('#table').html(data);
                }
                });
        }else{
            location.href='http://horrowood.com/index.php?action=404';
        }
        
      }
});