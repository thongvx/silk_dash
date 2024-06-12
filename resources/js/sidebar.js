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

function addclass() {
    setMiniMenu = localStorage.getItem('minisidebar');
    buttonMiniSidebar.toggleClass('-rotate-180');
    nameWeb.toggleClass('xl:max-w-0 xl:opacity-0');
    logo.toggleClass('px-2 py-4 xl:scale-75 justify-center')
    logo.toggleClass('px-6 py-4')
    main.toggleClass('xl:ml-72')
    main.toggleClass('xl:ml-24')
    accountPages.toggleClass('xl:hidden')
    nameMenu.toggleClass('xl:max-w-0 xl:hidden')
    aside.toggleClass('xl:w-max')
    liMenu.toggleClass('xl:w-max')
    a_menu.toggleClass('px-4')
    a_menu.toggleClass('px-2')
}

// JavaScript
buttonMiniSidebar.on("click", function () {
    var miniSidebarStatus = $(this).attr('mini-sidebar');

    // Đảo ngược giá trị của mini-sidebar
    miniSidebarStatus = (miniSidebarStatus === 'false') ? 'true' : 'false';

    // Cập nhật giá trị của mini-sidebar trong HTML
    $(this).attr('mini-sidebar', miniSidebarStatus);

    // Lưu giá trị của mini-sidebar vào localStorage
    localStorage.setItem('minisidebar', miniSidebarStatus);

    // Gửi yêu cầu AJAX đến server để cập nhật cookie
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/update-minimenu", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("Cookie has been updated.");
        }
    }
    xhr.send("minimenu=" + miniSidebarStatus);
    addclass()
});

window.addEventListener("click", function (e) {
    if (!sidenav[0].contains(e.target) && !sidenav_trigger[0].contains(e.target)) {
        if (sidenav.attr("aria-expanded") == "true") {
            sidenav_trigger.click();
        }
    }
});
