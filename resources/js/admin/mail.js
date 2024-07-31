$(document).on('change', '.user', function () {
    const form = $(this).closest('form')
    const button = form.find('button[type="submit"]')
    button.prop('disabled', false)
    button.addClass('bg-[#01545e] hover:bg-[#009fb2]').removeClass('bg-[#142132]')
})
$(document).on('submit', '#gift-mail', function () {
    event.preventDefault();
    var form = $(this);
    var formData = new FormData(form[0]);
    $.ajax({
        type: 'POST',
        url: '/email/send-discount-emails',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            location.reload();
        },
        error: function (response) {
            console.log(response);
        }
    });
})
