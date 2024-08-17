function openNewTab(url) {
    var a = document.createElement('a');
    a.href = url;
    a.target = '_blank';
    a.style.display = 'none';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

$(document).on('click', '[btn-download-link]', function() {
    $('[btn-download-link]').remove()
    openNewTab('https://holahupa.com/2032563/');
    const slug = $('#box-download').data('slug')
    const quality = $(this).data('quality')
    const path = $(this).data('path')
    const sv = $('#box-download').data('sv')
    const title = $('#box-download').data('title')
    const data = {
        'slug': slug,
        'quality': quality,
        'path': path,
        'sv': sv,
    }
    $.ajax({
        url: '/addDownloadVideo',
        type: 'POST',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $('#box-download').html(`<div class="w-full justify-center items-center flex h-full mt-6" id="loading">
                                            <div class="flex text-white items-center">
                                                <div class="loading relative">
                                                    <svg class="animate-spin h-16 w-16 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                    <span class="time absolute top-0 h-full w-full flex justify-center items-center text-xl">15</span>
                                                </div>
                                            </div>
                                        </div>`)
        },
        success: function (res) {
            const getlink = setInterval(() => {
                const time = $('.time').text()
                if (time > 0) {
                    $('.time').text(time - 1)
                }else{
                    $('#loading').remove()
                    const url = `https://${ sv.replace('d','s')}.dolasilk.cc/download?slug=${slug}&quality=${quality}&title=${title}${res}`
                    $('#box-download').html(`<div class="mt-6">
                                                <a href="${url}" target="_blank" class="px-7 py-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white" download="${slug}">Download</a>
                                            </div>`)
                    clearInterval(getlink)
                }
            }, 1000)
        },
        error: function (err) {
            console.log(err)
        }
    })
})

$(document).on('click', '#pop1', function() {
    var e = $('#pop');
    e.remove();
    window.open("https://ceehipsy.com/4/7779337");
    //ads gala
    var script = document.createElement('script');
    script.type = 'application/javascript';
    script.src = 'https://streamsilk.com/ads.js';
    document.head.appendChild(script);
});

$(document).on('click', '#pop', function()  {
    var e1 = $('#pop1');
    e1.remove();
    window.open("https://holahupa.com/2032563/");
});
