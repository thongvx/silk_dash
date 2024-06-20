import {loadContent, uploadState} from "../main.js";

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

function loadReport(formData,tab, date, country){
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
$(document).on('change', '.btn-country', function () {
    console.log($(this).val())
})
$(document).on('click', '#get-data-report button[type=submit]', function (event) {
    event.preventDefault();
    var submitButton = $(this);
    $('[btn-date-report]').removeClass('bg-[#009fb2]').addClass('bg-[#121520]');
    submitButton.addClass('bg-[#009fb2]').removeClass('bg-[#121520]');
    const form = submitButton.closest('form')[0];
    var formData = new FormData(form);
    var urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
    const date = submitButton.data('tab');

    formData.append('tab', tab);
    formData.append('date', date);
    const country = formData.get('country');
    loadReport(formData,tab, date, country);
})
$(document).on('click', '.tab-report', function (event) {
    var urlParams = new URLSearchParams(window.location.search);
    const tab = $(this).data('content') ;
    const date = urlParams.get('date') ?? '';
    const country = urlParams.get('country') ?? '' ;
    const form = $('#get-data-report')[0];
    var formData = new FormData(form);
    formData.append('tab', tab);
    formData.append('date', date);
    loadReport(formData,tab, date, country);
})
$(document).on('click', 'li.select2-results__option', function (event) {
    var listItems = document.querySelectorAll('ul.select2-selection__rendered li');
    listItems.forEach(function(listItem, index) {
        // Skip the last item
        if (index === listItems.length - 1) return;

        var text = listItem.textContent;
        console.log(text);
    });
})
