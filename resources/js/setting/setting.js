import {add_notification, updateOriginalFormState} from '../main.js';

var fixedProfileCloseButton = $("[fixed-profile-close-button]");
function fixedBox() {
    var fixedProfileCard = $("[fixed-profile-card]");
    fixedProfileCard.toggleClass("opacity-0");
    fixedProfileCard.toggleClass("opacity-1");
    fixedProfileCard.toggleClass("hidden");
    fixedProfileCard.toggleClass("flex");
}
$(document).on("click", '[fixed-profile-close-button]' , function () {
    fixedBox()
    $('#password, #email').addClass('hidden')
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
            const message = 'Account settings updated successfully!';
            add_notification('success',message, button);
            updateOriginalFormState();
            $('[btn-delete-selected]').addClass('hidden');
            $(form).find('input[type="file"]').val('');
        },
        error: function(response) {
            const message = 'Account settings updated fail!';
            add_notification('error',message, button);
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
            const message = 'Profile updated successfully!';
            add_notification('success',message, button);
            updateOriginalFormState();
        },
        error: function(response) {
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
});
//change password
$(document).on('click', '[btn-change-password]', function() {
    fixedBox()
    $('#password').removeClass('hidden')
    console.log('a')
    $(document).on('submit', '#password', function(e) {
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
                const message = 'Change password successfully!';
                add_notification('success',message, button);
                $('#password .error').hide()
                form.reset();
                setTimeout(() => {
                    fixedBox()
                    $('#password').addClass('hidden')
                }, 2000);
            },
            error: function(response) {
                if (response.responseJSON && response.responseJSON.errors) {
                    var errors = response.responseJSON.errors;
                    for (var field in errors) {
                        if (errors.hasOwnProperty(field)) {
                            errors[field].forEach(function(error) {
                                $('#password .error').show()
                                $('#password .error').text(error)
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

//change email
$(document).on('click', '[btn-change-email]', function() {
    fixedBox()
    $('#email').removeClass('hidden')
    $(document).on('submit', '#email', function(e) {
        e.preventDefault();
        const button = $(this).find('button[type="submit"]');
        var form = this;
        var formData = new FormData(form);
        // Post data to the server
        $.ajax({
            type: 'POST',
            url: '/change-email',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const message = 'Change email successfully!';
                add_notification('success',message, button);
                $('#email .error').hide()
                form.reset();
                setTimeout(() => {
                    fixedBox()
                    $('#email').addClass('hidden')
                }, 2000);
            },
            error: function(response) {
                if (response.responseJSON && response.responseJSON.errors) {
                    var errors = response.responseJSON.errors;
                    for (var field in errors) {
                        if (errors.hasOwnProperty(field)) {
                            errors[field].forEach(function(error) {
                                $('#email .error').show()
                                $('#email .error').text(error)
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

