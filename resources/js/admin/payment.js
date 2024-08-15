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
            location.reload();
        },
        error: function(response) {
            console.log(response);
        }
    })
})
$(document).on('click', '[btn-edit-payment]', function() {
    const tr = $(this).closest('tr');
    const comment = tr.find('[input-comment]')
    $(comment).addClass('border border-gray-600 py-1 rounded-lg');
    $(comment).removeAttr('readonly');
    const icon = $(this).find('i');
    $(icon).text('check');
    $(this).attr('btn-submit-payment', '');
    $(this).removeAttr('btn-edit-payment');
})
