import { updateURLParameter } from '../main.js';
import {getUrlParams, loadDatatable} from "../control-datatable.js";


// load user
function loadUser(data_content, page) {
    updateURLParameter(data_content, '', '', '', null, page, '');
    $('.tab-user').removeClass('tab-active !text-[#009FB2]')
    $('.'+data_content).addClass('tab-active !text-[#009FB2]')
    // Sử dụng hàm
    $.ajax({
        url: '/admin/user',
        type: 'POST',
        data: {
            tab: data_content,
            page: page,
        },
        beforeSend: function() {
            $('#box-user').html(`<div class="w-full justify-center items-center flex h-full">
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
            $('#box-user').html(response);
        },
        error: function (error) {
            console.log(error)
        }

    });
}
$(document).on('click', '.tab-user', function() {
    var data_content = $(this).data('content');
    loadUser(data_content, 1);
});

$(document).on('submit', '#form-search-user', function(e) {
    e.preventDefault();
    var data_content = 'all';
    var page = 1;
    // updateURLParameter(data_content, '', '', '', null, page, '');
    $('.tab-user').removeClass('tab-active !text-[#009FB2]')
    $('.'+data_content).addClass('tab-active !text-[#009FB2]')
    const params = getUrlParams();
    params.tab = data_content;
    params.page = page;
    params.search = $('#search-user').val();
    loadDatatable(params.tab, params.column, params.direction, params.folderId, params.poster, params.limit, params.page, params.status, params.videoID, params.search);
    // $.ajax({
    //     url: '/admin/searchUser',
    //     type: 'GET',
    //     data: {
    //         tab: data_content,
    //         page: page,
    //         search: $('#search-user').val(),
    //     },
    //     beforeSend: function() {
    //         $('#box-datatable').html(`<div class="w-full justify-center items-center flex h-full">
    //                                     <div class="flex text-white my-20 items-center">
    //                                         <div class="loading">
    //                                             <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    //                                                 <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    //                                                 <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    //                                             </svg>
    //                                         </div>
    //                                         <span>Loading</span>
    //                                     </div>
    //                                 </div>`);
    //     },
    //     success: function(response) {
    //         $('#box-datatable').html(response);
    //     },
    //     error: function (error) {
    //         console.log(error)
    //     }
    //
    // });
})

