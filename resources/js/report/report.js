var fixedPayoutCard = $("[fixed-payout-card]");
var fixedVideoCloseButton = $("[fixed-payout-close-button]");

function fixedBox() {
    fixedPayoutCard.toggleClass("opacity-0");
    fixedPayoutCard.toggleClass("opacity-1");
    fixedPayoutCard.toggleClass("hidden");
    fixedPayoutCard.toggleClass("block");
}

$(document).on('click', '.button-payout', function () {
    fixedBox()
});
fixedVideoCloseButton.on("click", function () {
    fixedBox()
});
$(function () {
    $('.select2').select2()
    $('.select2-search__field').attr('name', 'country')
});

$(document).on('click', 'button[type=submit]', function (event) {
    event.preventDefault();
    var submitButton = $(this);
    const form = submitButton.closest('form')[0];
    var formData = new FormData(form);
    console.log($(this))
    if( $(this).data('start-date') ){
        formData.set('startDate', submitButton.data('start-date'));
        formData.set('endDate', submitButton.data('end-date'));
    };
    $.ajax({
        type: 'POST',
        url: '/report',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $('#live').html(response);
        },
        error: function (response) {
            console.log(response);
        }
    });
})
// $(document).on('click', '.btn-date-report', function () {
//     console.log($(this).data('start-date'))
//     const form = $('#get-data-report')[0];
//     var formData = new FormData(form);
//     formData.set('startDate', $(this).data('start-date'));
//     formData.set('endDate', $(this).data('end-date'));
//
// })
