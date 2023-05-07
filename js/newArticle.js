let coverFiles;

   $('.bbutton.comment-button.file-btn').on( "click", function() {
       $('input[type=file]').trigger('click');
    });
    $('input[type=file]').on('change', function() {
        let file = this.files;
        coverFiles = file;
        $('label.file-name').text(file[0].name);
    });

   $(document).on('click', 'input[name=submit]', function(){
    $('span[class^="er-"]').text('');

        let title = $("input[name=title]").val();
        let text = $("textarea[name=description]").val();
        let topic = $("input[name=topic]").val();
        let img = $("input[name=img]").val();
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
            $.each( coverFiles, function( key, value ){
                data.append( key, value );
            });
            data.append( 'title', title );
            data.append( 'text', text );
            data.append( 'topic', topic );
            data.append( 'img', imgName );

            $.ajax({
                url:"http://horrowood.com/functions/admin/newArticle.php",
                method:"POST",
                cache: false,
                processData: false,
                contentType : false,
                data:data,
                dataType:"json",
                success:function(data)
                {
                    console.log('here');
                   location.href='http://horrowood.com/index.php?action=admin&tab=Article&page=1';
                }
                });
        }
    });