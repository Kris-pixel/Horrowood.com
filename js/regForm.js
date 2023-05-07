const regexEmail = new RegExp(/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/);
const regexPas = new RegExp(/^(?=.*\d)(?=.*[A-ZА-Я])(?=.*[a-zа-я])(?=.*[^\w\d\s:])([^\s]){8,16}$/);

$("input[name=login").on("input", function () {
    $('.er-login').text('');

    let val = $(this).val();
    if(val){
        $.ajax({
            url:"http://horrowood.com/functions/logInOut/checkLogin.php",
            method:"POST",
            cache: false,
            data:{
                'login': val
            },
            dataType:"html",
            success:function(response)
            {
                $('.er-login').text(response);
            }
            });
    }
});
$("input[name=passwor").on("input", function () {
    $('.er-password').parent().removeClass("pas");
});
$("input[type=button").on("click", function () {
    $('span[class^="er-"]').text('');
    $(".form-label.pas").removeClass("pas");

    let login =  $("input[name=login]").val();
    let email = $("input[name=email]").val();
    let password =  $("input[name=password]").val();
    let passwor2 =  $("input[name=password2]").val();
    let url =  $("input[name=url]").val();

    console.log(url);
    if(!login){
        $('.er-login').text("Заполните поле");
    }
    if(!email){
        $('.er-email').text("Заполните поле");
    }else if(!regexEmail.test(email)){
        $('.er-email').text("Некорректные данные");
    }
    if(!password){
        $('.er-password').text("Заполните поле");
    }else if(password.length < 4){
        $('.er-password').parent().addClass("pas");
        $('.er-password').text("Пароль должен содержать не менее 8 символов");   
    }else if(!regexPas.test(password)){
        $('.er-password').parent().addClass("pas");
        $('.er-password').text("Пароль должен содержать заглавные и строчные буквы, цифры, символы");
        // нельзя пробел в пароль добавить
        // любой символ кроме пробела
    }
    if(!passwor2){
        $('.er-password2').text("Заполните поле");
    }else if(!(password === passwor2)){
        $('.er-password2').text("Пароли не совпадают");
    }
    let check = login && regexEmail.test(email) && regexPas.test(password) && (password === passwor2);
    console.log(check);

    if(check){
        $.ajax({
            url:"http://horrowood.com/functions/logInOut/regForm.php",
            method:"POST",
            cache: false,
            data:{
                'login': login,
                'email': email,
                'password': password
            },
            dataType:"html",
            success:function(response)
            {
                if(response.includes("Вы успешно зарегистрированы")){
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
                        }
                        });
                    alert (response);
                    location.assign(url);
                }else{
                    $('.er-login').text(response);
                }       
            }
            });
    }
});