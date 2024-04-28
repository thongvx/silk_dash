var page = window.location.pathname.replace('/', '');
function updateURLParameter(tab) {
    var urlParams = new URLSearchParams(window.location.search);
    tab ? urlParams.set('tab', tab) : '';
    var newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}

function loadContent(data_content) {
    updateURLParameter(data_content)
    var urlParams = new URLSearchParams(window.location.search);
    $('.tab-lifted').removeClass('tab-active !text-[#009FB2]')
    $('.'+data_content).addClass('tab-active !text-[#009FB2]')
    var url = page === 'video' ? '/loadPageVideo' : '/loadPage';
    // Sử dụng hàm
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            tab: data_content,
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
// $(document).ready(function() {
//     var urlParams = new URLSearchParams(window.location.search);
//     var content = urlParams.get('content') === null ? $('.tabs-lifted .tab:eq(0)').data('content') : urlParams.get('content');
//     loadContent(content, page);
// });
$(document).on('click', '.tab-lifted', function() {
    var data_content = $(this).data('content');
    loadContent(data_content);
});
