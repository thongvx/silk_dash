import {add_notification, updateOriginalFormState} from "../main.js";

const addAds = (data) => {
    const adElement = document.createElement('div');
    adElement.className = "bg-[#142132] mb-8 rounded-2xl px-4 py-6 relative box-ads";

    adElement.innerHTML = `
        <div class="absolute right-4 top-3">
            <button btn-remove-ads
                    class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                <i class="material-symbols-outlined text-3xl">close</i>
            </button>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="flex items-center">
                <label for="type" class="w-max">Ads Type</label>
                <select name="adsType[]" id="type" class="ml-4 h-max text-white outline-none bg-[#121520] px-3 py-1.5 rounded-lg hover:bg-[#009FB2]">
                    <option value="direct" ${data.adsType === 'direct' ? 'selected' : ''}>Direct Link Ads</option>
                    <option value="vast" ${data.adsType === 'vast' ? 'selected' : ''}>VAST Ads</option>
                    <option value="popunder" ${data.adsType === 'popunder' ? 'selected' : ''}>Popunder JS</option>
                </select>
            </div>
            <div class="flex items-center">
                <label for="position">Position (Delay)</label>
                <div class="ml-4 text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#009FB2] bg-[#121520]">
                    <input type="number" id="position" name="offset[]" class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200" value="${data.offset}" placeholder="" />
                </div>
            </div>
        </div>
        <div class="pt-2">
            <label for="url">Link Ads</label>
            <div class="mt-1 text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#009FB2] bg-[#121520]">
                <input type="text" id="url" name="linkAds[]" class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200" value="${data.linkAds}" placeholder="Link Ads" />
            </div>
        </div>
    `;

    return adElement;
}
function ajaxUpdate(form,box_list,formData, button, message) {
    $.ajax({
        type: 'POST',
        url: '/updateCustomAds',
        data: formData,
        beforeSend: function () {
            button.attr('disabled', true);
        },
        success: function (response) {
            add_notification('success', message, button);
            updateOriginalFormState();
            form.reset();
            box_list.html('');
            const ads = addAds(response);
            response.forEach(adData => {
                const adElement = addAds(adData);
                box_list.append(adElement);
            });
        },
        error: function (response) {
            if (response.responseJSON && response.responseJSON.errors) {
                var errors = response.responseJSON.errors;
                for (var field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errors[field].forEach(function (error) {
                            add_notification('warning', error, button);
                        });
                    }
                }
            } else {
                console.log(response);
            }
        }
    });
}
$(document).on('submit', '#form-custom-ads', function(e) {
    e.preventDefault();
    var form = this;
    var formData = $(form).serialize();
    const button = $(form).find('button[type="submit"]');
    const message = 'Update custom ads successfully!';
    const box_list = $('#list-ads');
    // Post data to the server
    ajaxUpdate(form,box_list,formData, button, message);
});
$(document).on('click', '[btn-remove-ads]', function(e) {
    const div = $(this).closest('.box-ads').remove();
    const form = $('#form-custom-ads');
    const formData = form.serialize();
    const button = form.find('button[type="submit"]');
    const message = 'Remove custom ads successfully!';
    const box_list = $('#list-ads');
    // Post data to the server
    ajaxUpdate(form,box_list,formData, button, message);
})
