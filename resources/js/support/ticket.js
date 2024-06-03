import {notification, updateOriginalFormState} from "../main.js";

$(document).on('submit', '#ticket-form', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: '/support',
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
})
