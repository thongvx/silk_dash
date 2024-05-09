var fixedVideoCard = $("[fixed-video-card]");

export function btn_video(){
    const rows_checked = $('table').find('tbody .checkbox:checked').length;
    if (rows_checked > 0) {
        $('button[btn-video]').prop('disabled', false);
        $('button[btn-video]').removeClass('cursor-not-allowed')
        $('button[btn-video]').addClass('hover:text-[#009FB2]')
    } else {
        $('button[btn-video]').prop('disabled', true);
        $('button[btn-video]').addClass('cursor-not-allowed')
        $('button[btn-video]').removeClass('hover:text-[#009FB2]')
    }
}

export function fixedBox () {
    fixedVideoCard.toggleClass("opacity-0");
    fixedVideoCard.toggleClass("opacity-1");
    fixedVideoCard.toggleClass("hidden");
    fixedVideoCard.toggleClass("block");
}
export function checkAll() {
    return $('table').find('tbody .checkbox:checked');
}
//end move video to folder

$(document).on('click', '[btn-cancel], [fixed-video-close-button]', function() {
    fixedBox ()
    $('#move,#delete,#export, #add-folder').css("display",'none')
    $('#edit').remove()
    btn_video()
});
//move video to folder
var currentFolderId = null;
$(document).on('click', '#fixed-video [folder]', function() {
    $(this).addClass('text-transparent bg-gradient-to-r')
    $('#fixed-video [folder]').not(this).removeClass('text-transparent bg-gradient-to-r')
    currentFolderId = $(this).data('folder-id')
});
