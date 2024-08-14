$(document).on('click', '[btn-submit-payment]', function() {
    const tr = $(this).closest('tr');
    const comment = tr.find('[input-comment]').val();
    const status = tr.find('[select-status]').val();
    const id = tr.data('id');
    $.ajax({
        url: '/admin/payment/' + id,
        method: 'PUT',
        data: {
            comment: comment,
            status: status
        },
        success: function(response) {
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
    })
})
