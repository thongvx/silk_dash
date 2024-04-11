var fixedFolderCard = document.querySelector("[fixed-folder-card]");
var fixedFolderCloseButton = document.querySelectorAll("[fixed-folder-close-button]");

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
    if(uploadType === 'webupload') {
        $('#box-list-upload').addClass('hidden')
    }else{
        $('#box-list-upload').removeClass('hidden')
    }
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
function fixedBox () {
    fixedFolderCard.classList.toggle("opacity-0");
    fixedFolderCard.classList.toggle("opacity-1");
    fixedFolderCard.classList.toggle("hidden");
    fixedFolderCard.classList.toggle("block");
}
fixedFolderCloseButton.forEach(function(element) {
    element.addEventListener("click", function () {
        fixedFolderCard.classList.toggle("opacity-0");
        fixedFolderCard.classList.toggle("opacity-1");
        fixedFolderCard.classList.toggle("hidden");
        fixedFolderCard.classList.toggle("block");
    });
});
$(document).on('click', '[change-folder]', function() {
    fixedBox()
});
$(document).on('click', '[folder]', function() {
    fixedBox()
    $('#folderPost').val($(this).data('folderid'))
    $('#folderName').text($(this).find('h5').first().text())
});
