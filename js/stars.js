$(document).ready(function(){
    $(document).on('click', '.star.hoverable', function(){
        let id ="#" + $(this).attr("for");
        let value = $(id).attr('value');
        let href = location.href;

        if(value){
            $.ajax({
                url:"http://horrowood.com/functions/starsFunc.php",
                method:"GET",
                cache: false,
                data:{'mark': value},
                dataType:"html",

                success:function()
                {
                    $(".item-mark").load(href + " .item-mark");
                  alert("Спасибо за оценку!");
                }
                });
        }
        console.log();
        
    });
});