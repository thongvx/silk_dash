import { notification, updateOriginalFormState } from '../main.js';

var fixedProfileCard = $("[fixed-profile-card]");
var fixedProfileCloseButton = $("[fixed-profile-close-button]");
function fixedBox() {
    fixedProfileCard.toggleClass("opacity-0");
    fixedProfileCard.toggleClass("opacity-1");
    fixedProfileCard.toggleClass("hidden");
    fixedProfileCard.toggleClass("block");
}
fixedProfileCloseButton.on("click", function () {
    fixedBox()
});
// update setting

$(document).on('submit', '#form-setting', function(e) {
    e.preventDefault();
    var form = this;
    var formData = new FormData(form);
    const button = $(form).find('button[type="submit"]');
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
            button.removeClass('bg-blue-400 hover:bg-blue-700')
            button.addClass('bg-[#142132]')
            button.attr('disabled', 'disabled');
            updateOriginalFormState();
            $('[btn-delete-selected]').addClass('hidden');
            $(form).find('input[type="file"]').val('');
        },
        error: function(response) {
            console.log(response);
        }
    });
});
// update profile
$(document).on('submit', '#form-profile', function(e) {
    e.preventDefault();
    var form = this;
    var formData = $(form).serialize();
    const button = $(form).find('button[type="submit"]');
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
            button.removeClass('bg-blue-400 hover:bg-blue-700')
            button.addClass('bg-[#142132]')
            button.attr('disabled', 'disabled');
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
//change password
$(document).on('click', '[btn-change-password]', function() {
    fixedBox()
    $(document).on('submit', '#profile', function(e) {
        e.preventDefault();
        const button = $(this).find('button[type="submit"]');
        var form = this;
        var formData = new FormData(form);
        // Post data to the server
        $.ajax({
            type: 'POST',
            url: '/change-password',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                notification('success', 'Change password successfully');
                button.removeClass('bg-blue-400 hover:bg-blue-700')
                button.addClass('bg-[#142132]')
                button.attr('disabled', 'disabled');
                updateOriginalFormState();
                $('#profile .error').hide()
                fixedBox()
                form.reset();
            },
            error: function(response) {
                if (response.responseJSON && response.responseJSON.errors) {
                    var errors = response.responseJSON.errors;
                    for (var field in errors) {
                        if (errors.hasOwnProperty(field)) {
                            errors[field].forEach(function(error) {
                                $('#profile .error').show()
                                $('#profile .error').text(error)
                            });
                        }
                    }
                } else {
                    console.log(response);
                }
            }
        });
    });
})
