import { checkAll, fixedBox , btn_video } from './video.js';
import { notification, updateURLParameter } from '../main.js';
var fixedVideoCloseButton = $("[fixed-video-close-button]");
//edit video
const formEdit = `<div class="edit" id="edit">
                                <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Rename file</h5>
                                <form class="text-white mt-3" action="">
                                    <div id="list-file" class="max-h-80 overflow-auto">

                                    </div>
                                    <button type="submit" class="mt-2 px-5 py-1.5 rounded-lg bg-[#142132]" disabled>Submit</button>
                                </form>
                        </div>`
$(document).on('click', '[btn-edit]', function() {
    const box = 'edit'
    $('#fixed-box-control').append(formEdit)
    fixedBox(box)
    const tr = $(this).closest('tr');
    const rows = checkAll()
    const videoIDs =
    rows.map((index, row) => {
        const div_rename_file = `<div class="my-3 bg-[#142132] px-2 py-3 rounded-lg">
                                            <div class="grid grid-cols-3 gap-4 items-center">
                                                <h5>
                                                    Video title
                                                </h5>
                                                <div class="col-span-2 pr-2 video-title">
                                                ${$(row).closest('tr').find('.video-title').text()}
                                                </div>
                                            </div>
                                            <div class="mt-2 grid grid-cols-3 gap-4 items-center">
                                                <h5>
                                                    New video title
                                                </h5>
                                                <div class="col-span-2 pr-2">
                                                    <input id="" name="${ $(row).closest('tr').data('videoid') }" type="text" class="pl-2 text-sm w-full focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid
                                           border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 transition-all placeholder:text-gray-500
                                           focus:border-[#009FB2] focus:outline-none focus:transition-shadow" placeholder="title"/>
                                                </div>
                                            </div>
                                        </div>`
        $('#list-file').append(div_rename_file)
        return $(row).closest('tr').data('videoid');
    }).get()
    $('#edit form').on('submit', function(e) {
        e.preventDefault();
        const newTitle = $(this).find('input[name="newTitle"]').val();
        const bntSubmit = $(this).find('button[type="submit"]');
        var form = $(this).closest('form')[0];
        var formData = new FormData(form);
        formData.append('videoIds', videoIDs)
        $.ajax({
            url: '/video/edit/multiple',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
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
            success: function(response) {
                response.forEach(function(video) {
                    // Find the corresponding row in the table
                    var row = $('tr[data-videoid="' + video.id + '"]');
                    // Update the title in the row
                    row.find('.video-title').text(video.newTitle);
                });
                fixedBox ()
                $('#edit').remove();
                tr.find('.checkbox').prop('checked', false)
                notification('success', 'Video titles updated successfully!')
            },
            error: function(response) {
                fixedBox()
                $('#edit').remove();
                tr.find('.checkbox').prop('checked', false)
                notification('error', 'An error occurred while editing the video title.')
            }
        });
    });
});

//delete video
const formDelete = `<div class="delete" id="delete-video">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to remove the selected video?</h5>
                                        <input type="text" class="hidden" name="videoid-remove" value="">
                                        <div class="flex justify-center mt-3 text-white ">
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 mr-4" fixed-video-close-button>Cancel</button>
                                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Delete</button>
                                        </div>
                                    </form>
                                </div>`
function ajaxremove(videoIDs, bntSubmit){
    $.ajax({
        url: '/video/multiple',
        type: 'POST',
        data: {
            videoID: videoIDs
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
        success: function(response) {
            fixedBox()
            $('#delete-video').remove();
            videoIDs.forEach(function(videoID) {
                $('tr[data-videoid="' + videoID + '"]').remove();
            });
            btn_video()
            notification('success', 'Video has been successfully deleted.')
        },
        error: function(response) {
            fixedBox()
            $('#delete-video').remove();
            notification('error', 'An error occurred while deleting the video.')
        }
    });
}
$(document).on('click', '[btn-delete]', function() {
    fixedBox()
    $('#fixed-box-control').append(formDelete)
    const rows = checkAll()
    const videoIDs = rows.map((index, row) => {
        return $(row).closest('tr').data('videoid');
    }).get();
    $('#delete-video form').on('submit', function(e) {
        const bntSubmit = $(this).find('button[type="submit"]');
        e.preventDefault();
        ajaxremove(videoIDs, bntSubmit)
    });
});

//export video
$(document).on('click', '[btn-export]', function() {
    fixedBox()
    $('#export').toggle("hidden");
    $('#export textarea').val('')
    const rows = checkAll()
    rows.map((index, row) => {
        const tr = row.closest('tr');
        $('#EmbedLink textarea').val(
            $('#EmbedLink textarea').val() +
            'https://streamsilk.com/t/'+
            $(tr).find('.videoID').text()+'\n'
        );
        $('#Embedcode textarea').val(
            $('#Embedcode textarea').val() +
            `<iframe src="https://streamsilk.com/t/${$(tr).find('.videoID').text()}" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>`+'\n'
        );
        console.log(index, tr)
        console.log($(tr).find('.videoID').text())
    })
});

//move video to folder
$(document).on('click', '[btn-move]', function() {
    fixedBox()
    $('#move').show();
    $('[folder]').removeClass('text-transparent bg-gradient-to-r')
    $('[folder]').filter(function() {
        return $(this).find('h5').text().indexOf($('#currentFolderName').text()) !== -1;
    }).addClass('bg-gradient-to-r text-transparent');
    checkAll()
});
const formMove = ``
var newFolderId = null;
$(document).on('click', '#fixed-video [folder]', function() {
    $(this).addClass('text-transparent bg-gradient-to-r')
    $('#fixed-video [folder]').not(this).removeClass('text-transparent bg-gradient-to-r')
    newFolderId = $(this).data('folder-id')
    const rows = checkAll()
    const videoIDs = rows.map((index, row) => {
        return $(row).closest('tr').data('videoid');
    }).get();
    let bntSubmit = $(this).closest('#move').find('button[type="submit"]');
    bntSubmit.addClass('bg-[#01545e] hover:bg-[#009fb2]')
    bntSubmit.removeClass('bg-[#142132]')
    bntSubmit.removeAttr('disabled');
    $('#move form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/videos/move',
            type: 'POST',
            data: {
                folder_id: newFolderId,
                video_ids: videoIDs
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
            success: function(response) {
                console.log('a')
                fixedBox()
                $('#move').addClass('hidden')
                videoIDs.forEach(function(videoID) {
                    $('tr[data-videoid="' + videoID + '"]').remove();
                });
                btn_video()
                bntSubmit.removeClass('bg-[#01545e] hover:bg-[#009fb2]')
                bntSubmit.addClass('bg-[#142132]')
                bntSubmit.html('Move To Folder')
                notification('success', 'Video has been successfully moved.')
            },
            error: function(response) {
                fixedBox()
                notification('error', 'An error occurred while editing the video title.')
            }
        });
    });
});





