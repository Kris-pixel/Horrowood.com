$(document).ready(function(){
$('#heart').on('click', function () {
    
    if(!($(this).hasClass("guestLike"))){

        let href = location.href;
        console.log(this);

        $.ajax({
            type: "POST",
            url: "http://horrowood.com/functions/likeFunc.php",
            data: {"like": 1},
            dataType: "html",
            success: function (response) {
                $('#heart').attr("src", response);
            }
        });
    }
});
});