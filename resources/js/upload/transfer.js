import {formatFileSize, notification} from "../main.js";
$(document).on('submit', '#transferLink', function(event) {
    event.preventDefault();

    var form = event.target.closest('form')
    var button = $(form).find('button[type="submit"]');
    var formData = new FormData(form);
    var urls = form.elements.url.value;
    urls = urls.split("\n");
    // Mảng để lưu trữ các URL hợp lệ
    var validUrls = [];

    // Biểu thức chính quy để kiểm tra URL hợp lệ
    var urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;

    urls.forEach(function(url, index) {
        if(url != ''){
            url = url.trim();
            // Kiểm tra xem URL có hợp lệ không
            if (!urlRegex.test(url)) {
                notification('warning', 'The entered URL is invalid: ' + url)
                return;
            }
            validUrls.push(url);
            // Thêm một tiến trình upload mới vào danh sách
            var div_progress = `<div class="mx-3 mb-5 info-link" id="">
                                        <div class="text-white pb-2 flex justify-between">
                                            <div class="title-file">${url}</div>
                                            <div class="size"></div>
                                        </div>
                                        <div class="progress bg-gray-600 h-3.5 rounded-lg">
                                            <div class="bar bg-blue-500 h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center" style="width:0">0</div>
                                        </div>
                                        <div class="text-blue-500 mt-3 status">
                                            Pending
                                        </div>
                                        <div class="text-white mt-3">
                                            <button class="px-4 py-1 rounded-lg bg-red-500 mr-3">Remote</button>
                                            <button class="px-4 py-1 rounded-lg bg-blue-500">Retry</button>
                                        </div>
                                    </div>`;
            document.getElementById('list-upload').insertAdjacentHTML('beforebegin', div_progress);
        }

    });
    formData.set('url', validUrls.join('\n'));

    fetch('/postTransfer', {
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
            console.error(data);
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
                    var status = $(this).find('.status');
                    var size = $(this).find('.size');
                    var indexurl = urls.indexOf(link);
                    if (indexurl > -1) {
                        bar.css('width', Object.values(data)[indexurl].progress + '%');
                        bar.text(Object.values(data)[indexurl].progress + '%');
                        size.text(formatFileSize(Object.values(data)[indexurl].size_download)+' / '+formatFileSize(Object.values(data)[indexurl].size));
                        if(Object.values(data)[indexurl].status === 0){
                            status.text('Pending');
                            bar.removeClass('bg-green-500 bg-orange-500 bg-red-500').addClass('bg-blue-500');
                            status.removeClass('text-red-500 text-green-500 text-orange-500').addClass('text-blue-500');
                        }else if(Object.values(data)[indexurl].status === 19){
                            status.text('Transfer Failed');
                            bar.removeClass('bg-green-500 bg-orange-500 bg-blue-500').addClass('bg-red-500');
                            status.removeClass('text-blue-500 text-green-500 text-orange-500').addClass('text-red-500');
                        } else if(Object.values(data)[indexurl].status === 2){
                            status.text('Transfer successfully');
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
                    if(url != ''){
                        var div_progress = `<div class="mx-3 mb-5 info-link" id="">
                                <div class="text-white pb-2 flex justify-between">
                                    <div class="title-file">${Object.values(data)[index].url}</div>
                                    <div class="size">${Object.values(data)[index].size_download} / ${formatFileSize(Object.values(data)[index].size)}</div>
                                </div>
                                <div class="progress bg-gray-600 h-3.5 rounded-lg">
                                    <div class="bar bg-orange-500 h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center" style="width: ${Object.values(data)[index].progress}%">${Object.values(data)[index].progress}%</div>
                                </div>
                                <div class="text-orange-500 mt-3 status">
                                    Transferring
                                </div>
                                <div class="text-white mt-3">
                                    <button class="px-4 py-1 rounded-lg bg-red-500 mr-3">Remote</button>
                                    <button class="px-4 py-1 rounded-lg bg-blue-500">Retry</button>
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



