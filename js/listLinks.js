$(document).ready(function(){
    $(document).on('click', '.selectDropdown ul li', function(){

        let listcode = null;
        console.log($(this).children().html());
        switch ($(this).children().html()) {
            case 'Смотрю':
                listcode = 's';
                break;
            case 'Брошено':
                listcode = 't';
                break;
            case 'Запланировано':
                listcode = 'p';
                break;
            case 'Просмотрено':
                listcode = 'w';
                break;
            case 'Читаю':
                listcode = 's';
                break;
            case 'Прочитано':
                listcode = 'w';
                break;
            case 'Удалить из списка':
                listcode = 'dlt';
                break;
            default:
                break;
        };

        if(listcode){
            console.log('ifff');
            $.ajax({
                url:"http://horrowood.com/functions/listManageFunc.php",
                method:"GET",
                cache: false,
                 data:{'do': listcode },
                 dataType:"html",
                success:function()
                {
                  console.log('data updated');
                }
                });
        }
      });
});