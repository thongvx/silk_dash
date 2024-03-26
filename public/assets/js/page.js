$(function(){
  const path = window.location.pathname
  $('.menu-sidebar').filter(function(){
    let menu = $(this).find('span').attr('name');
    let index = path.indexOf(menu)
    return index > 0
  }).addClass('bg-emerald-400')
})  