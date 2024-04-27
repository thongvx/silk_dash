var page = window.location.pathname.split("/").pop().split(".")[0];
var aux = window.location.pathname.split("/");
var to_build = (aux.includes('pages') || aux.includes('docs') ?'../':'./');
var root = window.location.pathname.split("/")
if (!aux.includes("pages")) {
    page = "dashboard";
}

document.onreadystatechange = function () {
    var state = document.readyState;
    if (state == 'loading') {
        document.getElementById('loading').style.display = "block";
    } else if (state == 'complete') {
        document.getElementById('loading').style.display = "none";
    }
};

if (document.querySelector("[box-lifted]")) {
    loadJS(to_build + "assets/js/tabs-lifted.js", true);
}
loadJS(to_build + "assets/js/search.js", true);

if (document.querySelector("[dropdown-trigger]")) {
    loadJS(to_build + "assets/js/dropdown.js", true);

}

if (document.querySelector("[fixed-plugin]")) {
    loadJS(to_build + "assets/js/fixed-plugin.js", true);
}

if (document.querySelector("[navbar-main]") || document.querySelector("[navbar-profile]")) {
    // if(document.querySelector("[navbar-main]")){
    //     loadJS(to_build + "assets/js/navbar-sticky.js", true);
    // }
    if (document.querySelector("aside")) {
        loadJS(to_build + "assets/js/sidebar.js?", true);
    }
}

if (document.querySelector("canvas")) {
    loadJS(to_build + "assets/js/charts.js", true);
}
// load js upload
if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/remoteTransfer.js", true);
}

if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/upload.js", true);
}
if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/transfer.js", true);
}
if (document.querySelector("[file-upload]")) {
    loadJS(to_build + "assets/js/upload/jquery.fileupload.js", true);
    loadJS(to_build + "assets/js/upload/jquery.iframe-transport.js", true);
    loadJS(to_build + "assets/js/upload/jquery.ui.widget.js", true);
    loadJS(to_build + "assets/js/upload/uploadFile.js", true);
}

// load js video
if (document.querySelector("[page-video]")) {
    loadJS(to_build + "assets/js/jsVideo/box-video.js", true);
}
if (document.querySelector("[page-video]")) {
    loadJS(to_build + "assets/js/jsVideo/datatable.js", true);
}

// load js report
if (document.querySelector("[report]")) {
    loadJS(to_build + "assets/js/report/report.js", true);
}
// load js dmca
if (document.querySelector("[support]")) {
    loadStylesheet(to_build + "assets/highlight/styles/vs2015.css");
    loadJS("https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js", true);
}
// load js setting
if (document.querySelector("[setting]")) {
    loadJS(to_build + "assets/js/setting/setting.js", true);
}
// Load JS
function loadJS(FILE_URL, async) {
    let dynamicScript = document.createElement("script");
    let version = Date.now();

    dynamicScript.setAttribute("src", FILE_URL + "?v=" + version);
    dynamicScript.setAttribute("type", "text/javascript");
    dynamicScript.setAttribute("async", async);

    document.head.appendChild(dynamicScript);
}

function loadStylesheet(FILE_URL) {
    let dynamicStylesheet = document.createElement("link");
    let version = Date.now();

    dynamicStylesheet.setAttribute("href", FILE_URL + "?v=" + version);
    dynamicStylesheet.setAttribute("type", "text/css");
    dynamicStylesheet.setAttribute("rel", "stylesheet");

    document.head.appendChild(dynamicStylesheet);
}
