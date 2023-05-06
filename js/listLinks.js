$(document).ready(function(){
    $(document).on('click', '.selectDropdown ul li', function(){

        let listcode = $(this).attr('id');
        let epAmount = $('.ep-amount').attr("id");
        // console.log(epAmount);

        if(listcode){
            $.ajax({
                url:"http://horrowood.com/functions/listManageFunc.php",
                method:"GET",
                cache: false,
                 data:{'do': listcode,
                'ep-amount': epAmount },
                 dataType:"html",
                success:function(response)
                {
                    if(response == 'dlt'){
                        $('#dlt').removeClass("active");
                        $('#dlt').parent().next().text("Добавить в список");
                    }
                  console.log(response);
                }
                });
        }
      });
});