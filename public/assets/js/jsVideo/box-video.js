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
function checkAll() {
    var rows = $('table').find('tbody .checkbox:checked');
    console.log(rows)
}
$(document).on('click', '.btn-edit', function() {
    console.log('a')
    fixedBox()
    $('#edit').toggle("hidden");
});
fixedDelete.addEventListener("click", function () {
    $('#delete').toggle("hidden");
});
$(document).on('click', '[btn-export]', function() {
    fixedBox()
    $('#export').toggle("hidden");
    checkAll()
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


