var fixedFolderCard = $("[fixed-folder-card]");
var fixedFolderCloseButton = $("[fixed-folder-close-button]");

function fixedBox () {
    fixedFolderCard.toggleClass("opacity-0");
    fixedFolderCard.toggleClass("opacity-1");
    fixedFolderCard.toggleClass("hidden");
    fixedFolderCard.toggleClass("block");
}
fixedFolderCloseButton.on("click", function () {
    fixedFolderCard.toggleClass("opacity-0");
    fixedFolderCard.toggleClass("opacity-1");
    fixedFolderCard.toggleClass("hidden");
    fixedFolderCard.toggleClass("block");
});
$(document).on('click', '[change-folder]', function () {
    fixedBox();
});
$(document).on('click', '[folder]', function() {
    fixedBox()
    $('#folderPost').attr('value',$(this).data('folderid'))
    $('#folderName').text($(this).find('h5').first().text())
});
