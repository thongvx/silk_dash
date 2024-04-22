<!DOCTYPE html>
<html lang="en">
<head>
    <title>play origin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../frontend/images/logo1.png">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173619459-1"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jwplayer.com/libraries/5Mr0zETT.js"></script>

</head>
<style>
    #myElement{
        position: relative;
        height: 100vh !important;
    }
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
    .jw-icon-rewind {
        display: none !important;
    }
    .jwplayer .jw-media video.jw-video.jw-reset{
        left: 0.6%;
    }
    .jw-icon.jw-icon-display.jw-button-color.jw-reset{
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        align-content: center;
        flex-direction: column;
        position: absolute;
        top: 0;
        left: 0;
    }
    .row #myElement.jw-breakpoint-1 .jw-display .jw-svg-icon{
        width: 80px;
        height: 80px;
        line-height: 80px;
    }
    body{
        background-color: transparent;
    }
    #loader{
        position: absolute;
        top: 0;
        background: #000000e6;
        height: 100vh;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .jw-svg-icon-buffer {
        animation: app-logo-spin infinite 1s linear
    }
    @keyframes app-logo-spin {
        from {
            transform: rotate(0deg)
        }
        to {
            transform: rotate(360deg)
        }
    }
</style>
<body>
<div class="container-fluid"  onclick="play()" >
    <div class="col-md-12 col-lg-12 col-xs-12">
        <div class="row">
            <div id="myElement">

            </div>
            <script type="text/JavaScript">
                var playID = 0;
                var urlPlay = '{{ $urlPlay }}';
                jwplayer("myElement").setup({
                    "file": urlPlay,
                    "image": '',
                    'rtmp': {
                        'bufferlength': '6',
                    },
                });

                function fastForward(){
                    var svg = '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind2" viewBox="0 0 240 240" focusable="false"><path d="m 25.993957,57.778 v 125.3 c 0.03604,2.63589 2.164107,4.76396 4.8,4.8 h 62.7 v -19.3 h -48.2 v -96.4 H 160.99396 v 19.3 c 0,5.3 3.6,7.2 8,4.3 l 41.8,-27.9 c 2.93574,-1.480087 4.13843,-5.04363 2.7,-8 -0.57502,-1.174985 -1.52502,-2.124979 -2.7,-2.7 l -41.8,-27.9 c -4.4,-2.9 -8,-1 -8,4.3 v 19.3 H 30.893957 c -2.689569,0.03972 -4.860275,2.210431 -4.9,4.9 z m 163.422413,73.04577 c -3.72072,-6.30626 -10.38421,-10.29683 -17.7,-10.6 -7.31579,0.30317 -13.97928,4.29374 -17.7,10.6 -8.60009,14.23525 -8.60009,32.06475 0,46.3 3.72072,6.30626 10.38421,10.29683 17.7,10.6 7.31579,-0.30317 13.97928,-4.29374 17.7,-10.6 8.60009,-14.23525 8.60009,-32.06475 0,-46.3 z m -17.7,47.2 c -7.8,0 -14.4,-11 -14.4,-24.1 0,-13.1 6.6,-24.1 14.4,-24.1 7.8,0 14.4,11 14.4,24.1 0,13.1 -6.5,24.1 -14.4,24.1 z m -47.77056,9.72863 v -51 l -4.8,4.8 -6.8,-6.8 13,-12.99999 c 3.02543,-3.03598 8.21053,-0.88605 8.2,3.4 v 62.69999 z"></path></svg>';
                    jwplayer("myElement").addButton(svg,"Forward 10s",function() {
                        var position = jwplayer('myElement').getPosition(); position += 10; jwplayer('myElement').seek(position);
                        console.log(position)
                    },"fastForward");
                }

                function reWind(){
                    var svg = '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind" viewBox="0 0 240 240" focusable="false"><path d="M113.2,131.078a21.589,21.589,0,0,0-17.7-10.6,21.589,21.589,0,0,0-17.7,10.6,44.769,44.769,0,0,0,0,46.3,21.589,21.589,0,0,0,17.7,10.6,21.589,21.589,0,0,0,17.7-10.6,44.769,44.769,0,0,0,0-46.3Zm-17.7,47.2c-7.8,0-14.4-11-14.4-24.1s6.6-24.1,14.4-24.1,14.4,11,14.4,24.1S103.4,178.278,95.5,178.278Zm-43.4,9.7v-51l-4.8,4.8-6.8-6.8,13-13a4.8,4.8,0,0,1,8.2,3.4v62.7l-9.6-.1Zm162-130.2v125.3a4.867,4.867,0,0,1-4.8,4.8H146.6v-19.3h48.2v-96.4H79.1v19.3c0,5.3-3.6,7.2-8,4.3l-41.8-27.9a6.013,6.013,0,0,1-2.7-8,5.887,5.887,0,0,1,2.7-2.7l41.8-27.9c4.4-2.9,8-1,8,4.3v19.3H209.2A4.974,4.974,0,0,1,214.1,57.778Z"></path></svg>';
                    jwplayer("myElement").addButton(svg,"Rewind 10s",function() {
                        var position = jwplayer('myElement').getPosition(); if(position<10) position = 10; position -= 10; jwplayer('myElement').seek(position);
                        console.log(position)
                    },"Rewind");
                }
            </script>
        </div>
    </div>
</div>
</body>
</html>
