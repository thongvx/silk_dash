import {updateOriginalFormState} from "../main.js";

export function btn_video(){
    const rows_checked = $('table').find('tbody .checkbox:checked').length;
    if (rows_checked > 0) {
        $('button[btn-video]').prop('disabled', false);
        $('button[btn-video]').removeClass('cursor-not-allowed')
        $('button[btn-video]').addClass('cursor-pointer')
        $('button[btn-video]').addClass('hover:text-[#009FB2]')
    } else {
        $('button[btn-video]').prop('disabled', true);
        $('button[btn-video]').addClass('cursor-not-allowed')
        $('button[btn-video]').removeClass('cursor-pointer')
        $('button[btn-video]').removeClass('hover:text-[#009FB2]')
    }
}

export function fixedBox (box) {
    const fixedVideoCard = $("[fixed-video-card]");
    fixedVideoCard.toggleClass("opacity-0");
    fixedVideoCard.toggleClass("opacity-1");
    fixedVideoCard.toggleClass("hidden");
    fixedVideoCard.toggleClass("block");
    updateOriginalFormState(box);
}

export function checkAll() {
    return $('table').find('tbody .checkbox:checked');
}
//end move video to folder

$(document).on('click', '[btn-cancel], [fixed-video-close-button]', function() {
    fixedBox ()
    $('#move,#export, #delete-report, #clone').css("display",'none')
    $('#edit,#edit-folder, #delete-folder, #add-folder, #delete-video, #add-sever, #retry-encoder, #subtitles, #fixed-box-control .delete, #fixed-box-control .retry').remove()
    btn_video()
});
//move video to folder

