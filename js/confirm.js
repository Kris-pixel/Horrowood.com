$(document).ready(function(){
    let confirm = $("#confirm");

    $('.del-admin-but').on('click', function () {
        console.log("here");
        let delBut = $(this);
        confirm.addClass("show");

        $('.confirm-no').on('click', function () {
            confirm.removeClass("show");
        });
        $('.confirm-yes').on('click', function () {
            let id = delBut.attr("data-id");
            let scrpt = delBut.attr("data-script");
            location.href = scrpt + id;
        });
    });
});