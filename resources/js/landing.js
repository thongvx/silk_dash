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
$(document).on('scroll', function() {
    const boxes = document.querySelectorAll('.box');
    const menuItems = document.querySelectorAll('.menu-item');
    let index = -1;

    boxes.forEach((box, i) => {
        const rect = box.getBoundingClientRect();
        if (rect.top >= 0 && rect.y <= window.innerHeight / 2) {
            index = box.getAttribute('id')
        }
    });

    menuItems.forEach((item, i) => {
        const id = $(item).find('a').attr('href').replace('#', '');
        if (id === index) {
            $(item).addClass('bg-[#009fb2]');
        } else {
            $(item).removeClass('bg-[#009fb2]');
        }
    });
});
