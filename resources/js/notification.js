//read all notification
$(document).on('click', '[btn-read-all]', function() {
    $.ajax({
        url: '/notifications/readall',
        type: 'POST',
        success: function(response) {
            $('[btn-read]').closest('li').removeClass('bg-[#142132]');
            $('[no-read]').remove();
        },
        error: function(response) {
            // handle error here
        }
    });
});

//read notification
$(document).on('click', '[btn-read]', function() {
    let notification = $(this);
    let id = notification.data('id');
    $.ajax({
        url: '/notifications/read/' + id,
        type: 'POST',
        success: function(response) {
            notification.closest('li').removeClass('bg-[#142132]');
        },
        error: function(response) {
            // handle error here
        }
    });
});

//remove notification
$(document).on('click', '[btn-delete-noti]', function() {
    $.ajax({
        url: '/notifications/deleteall',
        type: 'POST',
        success: function(response) {
            $('[btn-read], [no-read]').remove();
            $('[notification]').html(`<li class="my-3 text-white text-center">
                                          No notifications
                                      </li>`)
        },
        error: function(response) {
            // handle error here
        }
    });
});

// info notification
$(document).on('click', '[btn-info-noti]', function() {
    const subject = $(this).find('.subject').text()
    const date = $(this).find('.date').data('date')
    const message = $(this).find('.message').text()
    const type = $(this).find('i').text()
    const text = type  === 'error' || type === 'delete' ? 'text-red-500' : 'text-orange-500'
    const divInfoNoti = `<div fixed-noti-card
                                     class="opacity-1 bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full backdrop-blur-sm
                                       min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
                                    <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-noti-close-button>
                                    </div>
                                    <div
                                        class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative">
                                        <div class="absolute right-4 top-3">
                                            <button fixed-noti-close-button
                                                    class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                                                <i class="material-symbols-outlined text-3xl">close</i>
                                            </button>
                                        </div>
                                        <div  id="fixed-box-control" class="mb-4">
                                            <div class="export">
                                                <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Notification</h5>
                                                <div class="text-white my-2">
                                                    <div class="flex justify-between">
                                                        <h4 class="${text}">${subject}</h4>
                                                        <h4>${date}</h4>
                                                    </div>
                                                    <div class="mt-3">
                                                        <p>${message}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
    $('body').append(divInfoNoti);
})
$(document).on('click', '[btn-info-noti-important]', function() {
    $('[fixed-noti-gift-card]').addClass('flex').removeClass('hidden');
    var box = $(this).data('box');
    $('.box').addClass('hidden');
    $('.'+box).removeClass('hidden')
})
$(document).on('click', '[fixed-noti-close-button]', function() {
    $('[fixed-noti-card]').remove();
    $('[fixed-noti-gift-card]').removeClass('flex').addClass('hidden');
})
