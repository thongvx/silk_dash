import {notification, updateOriginalFormState} from "../main.js";

$(document).on('submit', '#ticket-form', function(e) {
    e.preventDefault();
    button = $(this).find('[btn-save]');
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

$(document).on('click', '[btn-get-token]', function() {
    const ab = 'jfhjkafshas'

    $.ajax({
        type: 'GET',
        url: '/regenerateToken',
        success: function(response) {
            $('#token').html(`Token: ${response.token}
                    <button class="rounded-lg ml-3 hover:text-[#009fb2] cursor-pointer" btn-get-token>
                        <i class="material-symbols-outlined opacity-1 text-2xl">autorenew</i>
                    </button>` );
            $('#key_api').val(response.token);
            notification('success', 'Token regenerated successfully');
        },
        error: function(response) {
            console.log(response);
            notification('error', 'Token regenerated failed')
        }
    });
})

$(document).on('click', '#list-menu-api li', function() {
    $('#list-menu-api li').removeClass('bg-[#009fb2]');
    this.classList.add('bg-[#009fb2]')
})
