$(document).on('click', '.tab-premium', function() {
    $('.tab-premium').removeClass('bg-[#009FB2]').addClass('bg-[#142132]');
    const data = $(this).data('plan');
    $(this).addClass('bg-[#009FB2]').removeClass('bg-[#142132]');
    $('.plan').hide()
    $('#'+data).show();
})
