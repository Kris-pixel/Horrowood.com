
$('.bbutton.comment-button.file-btn').on( "click", function() {
    $('input[type=file]').trigger('click');
 });
 $('input[type=file]').on('change', function() {
     let file = this.files[0].name;
     $('label.file-name').text(file);
 });