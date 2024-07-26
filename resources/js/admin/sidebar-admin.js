// sidenav transition-burger

var sidenav = $("aside");
var sidenav_trigger = $("[sidenav-trigger]");
var sidenav_close_button = $("[sidenav-close]");
var a_menu = $('.menu-sidebar')

sidenav_trigger.on("click", function () {
    if (sidenav.attr("aria-expanded") == "false") {
        sidenav.attr("aria-expanded", "true");
    } else {
        sidenav.attr("aria-expanded", "false");
    }
    sidenav.toggleClass("translate-x-0");
    sidenav.toggleClass("ml-6");
    sidenav.toggleClass("shadow-xl");
});
const path = window.location.pathname
a_menu.filter(function () {
    let menu = $(this).find('span').attr('name');
    let index = path.indexOf(menu)
    return index > 0;
}).addClass('bg-[#009FB2]')
sidenav_close_button.on("click", function () {
    sidenav_trigger.click();
});
if (!localStorage.getItem('minisidebar')) {
    localStorage.setItem('minisidebar', false);
}
var buttonMiniSidebar = $("[button-mini-sidebar]");
var accountPages = $("[account-pages]");
var logo = $("[logo]");
var aside = $("[aside-menu]");
var main = $("main");

var nameWeb = $("[name-web]");
var nameMenu = $("[name-menu]");
var liMenu = $("[li-menu]");
var iconMenu = $("[icon-menu]");
var setMiniMenu = localStorage.getItem('minisidebar');

window.addEventListener("click", function (e) {
    if (!sidenav[0].contains(e.target) && !sidenav_trigger[0].contains(e.target)) {
        if (sidenav.attr("aria-expanded") == "true") {
            sidenav_trigger.click();
        }
    }
});

