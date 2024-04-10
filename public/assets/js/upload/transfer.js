$(document).on('submit', '#transferLink', function(event) {
    event.preventDefault();

    // Tạo một đối tượng FormData mới
    var form = event.target.closest('form')
    var formData = new FormData(form);

    var urls = form.elements.url.value;
    urls = urls.split("\n");
    urls.forEach(function(url, index) {
        if(url != ''){
            url = url.trim();
            // Thêm một tiến trình upload mới vào danh sách
            var div_progress = `<div class="mx-3 mb-3 info-link" id="">
                                        <div class="text-white pb-2 flex justify-between">
                                            <div class="title-file">${url}</div>
                                            <div class="size"></div>
                                        </div>
                                        <div class="progress bg-gray-600 h-3.5 rounded-lg">
                                            <div class="bar bg-orange-500 h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center" style="width:20%">20%</div>
                                        </div>
                                        <div class="text-white mt-3">
                                            <button class="px-4 py-1 rounded-lg bg-red-500 mr-3">Remote</button>
                                            <button class="px-4 py-1 rounded-lg bg-blue-500">Retry</button>
                                        </div>
                                    </div>`;
            document.getElementById('list-upload').insertAdjacentHTML('beforebegin', div_progress);
        }

    });

    // Tạo một yêu cầu POST đến server để thực hiện remote upload
    // fetch('/uploadRemote', {
    //     method: 'POST',
    //     body: formData,
    //     headers: {
    //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //     },
    // })
    //     .then(response => response.json())
    //     .then(data => {
    //         console.error(data);
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //     });
});

