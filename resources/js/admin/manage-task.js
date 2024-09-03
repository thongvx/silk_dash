import { getUrlParams, loadDatatable } from '../control-datatable.js';
import { fixedBox} from "../jsVideo/video.js";
import {notification, updateURLParameter} from "../main.js";

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

const formRetryEncoder = `<div class="retry" id="retry-encoder">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to retry encoding the selected video?</h5>
                                        <div class="flex justify-center mt-3 text-white ">
                                             <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Retry</button>
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 ml-4" fixed-video-close-button>Cancel</button>
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

//remove encoder

const divRemoveEncoder = `<div class="delete" id="remove-encoder">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to remove the selected video from the encoder?</h5>
                                        <div class="flex justify-center mt-3 text-white ">
                                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Remove</button>
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 ml-4" fixed-video-close-button>Cancel</button>
                                        </div>
                                    </form>
                                </div>`
$(document).on('click', '[btn-remove-encoder]', function () {
    fixedBox()
    console.log('a')
    $('#fixed-box-control').append(divRemoveEncoder)
    var slugEncoder = $(this).data('slug');
    $('#remove-encoder form').on('submit', function(e) {
        const bntSubmit = $(this).find('button[type="submit"]');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/admin/manageTask/removeEncoder',
            data: {
                slugEncoder: slugEncoder,
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
                $('.'+slugEncoder).remove()
                $('#remove-encoder').remove();
                notification('success', 'The video has been successfully removed from the encoder.');
            },
            error: function(response) {
                fixedBox()
                $('#remove-encoder').remove();
                notification('error', 'An error occurred while trying to remove the video from the encoder.');
            }
        })
    });

})

// Transfer

//retry transfer
const formRetryTransfer = `<div class="retry" id="retry-transfer">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to retry transferring the selected video?</h5>
                                        <div class="flex justify-center mt-3 text-white ">
                                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Retry</button>
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 ml-4" fixed-video-close-button>Cancel</button>
                                        </div>
                                    </form>
                                </div>`
$(document).on('click', '[btn-retry-transfer]', function () {
    fixedBox()
    console.log('a')
    $('#fixed-box-control').append(formRetryTransfer)
    const tr = $(this).closest('tr');
    var transferId = $(this).data('transfer-id');
    $('#retry-transfer form').on('submit', function(e) {
        const bntSubmit = $(this).find('button[type="submit"]');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/admin/manageTask/retryTransfer',
            data: {
                transferId: transferId,
            },
            beforeSend: function () {
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
                tr.find('.sv-transfer, .status').text('0');
                tr.find('.url, .slug').removeClass('text-orange-500 text-rose-600 text-teal-500');
                $('#retry-transfer').remove();
                notification('success', 'The video has been successfully re-transferred.');
            },
            error: function (){
                fixedBox()
                $('#retry-transfer').remove();
                notification('error', 'An error occurred while trying to retry the video from the encoder.')
            }
        })
    })
})
// remove transfer
const divRemoveTransfer = `<div class="delete" id="remove-transfer">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to remove the selected video from the transfer?</h5>
                                        <div class="flex justify-center mt-3 text-white ">
                                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Remove</button>
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 ml-4" fixed-video-close-button>Cancel</button>
                                        </div>
                                    </form>
                                </div>`
$(document).on('click', '[btn-delete-transfer]', function () {
    fixedBox()
    $('#fixed-box-control').append(divRemoveTransfer)
    var transferId = $(this).data('transfer-id');
    $('#remove-transfer form').on('submit', function(e) {
        const bntSubmit = $(this).find('button[type="submit"]');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/admin/manageTask/removeTransfer',
            data: {
                transferId: transferId,
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
                $('#transfer'+transferId).remove()
                $('#remove-transfer').remove();
                notification('success', 'The video has been successfully removed from the transfer.');
            },
            error: function(response) {
                fixedBox()
                $('#remove-transfer').remove();
                notification('error', 'An error occurred while trying to remove the video from the transfer.');
            }
        })
    });

})
// search Encoder
$(document).on('submit', '#form-search-encoder', function(e) {
    e.preventDefault();
    const params = getUrlParams();
    params.status = $(this).data('task');
    $.ajax({
        url: '/admin/manageTask/searchEncoder',
        type: 'GET',
        data: {
            status: params.status,
            search: $('#search-encoder').val(),
            limit: params.limit ?? 10,
            column: params.column ?? 'slug',
            direction: params.direction ?? 'desc',
        },
        beforeSend: function() {
            $('#box-datatable').html(`<div class="w-full justify-center items-center flex h-full">
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
            $('#box-datatable').html(response);
        },
        error: function (error) {
            console.log(error)
        }

    });
})
