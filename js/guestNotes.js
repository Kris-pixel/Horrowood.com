$(document).ready(function(){
    let modal = $("#modal");

    $(".modal-div input[value=ОК]").on("click", function () {
        modal.removeClass("show");
    });


    $('label.star-rating').on("click", function () {
        if($(this).prev().attr("disabled")){
        
            $("h1.modal-name").html("Зарегистрируйтесь, <br> чтобы ставить оценки!");
            $("#modal .modal-div div").html("<img src='http://horrowood.com/img/icons/info.png' alt='info.png' title='info.png'>");
            modal.addClass("show");
        }
       
    });
    $('img.guestLike').on("click", function () {
        
            $("h1.modal-name").html("Зарегистрируйтесь, <br> чтобы ставить лайки!");
            $("#modal .modal-div div").html("<img src='http://horrowood.com/img/icons/info.png' alt='info.png' title='info.png'>");
            modal.addClass("show");
       
    });
});