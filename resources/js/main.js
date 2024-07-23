import { Upload_FILE } from './upload/uploadFile.js';
// Load JS
document.onreadystatechange = function () {
    var state = document.readyState;
    if (state == 'loading') {
        document.getElementById('loading').style.display = "block";
    } else if (state == 'complete') {
        document.getElementById('loading').style.display = "none";
    }
};
var page = window.location.pathname.replace('/', '');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
export function formatFileSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
}
$(document).on('change', 'input[type="checkbox"]', function() {
    if ($(this).is(':checked')) {
        $(this).val(1);
    } else {
        $(this).val(0);
    }
});
var originalFormState = $('#form-setting, #form-profile, #transferLink, #form, #form-player-setting').serialize();

export function updateOriginalFormState(box) {
    if(box){
        originalFormState = $('#'+box+' form').serialize();
    }else{
        originalFormState = $('#form-setting, #form-profile, #transferLink, #form, #form-player-setting').serialize();
    }
}
$(document).on('change keyup', 'form', function() {
    const button = $(this).find('button[type="submit"]');
    var currentFormState = $(this).serialize();
    var hasFile = false;
    var fileInputs = $(this).find('input[type="file"]');
    fileInputs.each(function() {
        if ($(this).get(0).files.length > 0) {
            hasFile = true;
            return false; // Exit the loop as soon as a file input with files is found
        }
    });
    if (currentFormState !== originalFormState || hasFile) {
        // Form has changed
        button.addClass('bg-[#01545e] hover:bg-[#009fb2]')
        button.removeClass('bg-[#142132]')
        button.removeAttr('disabled');
    } else {
        // Form has not changed, revert to original state
        button.removeClass('bg-[#01545e] hover:bg-[#009fb2]')
        button.addClass('bg-[#142132]')
        button.attr('disabled', 'disabled');
    }
});
// Load image
$(document).on('change', '.file-img', function() {
    File_image(this);
});
var url_old
// Load image
function File_image(input){
    var file = input.files[0];
    if (!(file instanceof Blob)) {
        console.error('The file is not a Blob object');
        return;
    }
    var box_img = $(input).closest('.box-img');
    url_old = box_img.find('img').attr('src');
    var reader = new FileReader();
    box_img.find('img').removeClass('hidden');
    reader.onload = function(e){
        box_img.find('img').attr('src', e.target.result);
        box_img.find('label').text(file.name);
    };
    reader.readAsDataURL(file);
    box_img.find('[btn-delete-selected]').removeClass('hidden');
}
$(document).on('click', '[btn-delete-selected]', function() {
    let box_img = $(this).closest('.box-img');
    const button = $(this).closest('form').find('button[type="submit"]');
    box_img.find('input[type="file"]').val('');
    if(url_old){
        box_img.find('img').attr('src', url_old);
    }else{
        box_img.find('img').addClass('hidden');
    }
    $(this).addClass('hidden');
    box_img.find('label').text('Choose file');
    button.removeClass('bg-blue-400 hover:bg-blue-700')
    button.addClass('bg-[#142132]')
    button.attr('disabled', 'disabled');
});
export function add_notification(type, message, div){
    let icon = '';
    let text = ''
    switch (type) {
        case 'success':
            icon = 'done';
            text = 'text-green-400';
            break;
        case 'error':
            icon = 'error';
            text = 'text-red-400';
            break;
        case 'warning':
            icon = 'warning';
            text = 'text-orange-400';
            break;
        default:
            icon = 'fa-info';
            text = 'text-blue-400';
            break;
    }
    const div_notification = `<div class="justify-center w-full ${text} mt-2 items-center flex" id="noti-warning">
                                        <i class="material-symbols-outlined mr-2">${icon}</i>
                                        ${message}
                                    </div>`
    div.before(div_notification);
    div.removeClass('bg-[#01545e] hover:bg-[#009fb2]')
    div.addClass('bg-[#142132]')
    div.attr('disabled', 'disabled');
    setInterval(function() {
        $('#noti-warning').remove();
    }, 2000);
}
export function notification(type, message) {
    let icon = '';
    let bg = ''
    switch (type) {
        case 'success':
            icon = 'done';
            bg = 'bg-green-600';
            break;
        case 'error':
            icon = 'error';
            bg = 'bg-red-600';
            break;
        case 'warning':
            icon = 'warning';
            bg = 'bg-yellow-600';
            break;
        default:
            icon = 'fa-info';
            bg = 'bg-blue-600';
            break;
    }
    const box_notification = `
            <div class="box-noti fixed top-4 right-4 ${bg} z-[40] text-white rounded-xl flex flex-col">
                <div class="flex items-center py-2 px-4">
                    <i class="material-symbols-outlined opacity-1 text-2xl mr-2">${icon}</i>
                    <h4>${message}</h4>
                </div>
                <div class="w-full bg-transparent rounded-full h-1 mx-2">
                    <div id="progressBar-noti" class="bg-orange-500 h-1 rounded-full" style="width: 0"></div>
                </div>
            </div>
            `
    $('body').append(box_notification)
    let value = 0;
    let decreaseInterval = 2000 / 92;
    let progressBar = $('#progressBar-noti');

    let interval = setInterval(() => {
        value++;
        progressBar.css('width', value + '%');
        if (value == 92) {
            clearInterval(interval);
            $('.box-noti').remove();
        }
    }, decreaseInterval);
}
export function updateURLParameter(tab, column, direction, folderId, limit, page, poster, status, videoID) {
    var urlParams = new URLSearchParams(window.location.search);
    tab ? urlParams.set('tab', tab) : urlParams.delete('tab');
    column ? urlParams.set('column', column) : urlParams.delete('column');
    direction ? urlParams.set('direction', direction): urlParams.delete('direction');
    folderId ? urlParams.set('folderId', folderId) : urlParams.delete('folderId');
    limit ? urlParams.set('limit', limit) : urlParams.delete('limit');
    page ? urlParams.set('page', page) : urlParams.delete('page');
    poster ? urlParams.set('poster', poster) : urlParams.delete('poster');
    status ? urlParams.set('status', status) : urlParams.delete('status');
    videoID ? urlParams.set('videoID', videoID) : urlParams.delete('videoID');
    const newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}
