$(document).on('focus', '[select2-input]', function() {
    let label = this.closest('[select2]').querySelector('label')
    label.classList.add('-translate-y-5')
    label.classList.add('scale-75')
    label.classList.remove('translate-x-3')
    label.classList.remove('text-slate-400')
    label.classList.add('text-red-500')
    this.classList.remove('z-20')
    this.classList.remove('border-slate-900')
    this.classList.add('border-red-500')
})
$(document).on('blur', '[select2-input]', function() {
    let label = this.closest('[select2]').querySelector('label')
    if(this.value === ''){
        label.classList.remove('-translate-y-5')
        label.classList.remove('scale-75')
        label.classList.add('translate-x-3')
        label.classList.add('text-slate-400')
        label.classList.remove('text-red-500')
        this.classList.add('z-20')
        this.classList.add('border-slate-900')
        this.classList.remove('border-red-500')
    }
});
$(document).on('keyup', '[select2-folder]', function() {
    var filter = this.value.toUpperCase();
    var listFolder = this.closest('[list-folder]');    // Get all folder elements
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
});
