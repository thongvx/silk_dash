import {notification} from "../main.js";

$(document).on('submit', '#clone', function (event) {
    event.preventDefault();
    var form = event.target.closest('form')
    var button = $(form).find('button[type="submit"]');
    var formData = new FormData(form);
    $.ajax({
        type: 'POST',
        url: '/cloneVideo',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            notification('success', 'Clone Video successfully');
            button.removeClass('bg-blue-400 hover:bg-blue-700')
            button.addClass('bg-[#142132]')
            button.attr('disabled', 'disabled');
            form.reset();
            $('#list-clone').empty();
            let embedLink = [];
            response.forEach(function(item, index) {
                embedLink.push('https://streamsilk.com/t/'+item.slug);
                const div_video_clone = `<div class="px-5 py-5 bg-[#121520] rounded-xl mb-4" id="">
                                                    <div class="text-white pb-2">
                                                        <div class="title-video">Title: ${ item.title }</div>
                                                        <div class="size mt-1">Size: ${ item.size }</div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <label for="link" class="text-white">Embed Link:</label>
                                                        <div class="relative mt-2">
                                                            <textarea rows='2'  class="w-full bg-[#142132] outline-none pl-3 pr-4 text-white py-2 rounded-lg">https://streamsilk.com/t/${ item.slug }</textarea>
                                                            <i class="material-symbols-outlined absolute text-white right-2 top-2 cursor-pointer hover:text-[#009FB2] text-md" clipboard-copy>content_copy</i>
                                                        </div>
                                                    </div>
                                                </div>`
               $('#list-clone').append(div_video_clone);
            })
            let embedLinksString = embedLink.join('\n');
            const div_embed = `<div class="px-5 py-5 bg-[#121520] rounded-xl mb-4" id="">
                                                    <div class="mt-3">
                                                        <label for="link" class="text-white">Embed Links:</label>
                                                        <div class="relative mt-2">
                                                            <textarea rows='4' class="w-full bg-[#142132] outline-none pl-3 pr-4 text-white py-2 rounded-lg">${embedLinksString}</textarea>
                                                            <i class="material-symbols-outlined absolute text-white right-2 top-2 cursor-pointer hover:text-[#009FB2] text-md" clipboard-copy>content_copy</i>
                                                        </div>
                                                    </div>
                                                </div>`
            $('#list-clone').append(div_embed);
            $('#box-list-upload').removeClass('hidden')
        },
        error: function(response) {
            console.log(response);
            notification('error', 'Clone Video successfully');
        }
    });
})
