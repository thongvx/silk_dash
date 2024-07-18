import {add_notification, updateOriginalFormState} from "../main.js";

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
            updateOriginalFormState();
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
$(document).on('click', '[btn-get-keyApi]', function() {

    $.ajax({
        type: 'GET',
        url: '/retryKeyApi',
        success: function(response) {
            $('#key_api').val(response.keyApi);
            const div_notification = `<div class="justify-center w-full text-green-400 mt-2 items-center flex" id="noti-warning">
                                                <i class="material-symbols-outlined mr-2">done</i>
                                                Token regenerated successfully!
                                            </div>`
            $('#box-key-api').after(div_notification);
            setInterval(function() {
                $('#noti-warning').remove();
            }, 2000);
        },
        error: function(response) {
            const div_notification = `<div class="justify-center w-full text-red-400 mt-2 items-center flex" id="noti-warning">
                                        <i class="material-symbols-outlined mr-2">error</i>
                                        Token regenerated failed!
                                    </div>`
            $('#box-key-api').before(div_notification);
            setInterval(function() {
                $('#noti-warning').remove();
            }, 2000);
        }
    });
})
