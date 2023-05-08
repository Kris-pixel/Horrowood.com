$(document).ready(function(){
    let modal = $("#modal");
    $("h1.modal-name").html("Спасибо <br> за оценку!");
    $("#modal .modal-div div").attr("id", "stars");

    $(".modal-div input[value=ОК]").on("click", function () {
        modal.removeClass("show");
    });


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
                    modal.addClass("show");
                }
                });
        }
        console.log();
        
    });
});