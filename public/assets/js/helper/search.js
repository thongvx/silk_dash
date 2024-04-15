function searchFolder(input) {
    var valInput = $(input).val().toLowerCase()
    var folder = input.closest('[folder]')
    var itemFolders = folder.querySelectorAll('.item-folder');
    valInput === ''
        ? $(itemFolders).removeClass('hidden')
        : $(itemFolders).filter(function () {
            $(this).removeClass('hidden')
            var folder = $(this).find('a').text().toLowerCase().indexOf(valInput)
            folder > 0 ? '' : $(this).addClass('hidden')
        })
}
