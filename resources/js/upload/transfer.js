import {add_notification, formatFileSize} from "../main.js";

function niceBytes(x){
    let l = 0, n = parseInt(x, 10) || 0;
    while(n >= 1024 && ++l){
        n = n/1024;
    }
    return n.toFixed(n < 10 && l > 0 ? 1 : 0) + ' ' + units[l];
}
$(document).on('submit', '#transferLink', function(event) {
    event.preventDefault();

    var form = event.target.closest('form')
    var button = $(form).find('button[type="submit"]');
    var formData = new FormData(form);
    var urls = form.elements.url.value;
    urls = urls.split("\n");
    var validUrls = [];

    var urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;
    var invalidUrlFound = false; // Flag to track invalid URLs


    urls.forEach(function(url, index) {
        if(url != ''){
            url = url.trim();
            if (!urlRegex.test(url)) {
                const message = `The entered URL is invalid:<span class="italic ml-2">${url}</span>`;
                add_notification('warning',message, button);
                invalidUrlFound = true;
                form.reset();
                return;
            }
            validUrls.push(url);
            var div_progress = `<div class="mx-3 mb-5 info-link flex justify-between items-center">
                                                <div>
                                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 111.87 122.88"
                                                    fill="white" width="60" height="50">
                                                    <defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>video-file</title>
                                                    <path class="cls-1" d="M56.75,113.57V75.07a9.34,9.34,0,0,1,9.31-9.31h36.5a9.34,9.34,0,0,1,9.31,9.31v38.5a9.34,9.34,0,0,1-9.31,9.31H66.06a9.34,9.34,0,0,1-9.31-9.31Zm2.74-102.1L79.08,29.82H59.49V11.47ZM20.72,69.38a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21H45.3V69.38Zm.68,15.83a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H46V85.21Zm-.7-47.5a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H43.45a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0-15.83a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21h12.5a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0,31.67a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H59.16a2.12,2.12,0,0,0,2-2.21,2.09,2.09,0,0,0-2-2.21ZM90,32.45a3.26,3.26,0,0,0-2.37-3.14L58.74,1.2A3.21,3.21,0,0,0,56.23,0H5.87A5.86,5.86,0,0,0,0,5.86V106.25a5.84,5.84,0,0,0,1.72,4.15,5.91,5.91,0,0,0,4.15,1.71H45.39v-6.55H6.55v-99H52.94V33.08a3.29,3.29,0,0,0,3.29,3.29h27.2V57.82H90V32.45Zm4.3,63.73c1.9-1.23,1.89-2.59,0-3.68L77.39,81.23c-1.55-1-3.16-.4-3.12,1.62l.06,22.78c.13,2.19,1.38,2.79,3.23,1.77L94.28,96.18Z"/></svg>
                                                </div>
                                                <div class="px-5 w-full">
                                                    <div class="text-white pb-2 flex justify-between items-center">
                                                        <div class="title-file resumable-file-name">${url}</div>
                                                        <div class="flex ml-5 items-end">
                                                              <div class="status text-slate-400">Pending</div>
                                                              <div class="text-progress ml-3 text-md font-bold">0%</div>
                                                          </div>
                                                    </div>
                                                    <div class="progress bg-gray-600 h-3.5 rounded-lg resumable-file-progress">
                                                        <div class="bar bg-[#009FB2] h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center"
                                                        style="width: 0"></div>
                                                    </div>
                                                    <div class="flex justify-between mt-2">
                                                          <div class="size">0</div>
                                                          <div class="estimated-time text-slate-400 hidden">Estimated time: 0</div>
                                                    </div>

                                                </div>
                                                <div class="flex justify-between mt-2 button-file">
                                                    <button class="resumable-pause-btn hover:text-orange-500 text-white rounded-lg" button-retry>
                                                        <i class="material-symbols-outlined opacity-1 text-3xl">cached</i>
                                                    </button>
                                                    <button class="resumable-remove-btn hover:text-rose-600 text-white ml-2 rounded-lg" button-remove>
                                                        <i class="material-symbols-outlined opacity-1 text-3xl">close</i>
                                                    </button>
                                                </div>
                                            </div>`;
            // var div_progress = `<div class="mx-3 mb-5 info-link" id="">
            //                             <div class="text-white pb-2 flex justify-between">
            //                                 <div class="title-file">${url}</div>
            //                                 <div class="size"></div>
            //                             </div>
            //                             <div class="progress bg-gray-600 h-3.5 rounded-lg">
            //                                 <div class="bar bg-blue-500 h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center" style="width:0">0</div>
            //                             </div>
            //                             <div class="text-blue-500 mt-3 status">
            //                                 Pending
            //                             </div>
            //                             <div class="text-white mt-3">
            //                                 <button class="px-4 py-1 rounded-lg bg-red-600/70 hover:bg-red-600 mr-3" button-remove>Remote</button>
            //                                 <button class="px-4 py-1 rounded-lg bg-blue-500/70 hover:bg-blue-500" button-retry>Retry</button>
            //                             </div>
            //                         </div>`;
            document.getElementById('list-upload').insertAdjacentHTML('beforebegin', div_progress);
        }

    });
    if (invalidUrlFound) {
        // If any invalid URL was found, stop execution here
        return;
    }
    formData.set('url', validUrls.join('\n'));

    fetch('/postTransfer1', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
    })
        .then(response => {
            response.json()
        })
        .then(data => {
            form.reset();
            button.removeClass('bg-[#01545e] hover:bg-[#009fb2]')
            button.addClass('bg-[#142132]')
            button.attr('disabled', 'disabled');
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

setInterval(function() {
    if ($('.info-link').length == 0) return;
    if($('[transfer]')){
        $.ajax({
            url: '/getProgressTransfer',
            type: 'GET',
            success: function(response) {
                var data = JSON.parse(response);
                var found = false;
                var urls = Object.values(data).map((item) => item.url);
                $('.info-link').each(function(index) {
                    var link = $(this).find('.title-file').text();
                    var bar = $(this).find('.bar');
                    var text_progress = $(this).find('.text-progress');
                    var status = $(this).find('.status');
                    var size = $(this).find('.size');
                    var indexurl = urls.indexOf(link);
                    if (indexurl > -1) {
                        var progress = Object.values(data)[indexurl].progress;
                        var size_downloaded = Object.values(data)[indexurl].size_download;
                        var total_size = Object.values(data)[indexurl].size;
                        bar.css('width', progress + '%');
                        text_progress.text(progress + '%');
                        size.text(niceBytes(size_downloaded)+' / '+niceBytes(total_size));
                        if(Object.values(data)[indexurl].status === 0){
                            status.text('Pending');
                            bar.removeClass('bg-green-500 bg-orange-500 bg-red-500').addClass('bg-blue-500');
                            status.removeClass('text-red-500 text-green-500 text-orange-500').addClass('text-blue-500');
                        }else if(Object.values(data)[indexurl].status === 19){
                            status.text('Transfer Failed');
                            bar.removeClass('bg-green-500 bg-orange-500 bg-blue-500').addClass('bg-red-500');
                            status.removeClass('text-blue-500 text-green-500 text-orange-500').addClass('text-red-500');
                        } else if(Object.values(data)[indexurl].status === 2){
                            status.text('Transfer Successfully');
                            bar.removeClass('bg-orange-500 bg-red-500 bg-blue-500').addClass('bg-green-500');
                            status.removeClass('text-blue-500 text-red-500 text-orange-500').addClass('text-green-500');
                        } else{
                            status.text('Transferring');
                            bar.removeClass('bg-green-500 bg-red-500 bg-blue-500').addClass('bg-orange-500');
                            status.removeClass('text-blue-500 text-red-500 text-green-500').addClass('text-orange-500');
                        }
                        urls.splice(indexurl, 1, '');
                    }else{
                        $(this).remove();
                    }
                })
                urls.forEach(function(url, index) {
                    const progress = Object.values(data)[indexurl].progress;
                    const size_downloaded = niceBytes(Object.values(data)[indexurl].size_download);
                    const total_size = niceBytes(Object.values(data)[indexurl].size);
                    if(url != ''){
                        var div_progress = `<div class="mx-3 mb-5 info-link flex justify-between items-center">
                                                <div>
                                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 111.87 122.88"
                                                    fill="white" width="60" height="50">
                                                    <defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>video-file</title>
                                                    <path class="cls-1" d="M56.75,113.57V75.07a9.34,9.34,0,0,1,9.31-9.31h36.5a9.34,9.34,0,0,1,9.31,9.31v38.5a9.34,9.34,0,0,1-9.31,9.31H66.06a9.34,9.34,0,0,1-9.31-9.31Zm2.74-102.1L79.08,29.82H59.49V11.47ZM20.72,69.38a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21H45.3V69.38Zm.68,15.83a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H46V85.21Zm-.7-47.5a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H43.45a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0-15.83a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21h12.5a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0,31.67a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H59.16a2.12,2.12,0,0,0,2-2.21,2.09,2.09,0,0,0-2-2.21ZM90,32.45a3.26,3.26,0,0,0-2.37-3.14L58.74,1.2A3.21,3.21,0,0,0,56.23,0H5.87A5.86,5.86,0,0,0,0,5.86V106.25a5.84,5.84,0,0,0,1.72,4.15,5.91,5.91,0,0,0,4.15,1.71H45.39v-6.55H6.55v-99H52.94V33.08a3.29,3.29,0,0,0,3.29,3.29h27.2V57.82H90V32.45Zm4.3,63.73c1.9-1.23,1.89-2.59,0-3.68L77.39,81.23c-1.55-1-3.16-.4-3.12,1.62l.06,22.78c.13,2.19,1.38,2.79,3.23,1.77L94.28,96.18Z"/></svg>
                                                </div>
                                                <div class="px-5 w-full">
                                                    <div class="text-white pb-2 flex justify-between items-center">
                                                        <div class="title-file resumable-file-name">${Object.values(data)[index].url}</div>
                                                        <div class="flex ml-5 items-end">
                                                              <div class="status text-slate-400">Transferring</div>
                                                              <div class="text-progress ml-3 text-md font-bold">${progress}%</div>
                                                          </div>
                                                    </div>
                                                    <div class="progress bg-gray-600 h-3.5 rounded-lg resumable-file-progress">
                                                        <div class="bar bg-[#009FB2] h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center"
                                                        style="width: ${progress}%"></div>
                                                    </div>
                                                    <div class="flex justify-between mt-2">
                                                          <div class="size">${size_downloaded} / ${total_size}</div>
                                                          <div class="estimated-time text-slate-400 hidden">Estimated time: 0</div>
                                                    </div>

                                                </div>
                                                <div class="flex justify-between mt-2 button-file">
                                                    <button class="resumable-pause-btn hover:text-orange-500 text-white rounded-lg" button-retry>
                                                        <i class="material-symbols-outlined opacity-1 text-3xl">cached</i>
                                                    </button>
                                                    <button class="resumable-remove-btn hover:text-rose-600 text-white ml-2 rounded-lg" button-remove>
                                                        <i class="material-symbols-outlined opacity-1 text-3xl">close</i>
                                                    </button>
                                                </div>
                                            </div>`;
                        document.getElementById('list-upload').insertAdjacentHTML('beforebegin', div_progress);
                    }

                })
            },
            error: function(response) {
                console.log(response);
            }
        });

    }
}, 5000);

//retry transfer
$(document).on('click', '[button-retry]', function() {
    var slug = $(this).closest('.info-link').attr('id')
    var button = $(this);
    $.ajax({
        url: '/retryTransfer',
        type: 'POST',
        data: {slug: slug},
        success: function(response) {
            const message = 'Transfer is retry successfully';
            add_notification('success',message, button);
        },
        error: function(response) {
            const message = 'Transfer is retry failed';
            add_notification('error',message, button);
        }
    });
});
$(document).on('click', '[button-remove]', function() {
    var slug = $(this).closest('.info-link').attr('id')
    $.ajax({
        url: '/removeTransfer',
        type: 'POST',
        data: {slug: slug},
        success: function(response) {
            $('#'+slug).remove();
        },
        error: function(response) {
            console.log(response);
        }
    });
})
$(document).on('click', '[button-remove-failed]', function() {
    $.ajax({
        url: '/removeAllTransferFailed',
        type: 'POST',
        success: function(response) {
            console.log(response);
            $('.info-link').each(function(index) {
                if($(this).find('.status').text() === 'Transfer Failed'){
                    $(this).remove();
                }
            })
        },
        error: function(response) {
            console.log(response);
        }
    });
})



