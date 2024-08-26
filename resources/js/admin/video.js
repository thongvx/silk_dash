import {notification} from "../main.js";

function fixedBox () {
    const fixedVideoCard = $('[fixed-video-card]');
    fixedVideoCard.toggleClass("opacity-0");
    fixedVideoCard.toggleClass("opacity-1");
    fixedVideoCard.toggleClass("hidden");
    fixedVideoCard.toggleClass("block");
}
const boxRedis = `<div id="edit" class="text-white">
                            <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Box Redis File</h5>
                            <ul id="json-list-redis"></ul>
                        </div>`
$(document).on('click', '.btn-redis', function() {
    $('#fixed-box-control').append(boxRedis)
    fixedBox()
    const tr = $(this).closest('tr');
    $.ajax({
        url: '/getDataRedis/'+tr.data('videoid'),
        type: 'GET',
        success: function (response) {
            const data = JSON.parse(response);
            if(Array.isArray(data) && data.length === 0) {
                $('#json-list-redis').empty();
                $('#json-list-redis').append(`<li>Redis is empty</li>`);
            } else {
                $('#json-list-redis').empty();
                $.each(data, function (key, value) {
                    $('#json-list-redis').append(`<li>${key}: ${value}</li>`);
                });
                $('#json-list-redis').append(`<div class="bg-[#142132] px-3 py-2 hover:text-rose-600 rounded-lg w-max">
                                            <button class="btn-remove-redis items-center flex font-bold cursor-pointer">Remove Redis</button>
                                        </div>`);
            }
        }
    })
    $(document).on('click', '.btn-remove-redis', function() {
        $.ajax({
            url: '/admin/removeRedis/'+tr.data('videoid'),
            type: 'GET',
            success: function (response) {
                location.reload();
            }
        })
    })
});
//remove video
const formDelete = `<div class="delete" id="delete-video">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to remove the selected video?</h5>
                                        <input type="text" class="hidden" name="videoid-remove" value="">
                                        <div class="flex justify-center mt-3 text-white ">
                                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600 mr-4">Delete</button>
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600" fixed-video-close-button>Cancel</button>
                                        </div>
                                    </form>
                                </div>`
function ajaxremove(videoIDs, btnSubmit, tr){
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
            fixedBox()
            $('#delete-video').remove();
            notification('success', 'Delete video successfully');
            tr.find('.video-title, .slug, .status').removeClass('text-teal-400').addClass('text-rose-400');
            tr.find('.status').html('Deleted');
        },
        error: function(response) {
            fixedBox()
            $('#retry-encoder').remove();
            notification('Error', 'An error occurred, please try again later');
        }
    });
}
$(document).on('click', '.btn-delete', function() {
    fixedBox()
    $('#fixed-box-control').append(formDelete)
    const tr = $(this).closest('tr');
    const videoID = tr.data('videoid')
    $('#delete-video form').on('submit', function(e) {
        const btnSubmit = $(this).find('button[type="submit"]');
        const cancel = $(this).find('button[type="button"]');
        e.preventDefault();
        ajaxremove(videoID, btnSubmit, tr)
    });
});
