import { btn_video } from './video.js';
import { notification } from '../main.js';
import { fixedBox } from './video.js';
import { checkAll } from './video.js';

var fixedVideoCloseButton = $("[fixed-video-close-button]");

const formEdit = `<div class="edit" id="edit">
                                <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Edit file details</h5>
                                <form class="text-white mt-3" action="">
                                    <div class="grid grid-cols-3 gap-4 items-center">
                                        <h5>
                                            Video title
                                        </h5>
                                        <div class="col-span-2 pr-2 video-title"></div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4 items-center my-4">
                                        <h5>
                                            Video URL
                                        </h5>
                                        <a class="col-span-2 hover:text-[#009FB2]" url-video href="">
                                            https://cdnwish.com/2aw9nl106nz1
                                        </a>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4 items-center">
                                        <h5>
                                            New video title
                                        </h5>
                                        <div class="col-span-2 pr-2">
                                            <input id="" name="new-name" type="text" class="pl-2 text-sm w-full focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid
                                   border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 transition-all placeholder:text-gray-500
                                   focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="title"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-2 px-5 py-1.5 rounded-lg bg-[#142132] hover:bg-[#009FB2]">Submit</button>
                                </form>
                        </div>`
$(document).on('click', '.btn-edit', function() {
    fixedBox()
    const tr = $(this).closest('tr');
    const videoId = tr.data('videoid')
    $('tbody .checkbox').prop('checked', false)
    tr.find('.checkbox').prop('checked', true)
    $('#fixed-box-control').append(formEdit)
    $('#edit .video-title').text(tr.find('.video-title').text())
    $('#edit [url-video]').text('https://streamsilk.com/play/'+tr.find('.videoID').text())
    $('#edit [url-video]').attr('href','https://streamsilk.com/play/'+tr.find('.videoID').text())
    $('#edit form').on('submit', function(e) {
        e.preventDefault();
        const newTitle = $(this).find('input[name="new-name"]').val();
        const bntSubmit = $(this).find('button[type="submit"]');
        $.ajax({
            url: '/video/' + videoId,
            type: 'PATCH',
            data: {
                title: newTitle
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
            },
            success: function(response) {
                tr.find('.video-title').text(newTitle)
                fixedBox ()
                $('#edit').remove();
                tr.find('.checkbox').prop('checked', false)
                notification('success', 'Video title has been successfully edited.')
            },
            error: function(response) {
                fixedBox()
                notification('error', 'An error occurred while editing the video title.')
            }
        });
    });
});
function ajaxremove(videoIDs, bntSubmit){
    $.ajax({
        url: '/video/multiple',
        type: 'POST',
        data: {
            ids: videoIDs
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
        },
        success: function(response) {
            fixedBox()
            $('#delete').toggle("hidden");
            videoIDs.forEach(function(videoID) {
                $('tr[data-videoid="' + videoID + '"]').remove();
            });
            bntSubmit.html(`Delete`)
            btn_video()
            notification('success', 'Video has been successfully deleted.')
        },
        error: function(response) {
            fixedBox()
            bntSubmit.html(`Delete`)
            notification('error', 'An error occurred while deleting the video.')
        }
    });
}

$(document).on('click', '[btn-delete]', function() {
    fixedBox()
    $('#delete').toggle("hidden");
    const rows = checkAll()
    const videoIDs = rows.map((index, row) => {
        return $(row).closest('tr').data('videoid');
    }).get();
    $('#delete form').on('submit', function(e) {
        const bntSubmit = $(this).find('button[type="submit"]');
        e.preventDefault();
        ajaxremove(videoIDs, bntSubmit)
    });
});
$(document).on('click', '.btn-delete', function() {
    fixedBox()
    $('#delete').toggle("hidden");
    const tr = $(this).closest('tr');
    const videoIDs = [];
    videoIDs.push(tr.data('videoid'));
    $('#delete form').on('submit', function(e) {
        const bntSubmit = $(this).find('button[type="submit"]');
        e.preventDefault();
        ajaxremove(videoIDs, bntSubmit)
    });
});
$(document).on('click', '[btn-export]', function() {
    fixedBox()
    $('#export').toggle("hidden");
    $('#export textarea').val('')
    const rows = checkAll()
    rows.map((index, row) => {
        const tr = row.closest('tr');
        $('#EmbedLink textarea').val(
            $('#EmbedLink textarea').val() +
            'https://streamsilk.com/play/'+
            $(tr).find('.videoID').text()+'\n'
        );
        $('#Embedcode textarea').val(
            $('#Embedcode textarea').val() +
            `<iframe src="https://streamsilk.com/play/${$(tr).find('.videoID').text()}" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>`+'\n'
        );
        console.log(index, tr)
        console.log($(tr).find('.videoID').text())
    })
});

$(document).on('click', '[btn-move]', function() {
    fixedBox()
    $('#move').toggle("hidden");
    $('[folder]').removeClass('text-transparent bg-gradient-to-r')
    $('[folder]').filter(function() {
        return $(this).find('h5').text().indexOf($('#currentFolderName').text()) !== -1;
    }).addClass('bg-gradient-to-r text-transparent');
    checkAll()
});


//end move video to folder




