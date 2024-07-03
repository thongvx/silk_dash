import {notification} from "../main.js";

$(document).on('submit', '#form-player-setting', function (e) {
    e.preventDefault();
    var form = this;
    const button = $(form).find('button[type="submit"]');
    var formData = new FormData(form);
    $(form).find('input[type=checkbox]:not(:checked)').each(function() {
        formData.append($(this).attr('name'), 0);
    });
    // Post
    $.ajax({
        type: 'POST',
        url: '/update-player',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            notification('success', 'Profile updated successfully');
            button.removeClass('bg-blue-400 hover:bg-blue-700')
            button.addClass('bg-[#142132]')
            button.attr('disabled', 'disabled');
        },
        error: function (response) {
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
})
