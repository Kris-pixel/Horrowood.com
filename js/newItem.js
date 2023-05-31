let errorMessage = 'Выберите файлы';
const regex = new RegExp(/^https?:\/\/(?:www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b(?:[-a-zA-Z0-9()@:%_\+.~#?&\/=]*)$/);
let frames;
let coverFiles;
let formName = '';
let existCheck = '';

$('.bbutton.comment-button.file-btn').on( "click", function() {
    $(this).prev().trigger('click');
 });
 $('input[type=file]').on('change', function() {
    let label='';
    frames =this.files;
    // console.log(frames);
    if($(this).attr("multiple")){
        if(frames.length < 3){
            errorMessage ="Выберите 3 файла";
        }
        if(frames.length > 3){
            errorMessage = "Слишком много файлов";
        }
        if(frames.length == 3){
            errorMessage = "";
        }
    }else{
        coverFiles = frames;
    }

    for(let i=0; i<frames.length; i++){
       label += frames[i].name +"<br>";
    }
    $(this).next().next().html(label);
 });

 $(document).on('click', 'input[name=submit]', function(){
    $('span[class^="er-"]').text('');

    formName = $(".newitem-form").attr("id");
    let title = $("input[name=title]").val();
    let origTitle = $("input[name=orig-title]").val();
    let author = $("input[name=author]").val();
    let country = $("input[name=country]").val();
    let releaseDate = $("input[name=release-date]").val();
    let status = $("select[name=status]").val();
    let type = $("select[name=type]").val();
    let trailer = $("input[name=trailer]").val();
    let episodeAmount = $("input[name=episode-amount]").val();
    let duration = $("input[name=duration]").val();
    let rating = $("select[name=raiting]").val();
    let genre = $(".selectMultiple div:first-child a").length;
    let description = $("textarea[name=description]").val();
    let cover = $("input[name=img]").val();
    // let frames = $("input[name=frames]").val();

    // console.log(formName);
    // console.log(title);
    // console.log(origTitle);
    // console.log(country);
    // console.log(releaseDate);
    // console.log(status);
    // console.log(type);
    // console.log(rating);
    // console.log(episodeAmount);
    // console.log(duration);
   
    // console.log(description);
    // console.log(cover);
    // console.log(frames);

    if(!title){
        $('.er-title').text("Заполните поле");
    }
    if(!origTitle){
        $('.er-orig-title').text("Заполните поле");
    }
    if(!author){
        $('.er-author').text("Заполните поле");
    }
    if(!country){
        $('.er-country').text("Заполните поле");
    }
    if(!releaseDate){
        $('.er-release-date').text("Введите дату");
    }
    if(status == 0){
        $('.er-status').text("Выберите значение");
    }
    if(type == 0){
        $('.er-type').text("Выберите значение");
    }
    if(rating == 0){
        $('.er-rating').text("Выберите значение");
    }
    if(episodeAmount == 0){
        $('.er-ep-amount').text("Заполните поле");
    }
    if(duration == 0){
        $('.er-duration').text("Заполните поле");
    }
    if(!genre){
        $('.er-genre').text("Выберите 1 или несколько поджанров");
    }
    if(!description){
        $('.er-description').text("Заполните поле");
    }
    if(!cover){
        $('.er-img').text("Выберите файл");
    }
    let check = title && origTitle && author && country && releaseDate && status && rating 
                && type && episodeAmount && duration && genre && cover;
// console.log(regex.test(trailer));
    if(formName == 'f' ){
       
        $('.er-frames').text(errorMessage);

        if(!trailer){
            $('.er-trailer').text("Заполните поле");
        }else if(!regex.test(trailer)){
            $('.er-trailer').text("Некорректный адрес");
        }
        check = check &&  !errorMessage && trailer;
    }
    // console.log(check);
    if(check){
        // console.log(frames);
        // console.log(coverFiles);

        let genres = '';
        $(".selectMultiple div:first-child a").each(function( index ) {
            genres += $(this).attr('id') + ' ';
        });
        genres = genres.slice(0, genres.length - 1);
        var data = new FormData();
        data.append('id-prefix', formName );
        data.append('title', title);
        data.append('orig-title', origTitle);
        data.append('author', author);
        data.append('country', country);
        data.append('release-date', releaseDate);
        data.append('status', status);
        data.append('type', type);
        data.append('rating', rating);
        data.append('ep-amount', episodeAmount);
        data.append('duration', duration);
        data.append('description', description);
        data.append('genres', genres);
        $.each( coverFiles, function( key, value ){
            data.append( key, value );
        });
        
        if(formName == "f"){
            $.each( frames, function( key, value ){
                data.append( key+1, value );
            });
            data.append('trailer', trailer);
        }

        $.ajax({
            url:"../functions/admin/ckecknewindb.php",
            method:"POST",
            cache: false,
            processData: false,
            contentType : false,
            data:data,
            dataType:"html",
            success:function(response)
            {
                existCheck = response;
                if(response != ''){
                    let modal = $("#modal");

                    $(".modal-div input[value=ОК]").on("click", function () {
                        modal.removeClass("show");
                    });
                
                
                    $("h1.modal-name").html("Такая запись<br> уже существует базе данны!");
                    $("#modal .modal-div div").html("<img src='http://horrowood.com/img/icons/info.png' alt='info.png' title='info.png'>");
                    modal.addClass("show");
                }else{
                     $.ajax({
                url:"../functions/admin/newItem.php",
                method:"POST",
                cache: false,
                processData: false,
                contentType : false,
                data:data,
                dataType:"json",
                success:function(response)
                {
                    if(formName == 'f'){
                        location.href='http://horrowood.com/index.php?action=admin&tab=Film&page=1';
                    }else if(formName == 'b'){
                        location.href='http://horrowood.com/index.php?action=admin&tab=Book&page=1';
                    }
                }
                });
                       
                }
            }
            });
           

    }

 });