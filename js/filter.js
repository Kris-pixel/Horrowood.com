$(document).ready(function(){
    $(document).on('click', '.selectDropdown ul li', function(){
        let status = $("#status").val();
        let type = $("#type").val();
        let genre = $("#genre").val();
        let raiting = $("#raiting").val();
        let year = $("#year").val();
        let sort = $("#sort").val();
        let action = $("form.dropdown-filter").attr("id");
        console.log(status);
        console.log(type);
        console.log(genre);
        console.log(raiting);
        console.log(year);
        console.log(sort);
        console.log(action);

            $.ajax({
                url:"http://horrowood.com/functions/filterFunc.php",
                method:"GET",
                cache: false,
                data:{'status': status,
                    'type': type,
                    'genre':genre,
                    'raiting': raiting,
                    'year': year,
                    'sort':sort,
                    'action':action},
                dataType:"html",

                success:function(data)
                {
                   console.log("succes");
                   $("#content-place").text("");
                   $("#content-place").html(data);
                }
                });
    });    
});