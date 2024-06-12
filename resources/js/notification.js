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
