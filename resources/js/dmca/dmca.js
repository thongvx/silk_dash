import {fixedBox} from "../jsVideo/video.js";

$(document).on('click', '[btn-clone-reported]', function() {
    fixedBox()
    $('#clone').toggle("hidden");
});
$(document).on('click', '[btn-delete-reported]', function() {
    fixedBox()
    $('#delete-report').toggle("hidden");
});
$(document).on('click', '[btn-mark-reported]', function() {
    console.log('a')
});
