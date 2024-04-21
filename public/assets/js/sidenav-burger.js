// sidenav transition-burger

var sidenav = document.querySelector("aside");
var sidenav_trigger = document.querySelector("[sidenav-trigger]");
var sidenav_close_button = document.querySelector("[sidenav-close]");
var burger = sidenav_trigger.firstElementChild;
var top_bread = burger.firstElementChild;
var bottom_bread = burger.lastElementChild;

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
var a_menu = $('.menu-sidebar')
var setMiniMenu = localStorage.getItem('minisidebar');

function addclass() {
 setMiniMenu = localStorage.getItem('minisidebar');
 if(setMiniMenu === 'false'){
   buttonMiniSidebar.classList.add('-rotate-180')
   nameWeb.setAttribute('class','ml-1 font-semibold transition-all duration-200 ease-nav-brand')
   logo.setAttribute('class','flex px-6 py-4 m-0 text-sm whitespace-nowrap items-center')
   main.setAttribute('class','relative h-full transition-all duration-200 ease-in-out xl:ml-72 rounded-xl bg-[#142132]')
   accountPages.setAttribute('class','w-full mt-4 mb-2')
   nameMenu.attr('class','ml-3 opacity-1 pointer-events-none ease')
   aside.setAttribute('class',`fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4
         antialiased transition-transform duration-300 -translate-x-full border-0 shadow-xl max-w-64
         ease-nav-brand z-30 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0`)
   liMenu.attr('class','mt-2.5 w-full')
   a_menu.attr('class','menu-sidebar px-4 py-1.5 text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors')

 } else{
   buttonMiniSidebar.classList.remove('-rotate-180')
   nameWeb.setAttribute('class','xl:max-w-0 xl:opacity-0 ml-1 font-semibold transition-all duration-200 ease-nav-brand')
   logo.setAttribute('class','flex px-2 py-4 m-0 text-sm whitespace-nowrap items-center xl:scale-75')
   main.setAttribute('class','relative h-full transition-all duration-200 ease-in-out xl:ml-24 rounded-xl bg-[#142132]')
   accountPages.setAttribute('class','w-full mt-4 mb-2 xl:hidden')
   nameMenu.attr('class','xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease')
   aside.setAttribute('class',`fixed inset-y-0 flex-wrap items-center justify-between block w-full xl:w-max p-0 my-4
         antialiased transition-transform duration-300 -translate-x-full border-0 shadow-xl max-w-64
         ease-nav-brand z-30 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0`)
   liMenu.attr('class','mt-2.5 w-full xl:w-max')
   a_menu.attr('class','menu-sidebar px-2 py-1.5 text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors')

 }
 const path = window.location.pathname
  a_menu.filter(function(){
    let menu = $(this).find('span').attr('name');
    let index = path.indexOf(menu)
    return index > 0
  }).addClass('bg-[#009FB2]')
}
addclass()
buttonMiniSidebar.addEventListener("click", function() {
  setMiniMenu = localStorage.getItem('minisidebar');
  if(setMiniMenu === 'false'){
    localStorage.setItem('minisidebar', true);
    addclass()
  }else{
    localStorage.setItem('minisidebar', false);
    addclass()
  }

});

window.addEventListener("click", function(e) {
  if (!sidenav.contains(e.target) && !sidenav_trigger.contains(e.target)) {
    if (sidenav.getAttribute("aria-expanded") == "true") {
      sidenav_trigger.click();
    }
  }
});
