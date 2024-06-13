
//updateURLParameter
function updateURLParameter(tab, column, direction, folderId, limit, page, poster, status) {
    var urlParams = new URLSearchParams(window.location.search);
    tab ? urlParams.set('tab', tab) : urlParams.delete('tab');
    column ? urlParams.set('column', column) : urlParams.delete('column');
    direction ? urlParams.set('direction', direction): urlParams.delete('direction');
    folderId ? urlParams.set('folderId', folderId) : urlParams.delete('folderId');
    limit ? urlParams.set('limit', limit) : urlParams.delete('limit');
    page ? urlParams.set('page', page) : urlParams.delete('page');
    poster ? urlParams.set('poster', poster) : urlParams.delete('poster');
    status ? urlParams.set('status', status) : urlParams.delete('status');
    const newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}

//geturlparams
export function getUrlParams() {
    const urlParams = new URLSearchParams(window.location.search);
    return {
        column: urlParams.get('column') || '',
        direction: urlParams.get('direction') || '',
        folderId: urlParams.get('folderId') || '',
        poster: urlParams.get('poster') || '',
        limit: urlParams.get('limit') || '',
        page: urlParams.get('page') || '',
        status: urlParams.get('status') || '',
        tab: urlParams.get('tab') || ''
    };
}

// highlight sorted column
function highlightSortedColumn() {
    const sortColumn = document.querySelectorAll("[aria-sort]");
    const Table = $("#datatable")[0];
    const sortColumntable = Table.dataset.columnTable
    const sortDirectionTable = Table.dataset.columnDirection
    sortColumn.forEach(function (element) {
        if ($(element).data('column') === sortColumntable) {
            $(element).attr('aria-sort', sortDirectionTable);
            $(element).find('.' + sortDirectionTable).addClass("opacity-100");
            $(element).find('.' + sortDirectionTable).removeClass("opacity-50");
        }
    });
}
export function loadDatatable(tab,column, direction, folderId, poster, limit, page, status ) {
    updateURLParameter(tab, column, direction, folderId, limit, page, poster, status);
    const path = window.location.pathname;
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
            poster: poster,
            limit: limit,
            status: status,
            path: path
        },
        beforeSend: function () {
            $('#box-datatable, .box-datatable').html(`<div class="w-full justify-center items-center flex h-full">
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
            $('#box-datatable, .box-datatable').html(response);
            $('#total-encoder').text('Encoder: '+ $('#datatable').data('total'))
            $('#sever').text('Server: '+ $('#datatable').data('total'))
            highlightSortedColumn();
        },
        error: function (error) {
            console.log(error)
        }
    })
}

// sort column
$(document).on('click', '.sortable-column', function() {
    const params = getUrlParams();
    params.column = $(this).data('column');
    params.direction = $(this).attr('aria-sort') === 'desc' ? 'asc' : 'desc';
    params.page = 1;
    loadDatatable(params.tab, params.column, params.direction, params.folderId, params.poster, params.limit, params.page, params.status);
})

// pagination
$(document).on('click', '.page-datatable', function() {
    const params = getUrlParams();
    params.page = $(this).data('page');
    loadDatatable(params.tab, params.column, params.direction, params.folderId, params.poster, params.limit, params.page, params.status);
});

// limit
$(document).on('change', '#limit', function() {
    const params = getUrlParams();
    params.limit = $(this).val();
    loadDatatable(params.tab, params.column, params.direction, params.folderId, params.poster, params.limit, params.page, params.status);
});
