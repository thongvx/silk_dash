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
export function updateURLParameterReport(tab, date, country) {
    var urlParams = new URLSearchParams(window.location.search);
    tab ? urlParams.set('tab', tab) : urlParams.delete('tab');
    date ? urlParams.set('date', date) : urlParams.delete('date');
    country ? urlParams.set('country', country) : urlParams.delete('country');
    const newUrl = window.location.pathname + '?' + urlParams.toString();
    history.pushState(null, '', newUrl);
}

function loadReport(formData, date, country){
    var urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
    updateURLParameterReport(tab, date, country)
    $.ajax({
        type: 'POST',
        url: '/report',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $('#box-content').html(response);
        },
        error: function (response) {
            console.log(response);
        }
    });
}
$(document).on('click', '#get-data-report button[type=submit]', function (event) {
    event.preventDefault();
    var submitButton = $(this);
    const form = submitButton.closest('form')[0];
    var formData = new FormData(form);
    const date = submitButton.data('date');
    if( $(this).data('start-date') ){
        formData.set('startDate', submitButton.data('start-date'));
        formData.set('endDate', submitButton.data('end-date'));
    };
    const country = formData.get('country');
    loadReport(formData, date, country);
})
// $(document).on('click', '.btn-date-report', function () {
//     console.log($(this).data('start-date'))
//     const form = $('#get-data-report')[0];
//     var formData = new FormData(form);
//     formData.set('startDate', $(this).data('start-date'));
//     formData.set('endDate', $(this).data('end-date'));
//
// })
