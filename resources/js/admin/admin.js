import '../main.js';
import '../sidebar.js';
import '../input-search.js'
import '../notification.js';
import '../control-datatable.js';
//user
import './user.js';
//manage Task
import './manage-task.js';
//Compute
import './compute.js';

var a_menu = $('.menu-sidebar')
a_menu.filter(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const urlTab = urlParams.get('tab');
    let tab = $(this).find('.tab-menu').attr('tab');
    let indexTab = urlTab.indexOf(tab)
    console.log(indexTab)
    return indexTab >= 0
}).addClass('bg-[#009FB2]')
