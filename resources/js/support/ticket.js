import {add_notification, updateOriginalFormState} from "../main.js";

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
            const message = 'Created successfully!';
            add_notification('success',message, button);
            updateOriginalFormState();
            $(form).find('input[type="file"]').val('');
        },
        error: function(response) {
            console.log(response);
        }
    });
})

$(document).on('click', '[btn-get-token]', function() {

    $.ajax({
        type: 'GET',
        url: '/regenerateToken',
        success: function(response) {
            $('#token').html(`Token: ${response.token}
                    <button class="rounded-lg ml-3 hover:text-[#009fb2] cursor-pointer" btn-get-token>
                        <i class="material-symbols-outlined opacity-1 text-2xl">autorenew</i>
                    </button>` );
            const div_notification = `<div class="justify-center w-full text-green-400 mt-2 items-center flex" id="noti-warning">
                                                <i class="material-symbols-outlined mr-2">done</i>
                                                Token regenerated successfully!
                                            </div>`
            $('#token').after(div_notification);
            setInterval(function() {
                $('#noti-warning').remove();
            }, 2000);
        },
        error: function(response) {
            const div_notification = `<div class="justify-center w-full text-red-400 mt-2 items-center flex" id="noti-warning">
                                        <i class="material-symbols-outlined mr-2">error</i>
                                        Token regenerated failed!
                                    </div>`
            $('#token').before(div_notification);
            setInterval(function() {
                $('#noti-warning').remove();
            }, 2000);
        }
    });
})

$(document).on('click', '#list-menu-api li', function() {
    $('#list-menu-api li').removeClass('bg-[#009fb2]');
    this.classList.add('bg-[#009fb2]')
})
