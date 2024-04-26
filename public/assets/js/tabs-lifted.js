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
    var urlParams = new URLSearchParams(window.location.search);
    $('.tab-lifted').removeClass('tab-active !text-[#009FB2] md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
    $('.'+data_content).addClass('tab-active !text-[#009FB2] md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
    var url = page === 'videos' ? '/loadPageVideo' : '/loadPage';
    // Sử dụng hàm
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            content: data_content,
            page: page,
            folderId: urlParams.get('folderId')
        },
        beforeSend: function() {
            $('#box-content').html(`<div class="w-full justify-center items-center flex h-full">
                                <div class="flex text-white my-20">
                                    <div class="loading"></div>
                                    <span class="ml-3">Loading</span>
                                </div>
                            </div>`);
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
});
$(document).on('click', '.tab-lifted', function() {
    var data_content = $(this).data('content');
    loadContent(data_content, page);
    setTimeout(() => {
        if ($("#webupload").length > 0) {
            Upload_FILE()
            console.log('b')
        }
    }, 1000);

});
