@php use App\Helpers\JsObfuscator; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ $title }}</title>
    <meta content="Embed" name="description" />
    <meta name="google" content="notranslate">
    <link rel="icon" type="image/png" href="{{ asset('image/logo/logo4.webp') }}" />
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/jwplayer/css/player.css?v=1.6')}}">
    <style>
        .preloader .preloader-icon{
            border-top: 2px solid {{ $player_setting->premium_color }};
        }
    </style>
</head>
<body>
<div id="pop" class="div_pop"></div>
<div class="preloader">
    <div class="preloader-icon"></div>
    <span>Loading...</span>
</div>
<div class="container-fluid">
    <div id="video_player">

    </div>
</div>
@php
    $poster_link = $player_setting->show_poster == 1 && $player_setting->poster_link != 0 ? asset(Storage::url($player_setting->poster_link)) : $poster;
    $logo_link =  asset(Storage::url($player_setting->logo_link))
@endphp
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('/assets/jwplayer/js/jwplayer2.js')}}"></script>
<?php
$jsCode = <<<JS
    var t = 0;
    var playID = 0;
    var videoID = " $videoID ";
    var urlPlay = " $urlPlay ";
    var iframe =  $iframe ;
    var typeVideo =  $videoType ;
    var premium =  $premium ;
    var enablePlay = 'yes';
    var urlSub =  $player_setting->enable_caption ;
    var is_sub =  $is_sub ;
    var infinite_loop = " $player_setting->infinite_loop ";
    var logo_link = " $player_setting->logo_link ";
    var logo =  $player_setting->show_logo ;
    var preview =  $player_setting->show_preview ;
    var download =  $player_setting->show_download ;
    var show_title =  $player_setting->show_title ;
    // Preload
    var preload = infinite_loop === "1" ? "true" : "false";
    //logo
    var urlLogo;
    if (logo === 1 && logo_link !== '') {
        if (logo_link.includes("http")) {
            urlLogo = logo_link
        } else {
            urlLogo = "$logo_link";
        }
    } else {
        urlLogo = ""
    }
    //poster
    var urlposter = "$poster_link";
    //title
    var title = " $player_setting->show_title == 1 ? $title : ''";
    var player = jwplayer('video_player');

    var viewTime = 0;
    var isSeeking = false;
    var isPaused = false;
    var intervalId;
    var totalTimeRequired;
    var hasIncreasedPlayCount = false;

    const loadPlayer = async (file) => {
        const options = {
            key: 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=',
            sources: [{ file, type: 'mp4' }],
            playbackRateControls: [0.75, 1, 1.25, 1.5],
            aspectratio: "16:9",
            jwplayer8quality: true,
            controls: true,
            preload: preload,
            width: '100%',
            height: '100%',
            skin: {active: " $player_setting->premium_color ",},
            localization: {
                locale: 'en',
            },
            autostart: false,
            safarihlsjs: true,
        };
        if (urlSub === 1 && is_sub === 1) {
            const jsonUrl = `https://streamsilk.com/storage/subtitles/$slug_sub/$slug_sub.json`;
            const languageCodes = {
                'eng': 'English',
                'spa': 'Spanish',
                'aze': 'Azerbaijani',
                'alb': 'Albanian',
                'ara': 'Arabic',
                'bul': 'Bulgarian',
                'chi': 'Chinese',
                'dnk': 'Denmark',
                'per': 'Persian',
                'fin': 'Finland',
                'fre': 'French',
                'ger': 'German',
                'gre': 'Greek',
                'heb': 'Hebrew',
                'hin': 'Hindi',
                'hun': 'Hungarian',
                'ind': 'Indonesian',
                'ita': 'Italian',
                'jpn': 'Japanese',
                'kan': 'Kannada',
                'khm': 'Khmer',
                'kor': 'Korean',
                'mal': 'Malayalam',
                'may': 'Malay',
                'nor': 'Norway',
                'pol': 'Polish',
                'por': 'Portuguese',
                'rus': 'Russian',
                'sin': 'Sinhala',
                'slv': 'Slovenian',
                'srp': 'Serbian',
                'swe': 'Sweden',
                'tam': 'Tamil',
                'tha': 'Thai',
                'tur': 'Turkish',
                'ukr': 'Ukrainian',
                'vie': 'Vietnamese',
                'rum': 'Romanian',
                'mar': 'Marathi',
                'cze': 'Czech',
                'slo': 'Slovak',
                'lit': 'Lithuanian',
                'kur': 'Kurdish',
                'dan': 'Danish',
                'bos': 'Bosnian',
                'hrv': 'Croatian',
                'ton': 'Tongan',
            };
            try {
                const response = await fetch(jsonUrl);
                if (!response.ok) throw new Error("Subtitle file not found");
                const data = await response.json();
                const tracks = data.map(item => ({
                    file: item.file,
                    label: languageCodes[item.label] + ' (' + item.label + ')',
                    kind: 'captions',
                    language: item.label
                }));
                // Add subtitle tracks to the player options
                if (tracks.length > 0) {
                    options.tracks = tracks;
                    options.captions = { default: true, track: 1 };
                }
            } catch (error) {
            }
        }
         if(show_title !== 0){
            options.title = "$title";
        }
        if (urlLogo !== "") {
            options.logo = {
                "file": urlLogo,
                'hide': 1,
                "position": "$player_setting->position",
                "width": 100,
                "height": 50,
                "link": " $player_setting->power_url_logo "
            }
        }
        if (urlposter !== "" && urlposter !== "0") {
            options.image = urlposter
        }
        player.setup(options);
        player.addButton(
            '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-next" viewBox="0 0 240 240" focusable="false"><path d="m 25.993957,57.778 v 125.3 c 0.03604,2.63589 2.164107,4.76396 4.8,4.8 h 62.7 v -19.3 h -48.2 v -96.4 H 160.99396 v 19.3 c 0,5.3 3.6,7.2 8,4.3 l 41.8,-27.9 c 2.93574,-1.480087 4.13843,-5.04363 2.7,-8 -0.57502,-1.174985 -1.52502,-2.124979 -2.7,-2.7 l -41.8,-27.9 c -4.4,-2.9 -8,-1 -8,4.3 v 19.3 H 30.893957 c -2.689569,0.03972 -4.860275,2.210431 -4.9,4.9 z m 163.422413,73.04577 c -3.72072,-6.30626 -10.38421,-10.29683 -17.7,-10.6 -7.31579,0.30317 -13.97928,4.29374 -17.7,10.6 -8.60009,14.23525 -8.60009,32.06475 0,46.3 3.72072,6.30626 10.38421,10.29683 17.7,10.6 7.31579,-0.30317 13.97928,-4.29374 17.7,-10.6 8.60009,-14.23525 8.60009,-32.06475 0,-46.3 z m -17.7,47.2 c -7.8,0 -14.4,-11 -14.4,-24.1 0,-13.1 6.6,-24.1 14.4,-24.1 7.8,0 14.4,11 14.4,24.1 0,13.1 -6.5,24.1 -14.4,24.1 z m -47.77056,9.72863 v -51 l -4.8,4.8 -6.8,-6.8 13,-12.99999 c 3.02543,-3.03598 8.21053,-0.88605 8.2,3.4 v 62.69999 z"></path></svg>',
            'next 10s',
            function () {
                player.seek(player.getPosition() + 10);
            },
            'next 10s'
        );
        player.addButton(
            '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-prv" viewBox="0 0 240 240" focusable="false"><path d="M113.2,131.078a21.589,21.589,0,0,0-17.7-10.6,21.589,21.589,0,0,0-17.7,10.6,44.769,44.769,0,0,0,0,46.3,21.589,21.589,0,0,0,17.7,10.6,21.589,21.589,0,0,0,17.7-10.6,44.769,44.769,0,0,0,0-46.3Zm-17.7,47.2c-7.8,0-14.4-11-14.4-24.1s6.6-24.1,14.4-24.1,14.4,11,14.4,24.1S103.4,178.278,95.5,178.278Zm-43.4,9.7v-51l-4.8,4.8-6.8-6.8,13-13a4.8,4.8,0,0,1,8.2,3.4v62.7l-9.6-.1Zm162-130.2v125.3a4.867,4.867,0,0,1-4.8,4.8H146.6v-19.3h48.2v-96.4H79.1v19.3c0,5.3-3.6,7.2-8,4.3l-41.8-27.9a6.013,6.013,0,0,1-2.7-8,5.887,5.887,0,0,1,2.7-2.7l41.8-27.9c4.4-2.9,8-1,8,4.3v19.3H209.2A4.974,4.974,0,0,1,214.1,57.778Z"></path></svg>',
            'prv 10s',
            function () {
                player.seek(player.getPosition() - 10);
            },
            'prv 10s'
        );
        player.on('seek', function() {
            isSeeking = true;
        });
        player.on('seeked', function () {
            isSeeking = false;
        });
        player.on('play', function () {
            isPaused = false;
            if(player.getDuration() < 600){
                totalTimeRequired = player.getDuration() * 0.6
            }else{
                totalTimeRequired = 300
            }
            clearInterval(intervalId);
            if (viewTime >= totalTimeRequired) {
                return
            }
            intervalId = setInterval(function () {
                if (!isSeeking && !isPaused) {
                    viewTime++;
                    if (viewTime >= totalTimeRequired && !hasIncreasedPlayCount) {
                        clearInterval(intervalId);
                        increasePlayCount(videoID);
                        hasIncreasedPlayCount = true;
                    }
                }
            }, 1000);
        });
        player.on('pause', function () {
            isPaused = true;
            clearInterval(intervalId);
        });

        player.on('complete', function() {
            isPaused = true;
            clearInterval(intervalId);
        });
        player.on('ready', function() {
            const nextButton = document.querySelector('.jw-display-icon-next');
            console.log(nextButton);
            if (nextButton) {
                nextButton.className = 'jw-display-icon-container jw-display-icon-rewind';
                nextButton.setAttribute('aria-label', 'Skip 10 Seconds');
                nextButton.style.visibility = 'visible';
                nextButton.innerHTML =`
                    <div class="jw-icon jw-icon-next jw-button-color jw-reset" role="button" tabindex="0" aria-label="Next">
                        <svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind2" viewBox="0 0 240 240" focusable="false"><path d="m 25.993957,57.778 v 125.3 c 0.03604,2.63589 2.164107,4.76396 4.8,4.8 h 62.7 v -19.3 h -48.2 v -96.4 H 160.99396 v 19.3 c 0,5.3 3.6,7.2 8,4.3 l 41.8,-27.9 c 2.93574,-1.480087 4.13843,-5.04363 2.7,-8 -0.57502,-1.174985 -1.52502,-2.124979 -2.7,-2.7 l -41.8,-27.9 c -4.4,-2.9 -8,-1 -8,4.3 v 19.3 H 30.893957 c -2.689569,0.03972 -4.860275,2.210431 -4.9,4.9 z m 163.422413,73.04577 c -3.72072,-6.30626 -10.38421,-10.29683 -17.7,-10.6 -7.31579,0.30317 -13.97928,4.29374 -17.7,10.6 -8.60009,14.23525 -8.60009,32.06475 0,46.3 3.72072,6.30626 10.38421,10.29683 17.7,10.6 7.31579,-0.30317 13.97928,-4.29374 17.7,-10.6 8.60009,-14.23525 8.60009,-32.06475 0,-46.3 z m -17.7,47.2 c -7.8,0 -14.4,-11 -14.4,-24.1 0,-13.1 6.6,-24.1 14.4,-24.1 7.8,0 14.4,11 14.4,24.1 0,13.1 -6.5,24.1 -14.4,24.1 z m -47.77056,9.72863 v -51 l -4.8,4.8 -6.8,-6.8 13,-12.99999 c 3.02543,-3.03598 8.21053,-0.88605 8.2,3.4 v 62.69999 z"></path></svg>
                    </div>`;

                nextButton.addEventListener('click', () => {
                    const player = jwplayer();
                    const currentTime = player.getPosition();
                    const duration = player.getDuration();
                    const newTime = Math.min(currentTime + 10, duration); // Không tua quá thời lượng video
                    player.seek(newTime);
                });
            }
        });
    };

    $(document).ready(async () => {
        let adBlockEnabled = false;
        if(adBlockEnabled == false || enablePlay == 'yes'){
            let file = urlPlay;
            loadPlayer(file);
            $('.preloader').fadeOut();
        }
    });
