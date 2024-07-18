import { getUrlParams, loadDatatable } from '../control-datatable.js';
import { fixedBox} from "../jsVideo/video.js";
import {notification} from "../main.js";

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

const formRetryEncoder = `<div class="delete" id="retry-encoder">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to retry encoding the selected video?</h5>
                                        <div class="flex justify-center mt-3 text-white ">
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 mr-4" fixed-video-close-button>Cancel</button>
                                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Retry</button>
                                        </div>
                                    </form>
                                </div>`
$(document).on('click', '[btn-retry-encoder]', function () {
    fixedBox()
    $('#fixed-box-control').append(formRetryEncoder)
    const tr = $(this).closest('tr');
    var encoderId = $(this).data('encoder-id');
    $('#retry-encoder form').on('submit', function(e) {
        const bntSubmit = $(this).find('button[type="submit"]');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/admin/manageTask/retryEncoder',
            data: {
                encoderId: encoderId,
            },
            beforeSend: function() {
                bntSubmit.html(`
                     <div class="flex text-white items-center">
                        <div class="loading">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <span>process</span>
                    </div>
                `)
                bntSubmit.prop('disabled', true);
            },
            success: function (response) {
                fixedBox()
                tr.find('.status, .sv-encoder, .sv-sto').text('0');
                tr.find('.id, .slug').removeClass('text-orange-500 text-rose-600 text-teal-500');
                $('#retry-encoder').remove();
                notification('success', 'The video has been successfully re-encoded.');
            },
            error: function(response) {
                fixedBox()
                $('#retry-encoder').remove();
                notification('error', 'An error occurred while trying to re-encode the video.');
            }
        })
    });

})
