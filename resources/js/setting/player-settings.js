import {add_notification} from "../main.js";
import {fixedBox} from "../jsVideo/video.js";

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
            const message = 'Profile updated successfully!';
            add_notification('success',message, button);
        },
        error: function (response) {
            if (response.responseJSON && response.responseJSON.errors) {
                var errors = response.responseJSON.errors;
                for (var field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errors[field].forEach(function(error) {
                            add_notification('warning',error, button);
                        });
                    }
                }
            } else {
                console.log(response);
            }
        }
    });
})
