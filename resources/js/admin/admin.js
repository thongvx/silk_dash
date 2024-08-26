import '../main.js';
import './sidebar-admin.js';
import '../input-search.js'
import '../notification.js';
import '../control-datatable.js';
//Dashboard
import './admin-dashboard.js';
//user
import './user.js';
//manage Task
import './manage-task.js';
//Compute
import './compute.js';
//mail
import './mail.js';
//support
import './ticket.js'
//payment
import './payment.js'
//video
import './video.js'

var a_menu = $('.menu-sidebar')
a_menu.filter(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const urlTab = urlParams.get('tab');
    let tab = $(this).find('.tab-menu').attr('tab');
    let indexTab = -1;
    if(tab != null){
        indexTab = tab.indexOf(urlTab);
    }
    return indexTab >= 0
}).addClass('bg-[#009FB2]')
$(function () {
    $('.select2').select2()
    $('.select2-search__field').attr('name', 'country')
});
$(document).on('submit', '#resend-form', function () {
    $(this).find('button').attr('disabled', true);
    $(this).find('button').css('cursor', 'not-allowed');
    $(this).find('button').html('Processing...');
});
