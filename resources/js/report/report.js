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
        beforeSend: function () {
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
        success: function (response) {
            $('#box-content').html(response.view);
            $('input[name="startDate"]').val(response.data.startDate);
            $('input[name="endDate"]').val(response.data.endDate);
        },
        error: function (response) {
            console.log(response);
        }
    });
}
$(document).on('change', '.btn-country', function () {
    console.log($(this).val())
})
$(document).on('click', '#get-data-report button', function (event) {
    event.preventDefault();
    var submitButton = $(this);
    $('[btn-date-report]').removeClass('text-[#009fb2]').addClass('text-white');
    submitButton.addClass('text-[#009fb2]').removeClass('text-white');
    const form = submitButton.closest('form')[0];
    var formData = new FormData(form);
    var urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
    const date = submitButton.data('tab') ?? '';
    const country = urlParams.get('country') ?? '';
    formData.append('tab', tab);
    formData.append('date', date);
    formData.set('country', country);
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
    formData.append('country', country);
    loadReport(formData,tab, date, country);
})

var selectedValues = [];
$(document).on('select2:select','#btn-country', function (e) {
    var urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab') ?? '';
    const date = urlParams.get('date') ?? '';
    var value = e.params.data.id;
    selectedValues.push(value);
    const country = selectedValues ;
    const form = $('#get-data-report')[0];
    var formData = new FormData(form);
    formData.append('tab', tab);
    formData.append('date', date)
    formData.append('country', selectedValues);
    loadReport(formData,tab, date, country);
});
$(document).on('select2:unselect','#btn-country', function (e) {
    var urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab') ?? '';
    const date = urlParams.get('date') ?? '';
    var value = e.params.data.id;
    // Xóa giá trị khỏi mảng khi một mục không còn được chọn
    var index = selectedValues.indexOf(value);
    if (index !== -1) {
        selectedValues.splice(index, 1);
    }
    if (selectedValues.length === 0) {
        selectedValues = [];
    }
    const country = selectedValues.length === 0 ? '' : selectedValues;
    const form = $('#get-data-report')[0];
    var formData = new FormData(form);
    formData.append('tab', tab);
    formData.append('date', date);
    formData.append('country', country);
    loadReport(formData,tab, date, country);

});
