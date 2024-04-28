var fixedVideoCard = $("[fixed-video-card]");
var fixedVideoCloseButton = $("[fixed-video-close-button]");


function fixedBox () {
    fixedVideoCard.toggleClass("opacity-0");
    fixedVideoCard.toggleClass("opacity-1");
    fixedVideoCard.toggleClass("hidden");
    fixedVideoCard.toggleClass("block");
}
function checkAll() {
    var rows = $('table').find('tbody .checkbox:checked');
}
$(document).on('click', '.btn-edit', function() {
    fixedBox()
    $('#edit').toggle("hidden");
});
$(document).on('click', '[btn-delete]', function() {
    fixedBox()
    $('#delete').toggle("hidden");
    checkAll()
});
$(document).on('click', '[btn-export]', function() {
    fixedBox()
    $('#export').toggle("hidden");
    checkAll()
});

$(document).on('click', '[btn-move]', function() {
    fixedBox()
    $('#move').toggle("hidden");
    checkAll()
});
$(document).on('click', '[btn-add-folder]', function() {
    fixedBox()
    $('#add-folder').toggle("hidden");
    checkAll()
});

//move video to folder
var currentFolderId = null;

$(document).on('click', '#fixed-video [folder]', function() {
    $(this).addClass('text-transparent bg-gradient-to-r')
    $('#fixed-video [folder]').not(this).removeClass('text-transparent bg-gradient-to-r')
    currentFolderId = $(this).data('folder-id')
});

$(document).on('click', '[move-to-folder]', function() {
    if (currentFolderId !== null) {
        console.log(currentFolderId)
    }
});
//end move video to folder

fixedVideoCloseButton.on("click", function () {
    fixedVideoCard.toggleClass("opacity-0");
    fixedVideoCard.toggleClass("opacity-1");
    fixedVideoCard.toggleClass("hidden");
    fixedVideoCard.toggleClass("block");
    $('#move,#edit,#delete,#export, #add-folder').css("display",'none')
});


