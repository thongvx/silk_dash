import { notification } from '../main.js';
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
// update setting
var formChanged = false;

$(document).on('change', 'form input, form select, form textarea', function() {
    formChanged = true;
    $('button[type="submit"]').removeAttr('disabled');
});
$(document).on('submit', '#form-setting', function(e) {
    e.preventDefault();
    var form = this;
    var formData = $(form).serialize();
    var useID = $(form).attr('useID');
    $(form).find('input[type=checkbox]:not(:checked)').each(function() {
        formData += '&' + encodeURIComponent($(this).attr('name')) + '=0';
    });
    // Post data to the server
    $.ajax({
        type: 'PATCH',
        url: '/setting/'+useID,
        data: formData,
        success: function(response) {
            notification('success', 'Profile setting successfully');
        },
        error: function(response) {
            // Handle error here
            console.log(response);
        }
    });
});
$(document).on('submit', '#form-profile', function(e) {
    e.preventDefault();
    var form = this;
    var formData = $(form).serialize();
    $(form).find('input[type=checkbox]:not(:checked)').each(function() {
        formData += '&' + encodeURIComponent($(this).attr('name')) + '=0';
    });
    // Post data to the server
    $.ajax({
        type: 'POST',
        url: '/update-profile',
        data: formData,
        success: function(response) {
            notification('success', 'Profile updated successfully');
        },
        error: function(response) {
            if (response.responseJSON && response.responseJSON.errors) {
                var errors = response.responseJSON.errors;
                for (var field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errors[field].forEach(function(error) {
                            notification('warning', error);
                        });
                    }
                }
            } else {
                console.log(response);
            }
        }
    });
});
