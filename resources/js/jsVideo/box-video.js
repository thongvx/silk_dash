import { checkAll, fixedBox , btn_video } from './video.js';
import {add_notification, exitBox} from '../main.js';
//edit video
const formEdit = `<div class="edit" id="edit">
                                <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Rename file</h5>
                                <form class="text-white mt-3" action="">
                                    <div class="py-1 text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                                        <input type="text" value="" id="append" name="append"
                                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                               placeholder="Add Append">
                                    </div>
                                    <div class="mt-3 py-1 text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                                        <input type="text" value="" id="prepend" name="prepend"
                                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                placeholder="Add Prepend" >
                                    </div>
                                    <div class="mt-3 py-1 text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                                        <input type="text" value="" id="replace" name="replace"
                                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                placeholder="Replace Text" >
                                    </div>
                                    <div class="mt-3 py-1 text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                                        <input type="text" value="" id="with" name="with"
                                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                               placeholder="Replace With" >
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
    const videoIDs = rows.map((index, row) => {
        return $(row).closest('tr').data('videoid');
    }).get();
    $('#edit form').on('submit', function(e) {
        e.preventDefault();
        const newTitle = $(this).find('input[name="newTitle"]').val();
        const btnSubmit = $(this).find('button[type="submit"]');
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
                btnSubmit.html(`
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
                btnSubmit.prop('disabled', true);
            },
            success: function(response) {
                response.forEach(function(video) {
                    // Find the corresponding row in the table
                    var row = $('#' + video.id);
                    console.log(video.id)
                    // Update the title in the row
                    row.find('.video-title a').text(video.newTitle);
                });
                const message = 'Video titles updated successfully!';
                add_notification('success',message, btnSubmit);
                btnSubmit.remove()
                setTimeout(function() {
                    exitBox (box)
                    $('#edit').remove();
                }, 2000);
                tr.find('.checkbox').prop('checked', false)
            },
            error: function(response) {
                const message = 'An error occurred while editing the video title.';
                add_notification('error',message, btnSubmit);
                setTimeout(function() {
                    exitBox (box)
                    $('#edit').remove();
                }, 2000);
                tr.find('.checkbox').prop('checked', false)
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
function ajaxremove(videoIDs, btnSubmit, cancel){
    $.ajax({
        url: '/video/multiple',
        type: 'POST',
        data: {
            videoID: videoIDs
        },
        beforeSend: function() {
            btnSubmit.html(`
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
            btnSubmit.prop('disabled', true);
        },
        success: function(response) {
            const message = 'Video has been successfully deleted';
            add_notification('success',message, btnSubmit);
            btnSubmit.remove()
            cancel.remove()
            setTimeout(function() {
                exitBox ()
                $('#delete-video').remove();
            }, 2000);
            videoIDs.forEach(function(videoID) {
                $('tr[data-videoid="' + videoID + '"]').remove();
            });
            btn_video()
        },
        error: function(response) {
            const message = 'An error occurred while deleting the video.';
            add_notification('error',message, btnSubmit);
            btnSubmit.remove()
            setTimeout(function() {
                exitBox ()
                $('#delete-video').remove();
            }, 2000);
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
        const btnSubmit = $(this).find('button[type="submit"]');
        const cancel = $(this).find('button[type="button"]');
        e.preventDefault();
        ajaxremove(videoIDs, btnSubmit, cancel)
    });
});
$(document).on('click', '.btn-delete', function() {
    fixedBox()
    $('#fixed-box-control').append(formDelete)
    const tr = $(this).closest('tr');
    const videoIDs = [];
    videoIDs.push(tr.data('videoid'));
    $('#delete-video form').on('submit', function(e) {
        const btnSubmit = $(this).find('button[type="submit"]');
        const cancel = $(this).find('button[type="button"]');
        e.preventDefault();
        ajaxremove(videoIDs, btnSubmit, cancel)
    });
});
//export video
function getLink(){
    $('#export textarea').val('')
    const iframeHeight = $('#Embedcode').data('height');
    const iframeWidth = $('#Embedcode').data('width');
    const rows = checkAll()
    rows.map((index, row) => {
        const tr = row.closest('tr');
        let title
        if($('#btn-title').is(':checked')){
            title = $(tr).find('.video-title a').text()+'\n'
        } else{
            title = ''
        }
        $('#EmbedLink textarea').val(
            $('#EmbedLink textarea').val() +
            title+
            'https://streamsilk.com/p/'+
            $(tr).find('.videoID').text()+'\n'
        );
        $('#Embedcode textarea').val(
            $('#Embedcode textarea').val() +
            title+
            `<iframe src="https://streamsilk.com/p/${$(tr).find('.videoID').text()}" width="${iframeWidth}" height="${iframeHeight}" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>`+'\n'
        );
        $('#Download textarea').val(
            $('#Download textarea').val() +
            title+
            'https://streamsilk.com/d/'+
            $(tr).find('.videoID').text()+'\n'
        );
        $('#Poster textarea').val(
            $('#Poster textarea').val() +
            title+
            $(tr).find('.poster').data('poster')+'\n'
        );
    })
}
$(document).on('click', '[btn-export]', function() {
    fixedBox()
    $('#export').toggle("hidden");
    getLink()
});
$(document).on('click', '#btn-title', function() {
    getLink()
})
//get folder
const formMove = ``
var newFolderId = null;
var btnSubmitFolder
$(document).on('click', '#fixed-video [folder]', function() {
    $(this).addClass('text-transparent bg-gradient-to-r')
    $('#fixed-video [folder]').not(this).removeClass('text-transparent bg-gradient-to-r')
    newFolderId = $(this).data('folder-id')
    btnSubmitFolder = $(this).closest('.box-choose-folder').find('button[type="submit"]');
    btnSubmitFolder.addClass('bg-[#01545e] hover:bg-[#009fb2]')
    btnSubmitFolder.removeClass('bg-[#142132]')
    btnSubmitFolder.removeAttr('disabled');
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
$('#move form').one('submit', function (e) {
    e.preventDefault();
    const rows = checkAll()
    const videoIDs = rows.map((index, row) => {
        return $(row).closest('tr').data('videoid');
    }).get();
    $.ajax({
        url: '/videos/move',
        type: 'POST',
        data: {
            folderID: newFolderId,
            videoID: videoIDs
        },
        beforeSend: function() {
            btnSubmitFolder.html(`
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
            btnSubmitFolder.prop('disabled', true);
        },
        success: function(response) {
            btnSubmitFolder.html('Move To Folder')
            const message = 'Video has been successfully moved.';
            add_notification('success',message, btnSubmitFolder);
            setTimeout(function() {
                exitBox ()
                $('#move').addClass('hidden')

            }, 2000);
            videoIDs.forEach(function(videoID) {
                $('tr[data-videoid="' + videoID + '"]').remove();
            });
            btn_video()
        },
        error: function(response) {
            btnSubmitFolder.html('Move To Folder')
            const message = 'An error occurred while moved the video.';
            add_notification('error',message, btnSubmitFolder);
            setTimeout(function() {
                exitBox ()
                $('#move').addClass('hidden')

            }, 2000);
        }
    });
    newFolderId = ''
});

//clone video
$(document).on('click', '[btn-copy]', function() {
    fixedBox()
    $('#copy').show();
    $('[folder]').removeClass('text-transparent bg-gradient-to-r')
    $('[folder]').filter(function() {
        return $(this).find('h5').text().indexOf($('#currentFolderName').text()) !== -1;
    }).addClass('bg-gradient-to-r text-transparent');
    checkAll()
});
$('#copy form').one('submit', function (e) {
    e.preventDefault();
    const rows = checkAll()
    const videoIDs = rows.map((index, row) => {
        return 'https://streamsilk.com/p/'+$(row).closest('tr').data('videoid');
    }).get();
    const videoLinksString = videoIDs.join('\n');

    $.ajax({
        url: '/video/copy',
        type: 'POST',
        data: {
            folderID: newFolderId,
            url: videoLinksString
        },
        beforeSend: function() {
            btnSubmitFolder.html(`
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
            btnSubmitFolder.prop('disabled', true);
        },
        success: function(response) {
            btnSubmitFolder.html('Move To Folder')
            let message;
            if(response.status === 404){
                message = 'Video has failed to clone.';
                add_notification('error',message, btnSubmitFolder);
            }else{
                message = 'Video has been successfully clone.';
                add_notification('success',message, btnSubmitFolder);
            }
            setTimeout(function() {
                exitBox ()
                $('#copy').addClass('hidden')
            }, 2000);
            btn_video()
        },
        error: function(response) {
            btnSubmitFolder.html('Move To Folder')
            const message = 'An error occurred while moved the video.';
            add_notification('error',message, btnSubmitFolder);
            setTimeout(function() {
                exitBox ()
                $('#copy').addClass('hidden')

            }, 2000);
        }
    });
    newFolderId = ''
});
