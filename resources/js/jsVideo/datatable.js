import {btn_video} from "./video.js";
import { updateURLParameter, loadContent } from "../main.js";

function getUrlParams() {
    const urlParams = new URLSearchParams(window.location.search);
    return {
        column: urlParams.get('column') || 'created_at',
        direction: urlParams.get('direction') || 'desc',
        folderId: urlParams.get('folderId') || '',
        limit: urlParams.get('limit') || '20',
        poster: urlParams.get('poster') || '',
        tab: urlParams.get('tab') || ''
    };
}
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
    const slug = $(table).find('tbody .checkbox:checked').closest('tr').data('videoid');
    if(rows_checked === 1){
        $('[btn-subtitle]').prop('disabled', false);
        $('[btn-subtitle]').removeClass('cursor-not-allowed')
        $('[btn-subtitle]').addClass('cursor-pointer')
        $('[btn-subtitle]').addClass('hover:text-[#009FB2]')
        $('[btn-subtitle] a').attr('href', `/edit-video/${slug}`)
    } else {
        $('[btn-subtitle]').prop('disabled', true);
        $('[btn-subtitle]').addClass('cursor-not-allowed')
        $('[btn-subtitle]').removeClass('cursor-pointer')
        $('[btn-subtitle]').removeClass('hover:text-[#009FB2]')
        $('[btn-subtitle] a').attr('href', 'javascript:void(0)')
    }
    btn_video()
});// Hàm để update giá trị của URL Parameters
function ajaxdatatable(column,direction,folderId,limit,page, poster) {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
    updateURLParameter(tab,column,direction,folderId,limit,page,poster)
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
export function highlightSortedColumn() {
    const sortColumn = document.querySelectorAll("[aria-sort]");
    const Table = $("#datatable")[0];
    console.log(Table)
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

$(document).on('click', '.sortable-column', function() {
    const { column, direction, folderId, limit, poster } = getUrlParams();
    ajaxdatatable($(this).data('column'), $(this).attr('aria-sort') === 'desc' ? 'asc' : 'desc', folderId, limit, '', poster)
});
$(document).on('click', '.page-datatable', function() {
    const { column, direction, folderId, limit, poster } = getUrlParams();
    ajaxdatatable(column, direction, folderId, limit, $(this).data('page'), poster)
});
$(document).on('change', '#limit', function() {
    const { column, direction, folderId, poster } = getUrlParams();
    ajaxdatatable(column, direction, folderId, $(this).val(), '', poster)
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
    if(urlParams.get('tab') ==='processing' || urlParams.get('tab') === 'removed'){
        loadContent('live')
    }
    $('[folder] > a').addClass('btn-page-folder')
    $(this).removeClass('btn-page-folder')
    box_folder.prependTo(box_folder.closest('.list-folder'));
    $('[folder]').addClass('bg-[#142132]')
    $('[folder]').removeClass('bg-[#009FB2]')
    $(box_folder).removeClass("bg-[#142132]")
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
    ajaxdatatable(column,direction,folderId,limit,'', poster)
})
