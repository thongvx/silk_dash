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
}
$(document).on('click', '.btn-edit', function() {
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
function searchFolder(input) {
    // Get the search keyword
    var filter = input.value.toUpperCase();
    var listFolder = input.closest('[list-folder]');    // Get all folder elements
    var folders = listFolder.querySelectorAll('[folder]');
    // Loop through all folder items
    for (var i = 0; i < folders.length; i++) {
        var title = folders[i].querySelector('h5').innerText;
        // If the folder title doesn't match the search keyword, hide it
        if (title.toUpperCase().indexOf(filter) > -1) {
            folders[i].style.display = "";
        } else {
            folders[i].style.display = "none";
        }
    }
}
fixedVideoCloseButton.forEach(function(element) {
  element.addEventListener("click", function () {
    fixedVideoCard.classList.toggle("opacity-0");
    fixedVideoCard.classList.toggle("opacity-1");
    fixedVideoCard.classList.toggle("hidden");
    fixedVideoCard.classList.toggle("block");
    $('#move,#edit,#delete,#export, #add-folder').css("display",'none')
  });
});


