// Load image
$(document).on('change', '.file-img', function() {
    File_image(this);
});
// Load image
function File_image(input){
    var file = input.files[0];
    if (!(file instanceof Blob)) {
        console.error('The file is not a Blob object');
        return;
    }
    var box_img = $(input).closest('.box-img');
    var reader = new FileReader();
    box_img.find('img').removeClass('hidden');
    reader.onload = function(e){
        box_img.find('img').attr('src', e.target.result);
    };
    reader.readAsDataURL(file);
}
