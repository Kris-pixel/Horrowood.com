$(document).ready(function(){
    let hintWidth = $('form.search-panel').css('width');
    let hintPos =  $('form.search-panel').position();
    let hintX = hintPos.left;
    let hintY = hintPos.top;
    let hintHeight = Number($('form.search-panel').css('height').slice(0,-2));
    console.log(hintWidth);
    console.log(hintY + hintHeight);

    $('#Search').css('width', hintWidth);
    $('#Search').css('left', hintX);
    $('#Search').css('top', hintY + hintHeight);



    $('#input-search').on('focus', function () {
        $(this).parent().css('outline', '1px solid #99FF33');
    });
    $('#input-search').on('blur', function () {
        $(this).parent().css('outline', 'none');
    });

    $('#input-search').on('input', function () {
        let search = $(this).val();

        $.ajax({
            type: "POST",
            url: "http://horrowood.com/functions/searchHintFunc.php",
            data: {"search": search},
            dataType: "html",
            success: function (response) {
                $('#txtHint').html(response);
            }
        });
    });
});