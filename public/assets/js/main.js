var page = window.location.pathname.split("/").pop().split(".")[0];
var aux = window.location.pathname.split("/");
var to_build = (aux.includes('pages') || aux.includes('docs') ?'../':'./');
var root = window.location.pathname.split("/")
if (!aux.includes("pages")) {
    page = "dashboard";
}
loadStylesheet(to_build + "assets/css/perfect-scrollbar.css");
loadJS(to_build + "assets/js/perfect-scrollbar.js", true);
$(function(){
    const path = window.location.pathname
    if(path.indexOf('dashboard') > 0){
        $('.capitalize').text('Dashboard')
    }
    if(path.indexOf('upload') > 0){
        $('.capitalize').text('Upload')
    }
    if(path.indexOf('video') > 0){
        $('.capitalize').text('My videos')
    }
    if(path.indexOf('report') > 0){
        $('.capitalize').text('Reports')
    }
    if(path.indexOf('dmca') > 0){
        $('.capitalize').text('DMCA Reported Files')
    }
    if(path.indexOf('setting') > 0){
        $('.capitalize').text('Settings')
    }
    $('.menu-sidebar').filter(function(){
        let menu = $(this).find('span').attr('name');
        let index = path.indexOf(menu)
        return index > 0
    }).addClass('bg-emerald-400')
})
document.onreadystatechange = function () {
    var state = document.readyState;
    if (state == 'loading') {
        document.getElementById('loading').style.display = "block";
    } else if (state == 'complete') {
        document.getElementById('loading').style.display = "none";
    }
};
if (document.querySelector("[btn-video]")) {
    loadJS(to_build + "assets/js/jsVideo/box-video.js", true);
}
if (document.querySelector("[datatable]")) {
    loadJS(to_build + "assets/js/jsVideo/datatable.js", true);
}
if (document.querySelector("[box-lifted]")) {
    loadJS(to_build + "assets/js/tabs-lifted.js", true);
}
if (document.querySelector("nav [navbar-trigger]")) {
    loadJS(to_build + "assets/js/navbar-collapse.js", true);
}
if (document.querySelector("[data-target='tooltip']")) {
    loadJS(to_build + "assets/js/tooltips.js", true);
    loadStylesheet(to_build + "assets/css/tooltips.css");
}

if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/uploadFile.js", true);
}

if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/jquery.fileupload.js", true);
}
if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/jquery.iframe-transport.js", true);
}
if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/jquery.ui.widget.js", true);
}

if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/remoteTransfer.js", true);
}

if (document.querySelector("[nav-pills]")) {
    loadJS(to_build + "assets/js/nav-pills.js", true);
}

if (document.querySelector("[dropdown-trigger]")) {
    loadJS(to_build + "assets/js/dropdown.js", true);

}

if (document.querySelector("[fixed-plugin]")) {
    loadJS(to_build + "assets/js/fixed-plugin.js", true);
}

if (document.querySelector("[navbar-main]") || document.querySelector("[navbar-profile]")) {
    if(document.querySelector("[navbar-main]")){
        loadJS(to_build + "assets/js/navbar-sticky.js", true);
    }
    if (document.querySelector("aside")) {
        loadJS(to_build + "assets/js/sidenav-burger.js?", true);
    }
}

if (document.querySelector("canvas")) {
    loadJS(to_build + "assets/js/charts.js", true);
}

if (document.querySelector(".github-button")) {
    loadJS("https://buttons.github.io/buttons.js", true);
}

function loadJS(FILE_URL, async) {
    let dynamicScript = document.createElement("script");

    dynamicScript.setAttribute("src", FILE_URL);
    dynamicScript.setAttribute("type", "text/javascript");
    dynamicScript.setAttribute("async", async);

    document.head.appendChild(dynamicScript);
}

function loadStylesheet(FILE_URL) {
    let dynamicStylesheet = document.createElement("link");

    dynamicStylesheet.setAttribute("href", FILE_URL);
    dynamicStylesheet.setAttribute("type", "text/css");
    dynamicStylesheet.setAttribute("rel", "stylesheet");

    document.head.appendChild(dynamicStylesheet);
}
