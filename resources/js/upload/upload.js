var fixedFolderCard = document.querySelector("[fixed-folder-card]");
var fixedFolderCloseButton = document.querySelectorAll("[fixed-folder-close-button]");

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
$(document).on('click', '[change-folder]', function () {
    fixedBox();
});
$(document).on('click', '[folder]', function() {
    fixedBox()
    $('#folderPost').attr('value',$(this).data('folderid'))
    $('#folderName').text($(this).find('h5').first().text())
    Upload_FILE ()
});
