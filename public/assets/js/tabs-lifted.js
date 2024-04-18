// $(document).ready(function () {
//     $('.tab-content').hide();
//     $('#' + $('.tabs-lifted .tab:eq(0)').data('content')).show();
//     let nametable = '#'+$('.tabs-lifted .tab:eq(0)').data('content')+'-table'
//     $('.tab-lifted').click(function () {
//         $('#title').html($(this).data('title'))
//         let nametable = '#'+$(this).data('content')+'-table'
//         var boxFifted = this.closest('[box-lifted]')
//         var btnTab = boxFifted.querySelectorAll('.tab-lifted');
//         var tabContent = boxFifted.querySelectorAll('.tab-content');
//         $(btnTab).removeClass('tab-active !text-green-400 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
//         $(this).addClass('tab-active !text-green-400 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
//         let contentToShow = $(this).data('content');
//         $(tabContent).hide();
//         $('#' + contentToShow).show();
//     });
// });
var page = $('[box-lifted]').data('page');
function updateURLParameter(content, page) {
    var urlParams = new URLSearchParams(window.location.search);
    page ? urlParams.set('page', page) : '';
    content ? urlParams.set('content', content) : '';
    var newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}
function loadContent(data_content, page) {
    updateURLParameter(data_content, page)
    $('.tab-lifted').removeClass('tab-active !text-emerald-500 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
    $('.'+data_content).addClass('tab-active !text-emerald-500 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
    if(data_content === 'webupload') {
        $('#box-list-upload').addClass('hidden')
    }else{
        $('#box-list-upload').removeClass('hidden')
    }
    // Sử dụng hàm
    $.ajax({
        url: "/loadPage",
        type: 'GET',
        data: {
            content: data_content,
            page: page
        },
        success: function(response) {
            $('#box-content').html(response);
        }
    });
}
$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var content = urlParams.get('content') === null ? $('.tabs-lifted .tab:eq(0)').data('content') : urlParams.get('content');
    loadContent(content, page);
    if (document.querySelector("[file-upload]")) {
        loadJS("assets/js/upload/uploadFile.js", true);
    }
});
$(document).on('click', '.tab-lifted', function() {
    var data_content = $(this).data('content');
    loadContent(data_content, page);
    if (document.querySelector("[file-upload]")) {
        Upload_FILE()
    }
});
