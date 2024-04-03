$(document).ready(function () {
    $('.tab-content').hide();
    $('#' + $('.tabs-lifted .tab:eq(0)').data('content')).show();
    let nametable = '#'+$('.tabs-lifted .tab:eq(0)').data('content')+'-table'
    $('.tab-lifted').click(function () {
        $('#title').html($(this).data('title'))
        let nametable = '#'+$(this).data('content')+'-table'
        var boxFifted = this.closest('[box-lifted]')
        var btnTab = boxFifted.querySelectorAll('.tab-lifted');
        var tabContent = boxFifted.querySelectorAll('.tab-content');
        $(btnTab).removeClass('tab-active !text-green-400 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
        $(this).addClass('tab-active !text-green-400 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
        let contentToShow = $(this).data('content');
        $(tabContent).hide();
        $('#' + contentToShow).show();
    });
});
