var fixedVideo = document.querySelector("[fixed-video]");

var fixedEdit = document.querySelector("[btn-edit]");
var fixedDelete = document.querySelector("[btn-delete]");
var fixedExport = document.querySelector("[btn-export]");
var fixedMove = document.querySelector("[btn-move]");

var fixedVideoCard = document.querySelector("[fixed-video-card]");
var fixedVideoCloseButton = document.querySelectorAll("[fixed-video-close-button]");


function fixedBox () {
    fixedVideoCard.classList.toggle("opacity-0");
    fixedVideoCard.classList.toggle("opacity-1");
    fixedVideoCard.classList.toggle("hidden");
    fixedVideoCard.classList.toggle("block");
}
$(document).on('click', '.btn-edit', function() {
    console.log('a')
    fixedBox()
    $('#edit').toggle("hidden");
});
fixedDelete.addEventListener("click", function () {
    $('#delete').toggle("hidden");
});
fixedExport.addEventListener("click", function () {
    $('#export').toggle("hidden");
});
fixedMove.addEventListener("click", function () {
    $('#move').toggle("hidden");
});
fixedVideoCloseButton.forEach(function(element) {
  element.addEventListener("click", function () {
    fixedVideoCard.classList.toggle("opacity-0");
    fixedVideoCard.classList.toggle("opacity-1");
    fixedVideoCard.classList.toggle("hidden");
    fixedVideoCard.classList.toggle("block");
    $('#move,#edit,#delete,#export').css("display",'none')
  });
});