function openNewTab(url) {
        var a = document.createElement('a');
        a.href = url;
        a.target = '_blank';
        a.style.display = 'none';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    };
    $('#pop').on("click", () => {
        var e = document.getElementById('pop');
        e.remove();
        window.open("https://holahupa.com/2032563/");
        //ads gala
        var script = document.createElement('script');
        script.type = 'application/javascript';
        script.src = 'https://streamsilk.com/ads.js';
        document.head.appendChild(script);
    });
    $(document).on('click', '#video_player', function () {
        if (playID === 0) {
            playID = 1;
            //openNewTab('//tsyndicate.com/api/v1/direct/9813a20eb31740eb94471b814de9693e?extid={extid}');
        }
    });
    let pop15s = setTimeout(function() {
        $('body').one(function(){
            if(t === 0)
                window.open("https://ceehipsy.com/4/7779337");
            t = 1;
            clearTimeout(pop15s)
        })
    }, 10000);
    function increasePlayCount(videoID) {
        var apiUrl = "https://streamsilk.com/updateViewUpdate/${videoID}";
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error("HTTP error " + response.status);
                }
                return response.json();
            })
            .then(json => {
            })
            .catch(function () {
            });
    }

JS;

$obsfucator = new JsObfuscator($jsCode);
$obsfucatedJs = $obsfucator->obfuscate();
echo "<script>" . $obsfucatedJs . "</script>";
?>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q2MFXEGDES"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Q2MFXEGDES');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(97794899, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/97794899" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
