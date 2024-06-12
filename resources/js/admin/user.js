import { updateURLParameter } from '../main.js';

function loadUser(data_content, page) {
    updateURLParameter(data_content, '', '', '', '', page, '');
    $('.tab-user').removeClass('tab-active !text-[#009FB2]')
    $('.'+data_content).addClass('tab-active !text-[#009FB2]')
    // Sử dụng hàm
    $.ajax({
        url: '/admin/user',
        type: 'POST',
        data: {
            tab: data_content,
            page: page,
        },
        beforeSend: function() {
            $('#box-user').html(`<div class="w-full justify-center items-center flex h-full">
                                        <div class="flex text-white my-20 items-center">
                                            <div class="loading">
                                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                            </div>
                                            <span>Loading</span>
                                        </div>
                                    </div>`);
        },
        success: function(response) {
            $('#box-user').html(response);
        },
        error: function (error) {
            console.log(error)
        }

    });
}
$(document).on('click', '.tab-user', function() {
    var data_content = $(this).data('content');
    loadUser(data_content, 1);
});
$(document).on('click', '.page-user', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var data_content = urlParams.get('tab');
    const page = $(this).data('page');
    loadUser(data_content, page)
});

// get datatable
function loadDatatable(tab,column, direction, folderId, limit, page ) {
    updateURLParameter(tab, column, direction, folderId, limit, page);
    $('.tab-user').removeClass('tab-active !text-[#009FB2]')
    $('.'+tab).addClass('tab-active !text-[#009FB2]')
    // Sử dụng hàm
    $.ajax({
        url: '/datatable',
        type: 'POST',
        data: {
            tab: tab,
            page: page,
            column: column,
            direction: direction,
            folderId: folderId,
            limit: limit,

        },
        beforeSend: function () {
            $('#datatable').html(`<div class="w-full justify-center items-center flex h-full">
                                        <div class="flex text-white my-20 items-center">
                                            <div class="loading">
                                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                            </div>
                                            <span>Loading</span>
                                        </div>
                                    </div>`);
        },
        success: function (response) {
            $('#datatable').html(response);
        },
        error: function (error) {
            console.log(error)
        }
    })
}
$(document).on('click', '.sortable-column', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const column = $(this).data('column');
    const direction = $(this).attr('aria-sort') === 'desc' ? 'asc' : 'desc';
    const folderId = urlParams.get('folderId') === null ? '' : urlParams.get('folderId');
    const limit = urlParams.get('limit') === null ? '' : urlParams.get('limit');
    const page= '';
    const tab = urlParams.get('tab');
    loadDatatable(tab,column, direction, folderId, limit, page, );
})
