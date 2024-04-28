// Load JS
document.onreadystatechange = function () {
    var state = document.readyState;
    if (state == 'loading') {
        document.getElementById('loading').style.display = "block";
    } else if (state == 'complete') {
        document.getElementById('loading').style.display = "none";
    }
};

