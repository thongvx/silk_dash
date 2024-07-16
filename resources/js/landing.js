$(document).on('click', '.tab-premium', function() {
    $('.tab-premium').removeClass('bg-[#009FB2]').addClass('bg-[#121520]');
    const data = $(this).data('plan');
    $(this).addClass('bg-[#009FB2]').removeClass('bg-[#121520]');
    $('.plan').hide()
    $('#'+data).show();
})

var currentDropdownTrigger = null;
var currentDropdownMenu = null;

$(document).on('click', '[dropdown-trigger]', function (e) {
    e.stopPropagation(); // Prevent click event from propagating to the document
    $('[dropdown-menu]').toggleClass('hidden'); // Toggle visibility
});

$(document).on('click', function (e) {
    $('[dropdown-menu]').addClass('hidden'); // Hide dropdown
});

// Prevent dropdown menu from closing when clicking inside it
$(document).on('click', '[dropdown-menu]', function (e) {
    e.stopPropagation(); // Prevent click inside dropdown from propagating to the document
});