export function loadContent(data_content) {
    updateURLParameter(data_content)
    var urlParams = new URLSearchParams(window.location.search);
    $('.tab-lifted').removeClass('tab-active !text-[#009FB2]')
    $('.'+data_content).addClass('tab-active !text-[#009FB2]')
    // Sử dụng hàm
    $.ajax({
        url: '/loadPage',
        type: 'GET',
        data: {
            tab: data_content,
            page: page,
        },
        beforeSend: function() {
            $('#box-content').html(`<div class="w-full justify-center items-center flex h-full">
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
            $('#box-content').html(response);
            $('#sever').text('Server: '+ $('#datatable').data('total'))
            if(data_content === 'webupload'){
                Upload_FILE()
            }
            if (data_content === 'transfer'){
                updateOriginalFormState('transferLink')
            }else{
                updateOriginalFormState()
            }
        }
    });
}
// check upload
export var uploadState = {
    isUploading: false
};
$(document).on('click', '.tab-lifted', function() {
    var data_content = $(this).data('content');
    $('[title-tab]').text(data_content)
    if (uploadState.isUploading) {
        var userResponse = confirm('A video is currently uploading. Do you want to continue switching tabs?');
        if (userResponse == true) {
            window.stop();
            loadContent(data_content);
            uploadState.isUploading = false;
        }
    } else{
        loadContent(data_content)
    }
});

$(document).on('click', '.tab-export', function() {
    var data_content = $(this).data('content');
    $('.tab-export').removeClass('tab-active !text-[#009FB2]')
    $('.'+data_content).addClass('tab-active !text-[#009FB2]')
    $('.tab-content-export').addClass('hidden')
    $('#'+data_content).removeClass('hidden')
});
var currentDropdownTrigger = null;
var currentDropdownMenu = null;

$(document).on('click', '[dropdown-trigger]', function (e) {
    var newDropdownTrigger = $(this);
    var li = newDropdownTrigger.closest('li');
    var newDropdownMenu = li.find('[dropdown-menu]');

    if (currentDropdownTrigger && currentDropdownMenu) {
        currentDropdownMenu.addClass("opacity-0 pointer-events-none");
        currentDropdownTrigger.attr("aria-expanded", "false");
    }

    newDropdownMenu.toggleClass("opacity-0 pointer-events-none");
    newDropdownTrigger.attr("aria-expanded", newDropdownMenu.hasClass("opacity-0") ? "false" : "true");

    currentDropdownTrigger = newDropdownTrigger;
    currentDropdownMenu = newDropdownMenu;
});

// Đóng dropdown menu khi click ra ngoài
$(document).on('click', function (e) {
    if (currentDropdownTrigger && currentDropdownMenu && !$(e.target).closest('[dropdown-trigger]').length) {
        currentDropdownMenu.addClass("opacity-0 pointer-events-none");
        currentDropdownTrigger.attr("aria-expanded", "false");
        currentDropdownTrigger = null;
        currentDropdownMenu = null;
    }
});

// cclipboard-copy
$(document).on('click', '[clipboard-copy]', function() {
    var div = $(this).closest('div').find('.text-clipboard');
    var text = $(div)[0].innerText;
    const div_add_notification = $(this).closest('div');
    navigator.clipboard.writeText(text).then(function() {
        const div_notification = `<div class="justify-center w-full text-green-400 mt-2 items-center flex" id="noti-warning">
                                                <i class="material-symbols-outlined mr-2">done</i>
                                                Copied to clipboard!
                                            </div>`
        const notificationContainer = $(div_add_notification).after(div_notification).next();
        setInterval(function() {
            notificationContainer.remove();
        }, 1500);
    }, function(err) {
        const div_notification = `<div class="justify-center w-full text-green-400 mt-2 items-center flex" id="noti-warning">
                                                <i class="material-symbols-outlined mr-2">error</i>
                                                Failed to copy to clipboard!
                                            </div>`
        const notificationContainer = $(div_add_notification).after(div_notification).next();
        setInterval(function() {
            notificationContainer.remove();
        }, 1500);
    });
});
//exit box
export function exitBox(box) {
    $("[fixed-video-card]").addClass("opacity-0");
    $("[fixed-video-card]").removeClass("opacity-1");
    $("[fixed-video-card]").addClass("hidden");
    $("[fixed-video-card]").removeClass("block");
    updateOriginalFormState(box);
}
// time
function date_time() {
    var d = new Date();
    var utcDay = d.getUTCDay();
    var utcDate = d.getUTCDate();
    var utcMonth = d.getUTCMonth();
    var utcYear = d.getUTCFullYear();
    var utcHours = d.getUTCHours();
    var utcMinutes = d.getUTCMinutes();
    var utcSeconds = d.getUTCSeconds();
    utcMinutes = utcMinutes < 10 ? '0' + utcMinutes : utcMinutes; // Add leading zero to minutes if needed

    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var dayName = days[utcDay];
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var monthName = months[utcMonth];

    var period = utcHours >= 12 ? 'PM' : 'AM';
    utcHours = utcHours % 12;
    utcHours = utcHours ? utcHours : 12; // the hour '0' should be '12'
    utcHours = utcHours < 10 ? '0' + utcHours : utcHours;

    var formattedDate = utcDate + ' ' + monthName + ' ' + utcYear + ', ' + utcHours + ':' + utcMinutes + ' ' + period;
    $('#time').text(formattedDate);
}
$(document).ready(function() {
    date_time();
    setInterval(function() {
        date_time();
    }, 1000);
});
