import { notification, updateOriginalFormState } from '../main.js';
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

$(document).on('submit', '#form-setting', function(e) {
    e.preventDefault();
    var form = this;
    var formData = new FormData(form);
    var useID = $(form).attr('useID');
    $(form).find('input[type=checkbox]:not(:checked)').each(function() {
        formData.append($(this).attr('name'), 0);
    });
    // Post data to the server
    $.ajax({
        type: 'POST',
        url: '/updatesetting',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            notification('success', 'Setting successfully');
            $(form).find('button[type="submit"]').removeClass('bg-blue-400 hover:bg-blue-700')
            $(form).find('button[type="submit"]').addClass('bg-[#142132]')
            $(form).find('button[type="submit"]').attr('disabled', 'disabled');
            updateOriginalFormState();
        },
        error: function(response) {
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
            $(form).find('button[type="submit"]').removeClass('bg-blue-400 hover:bg-blue-700')
            $(form).find('button[type="submit"]').addClass('bg-[#142132]')
            $(form).find('button[type="submit"]').attr('disabled', 'disabled');
            updateOriginalFormState();
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
