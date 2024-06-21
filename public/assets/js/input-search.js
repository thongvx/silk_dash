function focused(input){
    let label = input.closest('[select2]').querySelector('label')
    label.classList.add('-translate-y-5')
    label.classList.add('scale-75')
    label.classList.remove('translate-x-3')
    label.classList.remove('text-slate-400')
    label.classList.add('text-red-500')
    input.classList.remove('z-20')
    input.classList.remove('border-slate-900')
    input.classList.add('border-red-500')
}
function defocused(input){
    let label = input.closest('[select2]').querySelector('label')
    if(input.value === ''){
        label.classList.remove('-translate-y-5')
        label.classList.remove('scale-75')
        label.classList.add('translate-x-3')
        label.classList.add('text-slate-400')
        label.classList.remove('text-red-500')
        input.classList.add('z-20')
        input.classList.add('border-slate-900')
        input.classList.remove('border-red-500')
    }
}
function searchFolder(input) {
    // Get the select2 keyword
    var filter = input.value.toUpperCase();
    var listFolder = input.closest('[list-folder]');    // Get all folder elements
    var folders = listFolder.querySelectorAll('[folder]');
    // Loop through all folder items
    for (var i = 0; i < folders.length; i++) {
        var title = folders[i].querySelector('[name-folder]').innerText;
        // If the folder title doesn't match the select2 keyword, hide it
        if (title.toUpperCase().indexOf(filter) > -1) {
            folders[i].style.display = "";
        } else {
            folders[i].style.display = "none";
        }
    }
}
