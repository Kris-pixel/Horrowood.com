

    $('.bbutton.comment-button.file-btn').on( "click", function() {
       $('input[type=file]').trigger('click');
    });
    $('input[type=file]').on('change', function() {
        let file = this.files[0].name;
        $('label.file-name').text(file);
    });

   $(document).on('click', 'input[name=submit]', function(){
        $('.er-title').text("");
        $('.er-text').text("");
        $('.er-topic').text("");
        $('.er-img').text("");

        let title = $("input[name=title]").val();
        let text = $("textarea[name=description]").val();
        let topic = $("input[name=topic]").val();
        // let img = $("input[type=file]")[0].files[0].name;
        let img = $("input[type=file]")[0].files.lenth;
        let imgName;

        if(!title){
            $('.er-title').text("Заполните поле");
        }
        if(!text){
            $('.er-text').text("Заполните поле");
        }
        if(!topic){
            $('.er-topic').text("Заполните поле");
        }
        if(!img){
            $('.er-img').text("Выберите обложку");
        }

        if(title && text && topic && img){
            imgName = $("input[type=file]")[0].files[0].name;
            var data = new FormData();

            // заполняем объект данных файлами в подходящем для отправки формате
            $.each( img, function( key, value ){
                data.append( key, value );
            });
            data.append( 'title', title );
            data.append( 'text', text );
            data.append( 'topic', topic );
            data.append( 'img', imgName );

            $.ajax({
                url:"../functions/admin/newArticle.php",
                method:"POST",
                cache: false,
                processData: false,
                contentType : false,
                data:data,
                dataType:"json",
                success:function(data)
                {
                    console.log('here');
                   location.href='http://horrowood.com/index.php?action=admin';
                }
                });
        }
    });