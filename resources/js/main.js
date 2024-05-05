// Load JS
document.onreadystatechange = function () {
    var state = document.readyState;
    if (state == 'loading') {
        document.getElementById('loading').style.display = "block";
    } else if (state == 'complete') {
        document.getElementById('loading').style.display = "none";
    }
};
var page = window.location.pathname.replace('/', '');
function updateURLParameter(tab) {
    var urlParams = new URLSearchParams(window.location.search);
    tab ? urlParams.set('tab', tab) : '';
    var newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}

function loadContent(data_content) {
    updateURLParameter(data_content)
    var urlParams = new URLSearchParams(window.location.search);
    $('.tab-lifted').removeClass('tab-active !text-[#009FB2]')
    $('.'+data_content).addClass('tab-active !text-[#009FB2]')
    var url = page === 'video' ? '/loadPageVideo' : '/loadPage';
    // Sử dụng hàm
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            tab: data_content,
            page: page,
            folderId: urlParams.get('folderId')
        },
        beforeSend: function() {
            $('#box-content').html(`<div class="w-full justify-center items-center flex h-full">
                                        <div class="flex text-white my-20 items-center">
                                            <div class="loading">
                                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                            </div>
                                            <span>Loading</span>
                                        </div>
                                    </div>`);
        },
        success: function(response) {
            $('#box-content').html(response);
        }
    });
}
$(document).on('click', '.tab-lifted', function() {
    var data_content = $(this).data('content');
    loadContent(data_content);
});
var currentDropdownTrigger = null;
var currentDropdownMenu = null;

$(document).on('click', '[dropdown-trigger]', function (e) {
    var newDropdownTrigger = $(this);
    var li = newDropdownTrigger.closest('li');
    var newDropdownMenu = li.find('[dropdown-menu]');

    if (currentDropdownTrigger && currentDropdownMenu) {
        currentDropdownMenu.addClass("opacity-0 pointer-events-none before:-top-5");
        currentDropdownTrigger.attr("aria-expanded", "false");
    }

    newDropdownMenu.toggleClass("opacity-0 pointer-events-none before:-top-5");
    newDropdownTrigger.attr("aria-expanded", newDropdownMenu.hasClass("opacity-0") ? "false" : "true");

    currentDropdownTrigger = newDropdownTrigger;
    currentDropdownMenu = newDropdownMenu;
});

// Đóng dropdown menu khi click ra ngoài
$(document).on('click', function (e) {
    if (currentDropdownTrigger && currentDropdownMenu && !$(e.target).closest('[dropdown-trigger]').length) {
        currentDropdownMenu.addClass("opacity-0 pointer-events-none before:-top-5");
        currentDropdownTrigger.attr("aria-expanded", "false");
        currentDropdownTrigger = null;
        currentDropdownMenu = null;
    }
});

