function updateURLParameter(upload) {
    var urlParams = new URLSearchParams(window.location.search);
    upload ? urlParams.set('upload', upload) : '';
    var newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}
function loadContent(uploadType) {
    updateURLParameter(uploadType)
    $('.tab-upload').removeClass('tab-active !text-green-400 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
    $('.'+uploadType).addClass('tab-active !text-green-400 md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] ')
    $.ajax({
        url: "/box-upload",
        type: 'GET',
        data: {
            upload: uploadType
        },
        success: function(response) {
            $('#box-upload').html(response);
        }
    });
}
$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var upload = urlParams.get('upload') === null ? 'webupload' : urlParams.get('upload');
    loadContent(upload);
});

$(document).on('click', '.tab-upload', function() {
    var data_upload = $(this).data('content');
    loadContent(data_upload);
});
