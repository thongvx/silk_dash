<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>player</title>
    <script src="https://cdn.jsdelivr.net/npm/cdnbye@latest"></script>
    <link rel="shortcut icon" href="/assets/img/fav.png" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/cdnbye@latest/dist/jwplayer.provider.hls.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://emturbovid.com/frontend/js/jwplayer.js"></script>
    <script src="https://cdn.jwplayer.com/libraries/5Mr0zETT.js"></script>
    <style>
        .container-fluid .col-md-12{
            padding: 0;
        }
        .container-fluid .row{
            margin-right: 0;
            position: relative;
        }
        .container-fluid{
            padding: 0;
        }
        #video_player {
            position: absolute;
            width: 100% !important;
            height: 100% !important;
        }
        body{
            margin: 0;
        }

        #pop{

            z-index: 99998;
        }
        #pop1{
            z-index: 999999;
        }
    </style>
</head>
<body>
<div id="pop1" class="div_pop"></div>
<div id="pop" class="div_pop"></div>
<div class="container-fluid">
    <div id="video_player">

    </div>
</div>
<script>
    player();
    async function player() {
        var playerInstance = jwplayer("video_player");
        var poster = '<?= $poster ?>';
        var logo = '<?= $data_setting->logo ?>';
        if(logo == '0')
            var check_logo = false;
        else
            var check_logo = true;
        var url_logo_link = '<?= $data_setting->logo_link ?>';
        var position = '<?= $data_setting->position ?>';
        var show_title = '<?= $data_setting->show_title ?>';
        if(show_title == '0')
            var title = '';
        else
            var title = '<?= $title ?>';
        playerInstance.setup({
            width: "100%",
            height: "100%",
            autostart: false,
            controls: true,
            mute: false,
            image: poster,
            primary: "hlsjs",
            preload: true,
            aspectratio: "16:9",
            jwplayer8quality: true,
            playbackRateControls: [0.5, 0.75, 1, 1.5, 2],
            skin: { active: "rgb(221,51,51)", },
            sources: [{ file: '{{ $urlPlay }}', type: "hls" }],
            logo: {
                "file": logo,
                "link": url_logo_link,
                "hide": check_logo,
                "position": position
            },
            title : title,
            tracks: [{
                file: '',
                label: "captions",
                kind: "captions",
                default: true
            }],
        });
        playerInstance.on("ready", function () {
            playerInstance.addButton('<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind2" viewBox="0 0 240 240" focusable="false"><path d="m 25.993957,57.778 v 125.3 c 0.03604,2.63589 2.164107,4.76396 4.8,4.8 h 62.7 v -19.3 h -48.2 v -96.4 H 160.99396 v 19.3 c 0,5.3 3.6,7.2 8,4.3 l 41.8,-27.9 c 2.93574,-1.480087 4.13843,-5.04363 2.7,-8 -0.57502,-1.174985 -1.52502,-2.124979 -2.7,-2.7 l -41.8,-27.9 c -4.4,-2.9 -8,-1 -8,4.3 v 19.3 H 30.893957 c -2.689569,0.03972 -4.860275,2.210431 -4.9,4.9 z m 163.422413,73.04577 c -3.72072,-6.30626 -10.38421,-10.29683 -17.7,-10.6 -7.31579,0.30317 -13.97928,4.29374 -17.7,10.6 -8.60009,14.23525 -8.60009,32.06475 0,46.3 3.72072,6.30626 10.38421,10.29683 17.7,10.6 7.31579,-0.30317 13.97928,-4.29374 17.7,-10.6 8.60009,-14.23525 8.60009,-32.06475 0,-46.3 z m -17.7,47.2 c -7.8,0 -14.4,-11 -14.4,-24.1 0,-13.1 6.6,-24.1 14.4,-24.1 7.8,0 14.4,11 14.4,24.1 0,13.1 -6.5,24.1 -14.4,24.1 z m -47.77056,9.72863 v -51 l -4.8,4.8 -6.8,-6.8 13,-12.99999 c 3.02543,-3.03598 8.21053,-0.88605 8.2,3.4 v 62.69999 z"></path></svg>', "Next 10s", function () {
                playerInstance.seek(playerInstance.getPosition() + 10);
            }, "Next 10s");
            playerInstance.addButton('<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind" viewBox="0 0 240 240" focusable="false"><path d="M113.2,131.078a21.589,21.589,0,0,0-17.7-10.6,21.589,21.589,0,0,0-17.7,10.6,44.769,44.769,0,0,0,0,46.3,21.589,21.589,0,0,0,17.7,10.6,21.589,21.589,0,0,0,17.7-10.6,44.769,44.769,0,0,0,0-46.3Zm-17.7,47.2c-7.8,0-14.4-11-14.4-24.1s6.6-24.1,14.4-24.1,14.4,11,14.4,24.1S103.4,178.278,95.5,178.278Zm-43.4,9.7v-51l-4.8,4.8-6.8-6.8,13-13a4.8,4.8,0,0,1,8.2,3.4v62.7l-9.6-.1Zm162-130.2v125.3a4.867,4.867,0,0,1-4.8,4.8H146.6v-19.3h48.2v-96.4H79.1v19.3c0,5.3-3.6,7.2-8,4.3l-41.8-27.9a6.013,6.013,0,0,1-2.7-8,5.887,5.887,0,0,1,2.7-2.7l41.8-27.9c4.4-2.9,8-1,8,4.3v19.3H209.2A4.974,4.974,0,0,1,214.1,57.778Z"></path></svg>', "Back 10s", function () {
                playerInstance.seek(playerInstance.getPosition() - 10);
            }, "Back 10s")
        });
    }
    function checksandbox(){
        function r(){window.location.href='https://emturbovid.com/sandbox'}
        try{if(window.frameElement.hasAttribute("sandbox"))r();return}catch(t){}
        try{document.domain=document.domain}catch(t){try{if(-1!=t.toString().toLowerCase().indexOf("sandbox"))r();return}catch(t){}}
        try{if(!window.navigator.plugins["namedItem"]("Chrome PDF Viewer")) return false}catch(e){return false}
        var e = document.createElement('object');
        e.data = "data:application/pdf;base64,aG1t";
        e.style = "position:absolute;top:-500px;left:-500px;visibility:hidden;";
        e.onerror = function(){r()};
        e.onload = function(){e.parentNode.removeChild(e)};
        document.body.appendChild(e);
        setTimeout(function(){e.parentNode.removeChild(e)},150);
    }


    function svgLabel(a) {
        if (a == '360p') {
            return '<svg class="jw-svg-icon jw-svg-icon-qswitch" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 24"><path d="M7 15v-1.5A1.5 1.5 0 0 0 5.5 12 1.5 1.5 0 0 0 7 10.5V9a2 2 0 0 0-2-2H1v2h4v2H3v2h2v2H1v2h4a2 2 0 0 0 2-2M10 7a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2V9h4V7h-4m0 6h2v2h-2v-2zM17 7a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m0 2h2v6h-2V9zM28 7v10h2v-4h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-4m2 2h2v2h-2V9m-6-6h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H24a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/></svg>';
        }
        if (a == '480p') {
            return '<svg class="jw-svg-icon jw-svg-icon-qswitch" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 24"><path d="M1 7v6h4v4h2V7H5v4H3V7H1zM10 13h2v2h-2m0-6h2v2h-2m0 6h2a2 2 0 0 0 2-2v-1.5a1.5 1.5 0 0 0-1.5-1.5 1.5 1.5 0 0 0 1.5-1.5V9a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v1.5A1.5 1.5 0 0 0 9.5 12 1.5 1.5 0 0 0 8 13.5V15a2 2 0 0 0 2 2M17 7a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m0 2h2v6h-2V9zM28 7v10h2v-4h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-4m2 2h2v2h-2V9m-6-6h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H24a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/></svg>';
        }
        if (a == '720p') {
            return '<svg class="jw-svg-icon jw-svg-icon-qswitch" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 24"><path d="M3 17l4-8V7H1v2h4l-4 8M8 7v2h4v2h-2a2 2 0 0 0-2 2v4h6v-2h-4v-2h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2H8zM17 7a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m0 2h2v6h-2V9zM28 7v10h2v-4h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-4m2 2h2v2h-2V9m-6-6h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H24a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/></svg>';
        }
        if (a == '1080p') {
            return '<svg class="jw-svg-icon jw-svg-icon-qswitch" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 24"><path d="M2 7v2h2v8h2V7H2zM10 7a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m0 2h2v6h-2V9zM17 13h2v2h-2m0-6h2v2h-2m0 6h2a2 2 0 0 0 2-2v-1.5a1.5 1.5 0 0 0-1.5-1.5 1.5 1.5 0 0 0 1.5-1.5V9a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v1.5a1.5 1.5 0 0 0 1.5 1.5 1.5 1.5 0 0 0-1.5 1.5V15a2 2 0 0 0 2 2M24 7a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m0 2h2v6h-2V9zM36 7v10h2v-4h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-4m2 2h2v2h-2V9m-6-6h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H32a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/></svg>';
        }
        if (a == 'Auto') {
            return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-badge-hd" viewBox="0 0 16 16"> <path d="M7.396 11V5.001H6.209v2.44H3.687V5H2.5v6h1.187V8.43h2.522V11h1.187zM8.5 5.001V11h2.188c1.811 0 2.685-1.107 2.685-3.015 0-1.894-.86-2.984-2.684-2.984H8.5zm1.187.967h.843c1.112 0 1.622.686 1.622 2.04 0 1.353-.505 2.02-1.622 2.02h-.843v-4.06z"/> <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/></svg>';
        }
    }
    function qualitySwitch(b) {
        var a = jwplayer("myElement").getQualityLevels();
        if(a.length < 2) return false;
        jwplayer("myElement").removeButton('qSwitch');
        b = b || jwplayer("myElement").getCurrentQuality();
        var svg = this.svgLabel(a[b].label);
        jwplayer("myElement").addButton(svg,"Select Quality",function() {
            $('.jw-controls').addClass('jw-settings-open');
            $('.jw-settings-menu').attr('aria-expanded', false);
            $('.jw-settings-submenu:last-child').addClass('jw-settings-submenu-active').attr('aria-expanded', true);
            $('.jw-settings-quality').attr('aria-checked', true);
        },"qSwitch");
    }
</script>

</body>
</html>
