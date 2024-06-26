<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta content="Embed" name="description" />
    <meta name="google" content="notranslate">
    <link rel="icon" href="https://user.streamsilk.com/image/logo/logo1.png">
    <script src="{{asset('/assets/jwplayer/js/jwplayer.js')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/jwplayer/css/player.css')}}">
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <style>
        #video_player{
            height: 100vh !important;
        }
    </style>
</head>
<body>
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <div class="container-fluid">
        <div id="video_player">

        </div>
    </div>
<script>
    var t = 0;
    var playID = 0;
    var videoID ="{{ $videoID }}";
    var urlPlay = "{{ $urlPlay }}";
    var enablePlay = 'yes';
    //title
    var player = jwplayer('video_player');
    var hasReachedOneTenth = false;
    const loadPlayer = (file) => {
        const options = {
            key: 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=',
            sources: [{ file, type: 'hls' }],
            playbackRateControls: [0.75, 1, 1.25, 1.5],
            aspectratio: "16:9",
            jwplayer8quality: true,
            controls: true,
            preload: true,
            aspectratio: "16:9",
            width: '100%',
            height: '100%',
            skin: { active: "rgb(221,51,51)", },
            title : "{{ $title }}",
            localization: {
                locale: 'en',
            }
        };
        player.setup(options);
        player.on('time', function(event) {
            var currentPercentagePlayed = (event.position / player.getDuration()) * 100;
            if(player.getDuration()< 600){
                if(currentPercentagePlayed >= 60 && !hasReachedOneTenth){
                    hasReachedOneTenth = true;
                    increasePlayCount();
                }
            }else{
                if (currentPercentagePlayed >= 10 && !hasReachedOneTenth) {
                    hasReachedOneTenth = true;
                    increasePlayCount();
                }
            }

        });
        player.addButton(
            '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind2" viewBox="0 0 240 240" focusable="false"><path d="m 25.993957,57.778 v 125.3 c 0.03604,2.63589 2.164107,4.76396 4.8,4.8 h 62.7 v -19.3 h -48.2 v -96.4 H 160.99396 v 19.3 c 0,5.3 3.6,7.2 8,4.3 l 41.8,-27.9 c 2.93574,-1.480087 4.13843,-5.04363 2.7,-8 -0.57502,-1.174985 -1.52502,-2.124979 -2.7,-2.7 l -41.8,-27.9 c -4.4,-2.9 -8,-1 -8,4.3 v 19.3 H 30.893957 c -2.689569,0.03972 -4.860275,2.210431 -4.9,4.9 z m 163.422413,73.04577 c -3.72072,-6.30626 -10.38421,-10.29683 -17.7,-10.6 -7.31579,0.30317 -13.97928,4.29374 -17.7,10.6 -8.60009,14.23525 -8.60009,32.06475 0,46.3 3.72072,6.30626 10.38421,10.29683 17.7,10.6 7.31579,-0.30317 13.97928,-4.29374 17.7,-10.6 8.60009,-14.23525 8.60009,-32.06475 0,-46.3 z m -17.7,47.2 c -7.8,0 -14.4,-11 -14.4,-24.1 0,-13.1 6.6,-24.1 14.4,-24.1 7.8,0 14.4,11 14.4,24.1 0,13.1 -6.5,24.1 -14.4,24.1 z m -47.77056,9.72863 v -51 l -4.8,4.8 -6.8,-6.8 13,-12.99999 c 3.02543,-3.03598 8.21053,-0.88605 8.2,3.4 v 62.69999 z"></path></svg>',
            'next 10s',
            function () {
                player.seek(player.getPosition() + 10);
            },
            'next 10s'
        );
        player.addButton(
            '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind" viewBox="0 0 240 240" focusable="false"><path d="M113.2,131.078a21.589,21.589,0,0,0-17.7-10.6,21.589,21.589,0,0,0-17.7,10.6,44.769,44.769,0,0,0,0,46.3,21.589,21.589,0,0,0,17.7,10.6,21.589,21.589,0,0,0,17.7-10.6,44.769,44.769,0,0,0,0-46.3Zm-17.7,47.2c-7.8,0-14.4-11-14.4-24.1s6.6-24.1,14.4-24.1,14.4,11,14.4,24.1S103.4,178.278,95.5,178.278Zm-43.4,9.7v-51l-4.8,4.8-6.8-6.8,13-13a4.8,4.8,0,0,1,8.2,3.4v62.7l-9.6-.1Zm162-130.2v125.3a4.867,4.867,0,0,1-4.8,4.8H146.6v-19.3h48.2v-96.4H79.1v19.3c0,5.3-3.6,7.2-8,4.3l-41.8-27.9a6.013,6.013,0,0,1-2.7-8,5.887,5.887,0,0,1,2.7-2.7l41.8-27.9c4.4-2.9,8-1,8,4.3v19.3H209.2A4.974,4.974,0,0,1,214.1,57.778Z"></path></svg>',
            'prv 10s',
            function () {
                player.seek(player.getPosition() - 10);
            },
            'prv 10s'
        );
    };
    $(document).ready(async () => {
        let adBlockEnabled = false
        if(adBlockEnabled == false || enablePlay == 'yes'){
            let file = urlPlay;
            loadPlayer(file);
            $('.preloader').fadeOut();
        }
    });
    function increasePlayCount(videoID) {
        var apiUrl = "https://user.streamsilk.com/updateView/" + videoID;

        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error("HTTP error " + response.status);
                }
                return response.json();
            })
            .then(json => {
                console.log("update views success");
            })
            .catch(function() {
                console.log("fail");
            });
    }
</script>
</body>
</html>
