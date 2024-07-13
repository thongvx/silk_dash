import { checkAll, fixedBox , btn_video } from './video.js';
import {add_notification} from '../main.js';
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
                    var row = $('tr[data-videoid="' + video.id + '"]');
                    // Update the title in the row
                    row.find('.video-title').text(video.newTitle);
                });
                const message = 'Video titles updated successfully!';
                add_notification('success',message, btnSubmit);
                btnSubmit.remove()
                setTimeout(function() {
                    fixedBox ()
                    $('#edit').remove();
                }, 2000);
                tr.find('.checkbox').prop('checked', false)
            },
            error: function(response) {
                const message = 'An error occurred while editing the video title.';
                add_notification('error',message, btnSubmit);
                setTimeout(function() {
                    fixedBox()
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
                fixedBox ()
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
                fixedBox ()
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
    let btnSubmit = $(this).closest('#move').find('button[type="submit"]');
    btnSubmit.addClass('bg-[#01545e] hover:bg-[#009fb2]')
    btnSubmit.removeClass('bg-[#142132]')
    btnSubmit.removeAttr('disabled');
    $('#move form').off('submit').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/videos/move',
            type: 'POST',
            data: {
                folderID: newFolderId,
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
                btnSubmit.html('Move To Folder')
                const message = 'Video has been successfully moved.';
                add_notification('success',message, btnSubmit);
                setTimeout(function() {
                    fixedBox ()
                    $('#move').addClass('hidden')

                }, 2000);
                videoIDs.forEach(function(videoID) {
                    $('tr[data-videoid="' + videoID + '"]').remove();
                });
                btn_video()
            },
            error: function(response) {
                fixedBox()
                btnSubmit.html('Move To Folder')
                const message = 'An error occurred while moved the video.';
                add_notification('error',message, btnSubmit);
                setTimeout(function() {
                    fixedBox ()
                    $('#move').addClass('hidden')

                }, 2000);
            }
        });
    });
});

const formSubtitles = `<div class="subtitles" id="subtitles">
                                <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Subtitle</h5>
                                <div id="list-file" class="max-h-80 overflow-auto my-3">
                                     <div class="text-white">
                                        <span>dgasdgsd</span>
                                     </div>
                                </div>
                                <div class="mt-2 px-5 py-1.5 rounded-lg bg-[#142132] w-max text-white cursor-pointer hover:bg-[#009fb2]" btn-add-sub>Add Subtitles</div>
                                <form class="text-white mt-3 hidden" action="" id="add-sub">
                                    <h4>Add Subtitles</h4>
                                    <div class="bg-[#142132] rounded-lg text-center flex relative h-max box-img  hover:text-[#009fb2]">
                                        <input name="file-sub" type="file" id="file-attach" accept=".jpg, .png, .jpeg"
                                               class="absolute opacity-0 file-img cursor-pointer w-full">
                                        <label for="file-attach" class="w-full py-2 cursor-pointer text-center">Choose File Subtitles</label>
                                    </div>
                                    <button type="submit" class="mt-2 px-5 py-1.5 rounded-lg bg-[#142132]" disabled>Submit</button>
                                </form>
                            </div>`
$(document).on('submit', '#form-edit-video', function(e) {
    e.preventDefault();
    var form = this;
    var formData = new FormData(form);
    formData.set('subtitle', $(form).find('select[name="subtitle"] option:selected').text().trim())
    const button = $(form).find('button[type="submit"]');
    $.ajax({
        type: 'POST',
        url: '/updatefile',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            const message = 'Setting video successfully.';
            add_notification('success',message, button);
            setTimeout(function() {
                fixedBox ()
                $('#move').addClass('hidden')
            }, 2000);
            form.reset();
        },
        error: function(response) {
            console.log(response);
        }
    });
})


