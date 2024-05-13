// Navbar stick on scroll ++ styles

var navbar = document.querySelector("[navbar-main]");
const white_elements = navbar.querySelectorAll(".text-white");
const white_bg_elements = navbar.querySelectorAll("[sidenav-trigger] i.bg-white");
const white_before_elements = navbar.querySelectorAll(".before\\:text-white");


window.onscroll = function () {
  let blur = navbar.getAttribute("navbar-scroll");
  if (blur == "true") stickyNav();
};

function stickyNav() {
  if (window.scrollY >= 5) {
    navbar.classList.add("sticky", "top-[1%]", "backdrop-saturate-200", "backdrop-blur-2xl", "bg-[hsla(0,0%,100%,0.8)]", "shadow-blur", "z-110");
    white_elements.forEach(element => {
      element.classList.remove("text-white")
    });
    white_bg_elements.forEach(element => {
      element.classList.remove("bg-white")
      element.classList.add("bg-slate-500")
    });
    white_before_elements.forEach(element => {
      element.classList.remove("before:text-white")
    });
  } else {
    navbar.classList.remove("sticky", "top-[1%]", "backdrop-saturate-200", "backdrop-blur-2xl", "bg-[hsla(0,0%,100%,0.8)]", "shadow-blur", "z-110");
    white_elements.forEach(element => {
      element.classList.add("text-white")
    });
    white_bg_elements.forEach(element => {
      element.classList.add("bg-white")
      element.classList.remove("bg-slate-500")
    });
    white_before_elements.forEach(element => {
      element.classList.add("before:text-white")
    });
  }
}
function focused(input){
    let label = input.closest('[search]').querySelector('label')
    label.classList.add('-translate-y-5')
    label.classList.add('scale-75')
    label.classList.remove('translate-x-3')
    label.classList.remove('text-slate-400')
    label.classList.add('text-red-500')
    input.classList.remove('z-20')
    input.classList.remove('border-slate-900')
    input.classList.add('border-red-500')
}
function defocused(input){
    let label = input.closest('[search]').querySelector('label')
    if(input.value === ''){
      label.classList.remove('-translate-y-5')
      label.classList.remove('scale-75')
      label.classList.add('translate-x-3')
      label.classList.add('text-slate-400')
      label.classList.remove('text-red-500')
      input.classList.add('z-20')
      input.classList.add('border-slate-900')
      input.classList.remove('border-red-500')
    }
}
