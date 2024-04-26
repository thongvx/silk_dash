// sidenav transition-burger

var sidenav = document.querySelector("aside");
var sidenav_trigger = document.querySelector("[sidenav-trigger]");
var sidenav_close_button = document.querySelector("[sidenav-close]");
var burger = sidenav_trigger.firstElementChild;
var top_bread = burger.firstElementChild;
var bottom_bread = burger.lastElementChild;
var a_menu = $('.menu-sidebar')

sidenav_trigger.addEventListener("click", function() {
  if (page == "virtual-reality") {
    sidenav.classList.toggle("xl:left-[18%]");
  }
  // sidenav_close_button.classList.toggle("hidden");
  if (sidenav.getAttribute("aria-expanded") == "false") {
    sidenav.setAttribute("aria-expanded", "true");
  } else {
    sidenav.setAttribute("aria-expanded", "false");
  }
  sidenav.classList.toggle("translate-x-0");
  sidenav.classList.toggle("ml-6");
  sidenav.classList.toggle("shadow-xl");
  if (page == "rtl") {
    top_bread.classList.toggle("-translate-x-[5px]");
    bottom_bread.classList.toggle("-translate-x-[5px]");
  } else {
    top_bread.classList.toggle("translate-x-[5px]");
    bottom_bread.classList.toggle("translate-x-[5px]");
  }
});
const path = window.location.pathname
a_menu.filter(function(){
    let menu = $(this).find('span').attr('name');
    let index = path.indexOf(menu)
    return index > 0
}).addClass('bg-[#009FB2]')
sidenav_close_button.addEventListener("click", function() {
  sidenav_trigger.click();
});
if (!localStorage.getItem('minisidebar')) {
  localStorage.setItem('minisidebar', false);
}
var buttonMiniSidebar = document.querySelector("[button-mini-sidebar]");
var accountPages = document.querySelector("[account-pages]");
var logo = document.querySelector("[logo]");
var aside = document.querySelector("[aside-menu]");
var main = document.querySelector("main");

var nameWeb = document.querySelector("[name-web]");
var nameMenu = $("[name-menu]");
var liMenu = $("[li-menu]");
var iconMenu = $("[icon-menu]");
var setMiniMenu = localStorage.getItem('minisidebar');

function addclass() {
 setMiniMenu = localStorage.getItem('minisidebar');
    buttonMiniSidebar.classList.toggle('-rotate-180');
    $(nameWeb).toggleClass('xl:max-w-0 xl:opacity-0');
    $(logo).toggleClass('px-2 py-4 xl:scale-75 justify-center')
    $(logo).toggleClass('px-6 py-4')
    $(main).toggleClass('xl:ml-72')
    $(main).toggleClass('xl:ml-24')
    $(accountPages).toggleClass('xl:hidden')
    $(nameMenu).toggleClass('xl:max-w-0 xl:hidden')
    $(aside).toggleClass('xl:w-max')
    $(liMenu).toggleClass('xl:w-max')
    $(a_menu).toggleClass('px-4')
    $(a_menu).toggleClass('px-2')
}
// JavaScript
buttonMiniSidebar.addEventListener("click", function() {
    var miniSidebarStatus = this.getAttribute('mini-sidebar');

    // Đảo ngược giá trị của mini-sidebar
    miniSidebarStatus = (miniSidebarStatus === 'false') ? 'true' : 'false';

    // Cập nhật giá trị của mini-sidebar trong HTML
    this.setAttribute('mini-sidebar', miniSidebarStatus);

    // Lưu giá trị của mini-sidebar vào localStorage
    localStorage.setItem('minisidebar', miniSidebarStatus);

    // Gửi yêu cầu AJAX đến server để cập nhật cookie
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/update-minimenu", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("Cookie has been updated.");
        }
    }
    xhr.send("minimenu=" + miniSidebarStatus);
    addclass()
});

window.addEventListener("click", function(e) {
  if (!sidenav.contains(e.target) && !sidenav_trigger.contains(e.target)) {
    if (sidenav.getAttribute("aria-expanded") == "true") {
      sidenav_trigger.click();
    }
  }
});
