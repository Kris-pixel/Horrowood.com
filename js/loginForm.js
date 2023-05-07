$("input[type=button").on("click", function () {
    $('span[class^="er-"]').text('');

    let login =  $("input[name=login]").val();
    let password =  $("input[name=password]").val();
    let url =  $("input[name=url]").val();

    console.log(url);
    if(!login){
        $('.er-login').text("Заполните поле");
    }
    if(!password){
        $('.er-password').text("Заполните поле");
    }

    if(login && password){
        $.ajax({
            url:"http://horrowood.com/functions/logInOut/login.php",
            method:"POST",
            cache: false,
            data:{
                'login': login,
                'password': password
            },
            dataType:"html",
            success:function(response)
            {
                if(response == "Логина не существует!"){
                    $('.er-login').text(response);
                } else if(response == "неверный пароль"){
                    $('.er-password').text(response);
                }else if(response == ""){
                    location.href= url;
                }           
            }
            });
    }
});