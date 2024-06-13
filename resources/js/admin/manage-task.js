import { getUrlParams, loadDatatable } from '../control-datatable.js';

$(document).on('click','[btn-encoder-task]', function() {
    const params = getUrlParams();
    params.status = $(this).data('task');
    params.page = '';
    loadDatatable(params.tab, params.column, params.direction, params.folderId, params.poster, params.limit, params.page, params.status);
    $('[btn-encoder-task]').attr('class','px-4 py-1 rounded-lg text-white hover:bg-[#009FB2] ml-2 bg-[#142132]')
    $(this).removeClass('hover:bg-[#009FB2] bg-[#142132]')
    switch (params.status) {
        case 'all':
            $('#'+ params.status).addClass('bg-[#009FB2]');
            break;
        case 'pending':
            $('#'+ params.status).addClass('bg-gray-500');
            break;
        case 'completed':
            $('#'+ params.status).addClass('bg-emerald-500')
            break;
        case 'failed':
            $('#'+ params.status).addClass('bg-rose-600')
            break;
        default:
            $('#'+ params.status).addClass('bg-orange-500')
            break;
    }
});
