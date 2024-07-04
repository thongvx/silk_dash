function notification(type, message) {
    let icon = '';
    let bg = ''
    switch (type) {
        case 'success':
            icon = 'done';
            bg = 'bg-green-600';
            break;
        case 'error':
            icon = 'error';
            bg = 'bg-red-600';
            break;
        case 'warning':
            icon = 'warning';
            bg = 'bg-yellow-600';
            break;
        default:
            icon = 'fa-info';
            bg = 'bg-blue-600';
            break;
    }
    const box_notification = `
            <div class="box-noti fixed top-4 right-4 ${bg} z-[40] text-white rounded-xl flex flex-col">
                <div class="flex items-center py-2 px-4">
                    <i class="material-symbols-outlined opacity-1 text-2xl mr-2">${icon}</i>
                    <h4>${message}</h4>
                </div>
                <div class="w-full bg-transparent rounded-full h-1 mx-2">
                    <div id="progressBar-noti" class="bg-orange-500 h-1 rounded-full" style="width: 0"></div>
                </div>
            </div>
            `
    $('body').append(box_notification)
    let value = 0;
    let decreaseInterval = 2000 / 92;
    let progressBar = $('#progressBar-noti');

    let interval = setInterval(() => {
        value++;
        progressBar.css('width', value + '%');
        if (value == 92) {
            clearInterval(interval);
            $('.box-noti').remove();
        }
    }, decreaseInterval);
}

function toggleTab(tab) {
    const tabs = document.querySelectorAll('.tab-export');
    const tabContents = document.querySelectorAll('.tab-content-export');
    tabs.forEach((tab) => tab.classList.remove('tab-active'));
    tabContents.forEach((tabContent) => tabContent.classList.add('hidden'));
    document.querySelector(`[data-content="${tab}"]`).classList.add('tab-active');
    document.getElementById(tab).classList.remove('hidden');
}
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-export');
    tabs.forEach((tab) => {
        tab.addEventListener('click', (e) => {
            toggleTab(e.target.dataset.content);
        });
    });
});
$(document).on('click', '[clipboard-copy]', function() {
    var div = $(this).closest('div').find('.text-clipboard');
    var text = $(div).text();
    navigator.clipboard.writeText(text).then(function() {
        notification('success', 'Copied to clipboard');
    }, function(err) {
        notification('error', 'Failed to copy to clipboard');
    });
});
