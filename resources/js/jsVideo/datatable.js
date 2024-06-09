import {btn_video} from "./video.js";
import {loadContent} from "../main.js";

$(document).on('click', '[checked-All]', function () {
    const isChecked = $(this).prop('checked');
    $(this).closest('table').find('input[type="checkbox"]').prop('checked', isChecked);
    btn_video()
})
$(document).on('click', '.checkbox',function(){
    const table = this.closest('table');
    const rows = $(table).find('tbody .checkbox').length;
    const rows_checked = $(table).find('tbody .checkbox:checked').length;
    const checkBoxAll = $(table).find('[checked-All]');
    if (rows_checked < rows) {
        checkBoxAll.prop('checked', false);
    } else {
        checkBoxAll.prop('checked', true);
    }
    btn_video()
});// Hàm để update giá trị của URL Parameters
function ajaxdatatable(column,direction,folderId,limit,page, poster) {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
    $.ajax({
        url: "/control",
        type: 'GET',
        data: {
            column: column,
            direction: direction,
            folderId: folderId,
            limit: limit,
            page: page,
            tab: tab,
            poster: poster
        },
        beforeSend: function () {
            $('#live').html(`<div class="w-full justify-center items-center flex h-full">
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
            $('#live').html(response);
            highlightSortedColumn()
        }
    });
}
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
function updateURLParameterVideo(column,direction,folderId,limit,page, poster) {
    const urlParams = new URLSearchParams(window.location.search);
    column ? urlParams.set('column', column): '';
    direction ? urlParams.set('direction', direction): '';
    folderId ? urlParams.set('folderId', folderId) : '';
    limit ? urlParams.set('limit', limit) : '';
    page ? urlParams.set('page', page) : '';
    poster ? urlParams.set('poster', poster) : '';
    const newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
    ajaxdatatable(column,direction,folderId,limit,page, poster)
}

$(document).on('click', '.sortable-column', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const column = $(this).data('column');
    const direction = $(this).attr('aria-sort') === 'desc' ? 'asc' : 'desc';
    const folderId = urlParams.get('folderId') === null ? '' : urlParams.get('folderId');
    const limit = urlParams.get('limit') === null ? '' : urlParams.get('limit');
    const page= '';
    const poster = urlParams.get('poster') === null ? '' : urlParams.get('poster');
    updateURLParameterVideo(column,direction,folderId,limit,page, poster)
});
$(document).on('click', '.page', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const column = urlParams.get('column') === null ? 'created_at' : urlParams.get('column');
    const direction = urlParams.get('direction') === null ? 'desc' : urlParams.get('direction');
    const folderId = urlParams.get('folderId') === null ? '' : urlParams.get('folderId');
    const limit = urlParams.get('limit') === null ? '20' : urlParams.get('limit');
    const page = $(this).data('page');
    const poster = urlParams.get('poster') === null ? '' : urlParams.get('poster');
    updateURLParameterVideo(column,direction,folderId,limit,page, poster)
});
$(document).on('change', '#limit', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const column = urlParams.get('column') === null ? 'created_at' : urlParams.get('column');
    const direction = urlParams.get('direction') === null ? 'desc' : urlParams.get('direction');
    const folderId = urlParams.get('folderId') === null ? '' : urlParams.get('folderId');
    const limit = $(this).val();
    const page = '';
    const poster = urlParams.get('poster') === null ? '' : urlParams.get('poster');
    updateURLParameterVideo(column,direction,folderId,limit,page,poster)
});
$(document).on('click', '[btn-poster]', function() {
    $(this).toggleClass('bg-[#142132]')
    $(this).toggleClass('bg-[#009FB2]')
    $('[poster]').toggleClass('hidden')
    const urlParams = new URLSearchParams(window.location.search);
    var poster
    if($(this).text().indexOf('show') !== -1) {
        $(this).html(`<i class="material-symbols-outlined opacity-1 text-xl mr-1">visibility_off</i><span class="hidden sm:block">hide poster</span>`)
        poster = 'show'
        urlParams.set('poster', poster)
    }else{
        $(this).html(`<i class="material-symbols-outlined opacity-1 text-xl mr-1">visibility</i><span class="hidden sm:block">show poster</span>`)
        poster = ''
        urlParams.delete('poster')
    }
    const newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
});
$(document).on('click', '.btn-page-folder, .btn-folder-root', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const column = urlParams.get('column') || 'created_at';
    const direction = urlParams.get('direction') || 'desc';
    const folderId = $(this).data('folderid');
    const limit = urlParams.get('limit') === null ? $(this).data('limit') : urlParams.get('limit');
    const box_folder = $(this).closest('[folder]');
    const poster = urlParams.get('poster') === null ? '' : urlParams.get('poster');
    if(urlParams.get('tab') ==='processing'){
        loadContent('live')
    }
    $('[folder] > a').addClass('btn-page-folder')
    $(this).removeClass('btn-page-folder')
    box_folder.prependTo(box_folder.closest('.list-folder'));
    $('[folder]').addClass('bg-[#121520]')
    $('[folder]').removeClass('bg-[#009FB2]')
    $(box_folder).removeClass("bg-[#121520]")
    $(box_folder).addClass("bg-[#009FB2]")
    if ($(this).find('span').text() === '') {
        $('#currentFolderName').html()
        $('#currentFolderName').addClass('hidden')
    } else {
        $('#currentFolderName').removeClass('hidden')
        $('#currentFolderName').html(
            `<i class="material-symbols-outlined">navigate_next</i>${$(this).find('span').text()}`
        )
    }
    btn_video()
    updateURLParameterVideo(column,direction,folderId,limit,'',poster)
})
