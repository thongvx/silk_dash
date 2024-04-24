function btn_video(){
    var rows_checked = $('table').find('tbody .checkbox:checked').length;
    if (rows_checked > 0) {
        $('button[btn-video]').prop('disabled', false);
        $('button[btn-video]').removeClass('cursor-not-allowed')
        $('button[btn-video]').addClass('hover:text-[#009FB2]')
    } else {
        $('button[btn-video]').prop('disabled', true);
        $('button[btn-video]').addClass('cursor-not-allowed')
        $('button[btn-video]').removeClass('hover:text-[#009FB2]')
    }

}
$(document).on('click', '[checked-All]', function () {
    var isChecked = $(this).prop('checked');
    $(this).closest('table').find('input[type="checkbox"]').prop('checked', isChecked);
    btn_video()
})
$(document).on('click', '.checkbox',function(){
    var table = this.closest('table');
    var rows = $(table).find('tbody .checkbox').length;
    var rows_checked = $(table).find('tbody .checkbox:checked').length;
    var checkBoxAll = $(table).find('[checked-All]');
    if (rows_checked < rows) {
        checkBoxAll.prop('checked', false);
    } else {
        checkBoxAll.prop('checked', true);
    }
    btn_video()
});// Hàm để update giá trị của URL Parameters
function highlightSortedColumn() {
    var sortColumn = document.querySelectorAll("[aria-sort]");
    var Table = document.querySelector("[datatable]");
    var sortColumntable = Table.dataset.columnTable
    var sortDirectionTable = Table.dataset.columnDirection
    sortColumn.forEach(function (element) {
        if ($(element).data('column') === sortColumntable) {
            $(element).attr('aria-sort', sortDirectionTable);
            $(element).find('.' + sortDirectionTable).addClass("opacity-100");
            $(element).find('.' + sortDirectionTable).removeClass("opacity-50");
        }
    });
}
highlightSortedColumn()
function updateURLParameterVideo(column,direction,folderId,limit,page) {
    var urlParams = new URLSearchParams(window.location.search);
    column ? urlParams.set('column', column): '';
    direction ? urlParams.set('direction', direction): '';
    folderId ? urlParams.set('folderId', folderId) : '';
    limit ? urlParams.set('limit', limit) : '';
    page ? urlParams.set('page', page) : '';
    var newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}

$(document).on('click', '.sortable-column', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var column = $(this).data('column');
    var direction = $(this).attr('aria-sort') === 'desc' ? 'asc' : 'desc';
    var folderId = urlParams.get('folderId') === null ? '' : urlParams.get('folderId');
    var limit = urlParams.get('limit') === null ? '' : urlParams.get('limit');
    var page= '';
    updateURLParameterVideo(column,direction,folderId,limit,page)
    $.ajax({
        url: "/control",
        type: 'GET',
        data: {
            column: column,
            direction: direction,
            folderId: folderId,
            limit: limit
        },
        success: function(response) {
            $('#live').html(response);
            highlightSortedColumn()
        }
    });
});
$(document).on('click', '.page', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var column = urlParams.get('column') === null ? 'created_at' : urlParams.get('column');
    var direction = urlParams.get('direction') === null ? 'asc' : urlParams.get('direction');
    var folderId = urlParams.get('folderId') === null ? '' : urlParams.get('folderId');
    var limit = urlParams.get('limit') === null ? '' : urlParams.get('limit');
    var page = $(this).data('page');
    updateURLParameterVideo(column,direction,folderId,limit,page)
    $.ajax({
        url: "/control",
        type: 'GET',
        data: {
            column: column,
            direction: direction,
            folderId: folderId,
            limit: limit,
            page: page
        },
        beforeSend: function() {
            $('#live').html(`<div class="w-full justify-center items-center flex h-full">
                                <div class="flex text-white my-20">
                                    <div class="loading"></div>
                                    <span class="ml-3">Loading</span>
                                </div>
                            </div>`);
        },
        success: function(response) {
            $('#live').html(response);
            highlightSortedColumn()
        }
    });
});
$(document).on('change', '#limit', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var column = urlParams.get('column') === null ? 'created_at' : urlParams.get('column');
    var direction = urlParams.get('direction') === null ? 'asc' : urlParams.get('direction');
    var folderId = urlParams.get('folderId') === null ? '' : urlParams.get('folderId');
    var limit = $(this).val();
    var page = '';
    updateURLParameterVideo(column,direction,folderId,limit,page)
    $.ajax({
        url: "/control",
        type: 'GET',
        data: {
            column: column,
            direction: direction,
            folderId: folderId,
            limit: limit,
            page: page
        },
        success: function(response) {
            $('#live').html(response);
            highlightSortedColumn()
        }
    });
});
