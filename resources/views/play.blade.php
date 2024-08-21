@php use App\Helpers\JsObfuscator; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>{{ $title }}</title>
    <meta content="Embed" name="description"/>
    <meta name="google" content="notranslate">
    <link rel="icon" type="image/png" href="{{ asset('image/logo/logo4.webp') }}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/jwplayer/css/player.css')}}">
    <style>
        .preloader .preloader-icon {
            border-top: 2px solid{{ $player_setting->premium_color }};
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
@php
    $custom_ads_json = json_encode($custom_ads);
    $poster_link = $player_setting->show_poster == 1 && $player_setting->poster_link != 0 ? asset(Storage::url($player_setting->poster_link)) : $poster;
    $logo_link =  asset(Storage::url($player_setting->logo_link));
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
    var urlStream = " $urlStream ";
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
    //ads
    const custom_ads = $custom_ads_json;
    function getVastAds(ads) {
        return ads.filter(ad => ad.adsType === 'vast');
    }
    function getDirectAds(ads) {
        return ads.filter(ad => ad.adsType === 'direct');
    }
    function getPopunderAds(ads) {
        return ads.filter(ad => ad.adsType === 'popunder');
    }
    //title

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
            sources: [{file, type: 'hls'}],
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
                'hrv': 'Croatian'
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
                console.error("Error loading subtitles:", error.message);
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
                "link": "$player_setting->power_url_logo"
            }
        }
        if (urlposter !== "" && urlposter !== "0") {
            options.image = urlposter
        }
        if (preview === 1) {
            const previewTrack = {
                file: `https://cdnimg.streamsilk.com/preview/${videoID}/${videoID}.jpg`,
                kind: "thumbnails",
            };
            if (!options.tracks) {
                options.tracks = [];
            }
            options.tracks.push(previewTrack)
        }
        const vastAds = getVastAds(custom_ads);
        if (vastAds.length > 0) {
            options.advertising = {
                client: 'vast',
                schedule: vastAds.map(ad => ({
                    tag: ad.linkAds,
                    offset: ad.offset
                }))
            };
        }
        player.setup(options);
        // window.addEventListener('beforeunload', function (e) {
        //     var currentPosition = player.getPosition();
        //     localStorage.setItem(`savedPosition_${videoID}`, currentPosition);
        // });
        if( download === 1){
            player.addButton(
                '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-download" viewBox="0 0 24 24" focusable="false"><path d="M12 16l4-4h-3V4h-2v8H8l4 4zm-6 2v2h12v-2H6z"/></svg>',
                'Download',
                function(){
                    const link_download = 'https://streamsilk.com/d/${videoID}';
                    openNewTab(link_download);
                },
                'Download'
            );
        }
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
        // const savedPosition = localStorage.getItem(`savedPosition_${videoID}`);
        // if (savedPosition) {
        //     options.autostart = false;
        //     player.on('ready', function() {
        //         player.seek(parseFloat(savedPosition));
        //     });
        // }
        player.on('seek', function () {
            isSeeking = true;
        });
        player.on('seeked', function () {
            isSeeking = false;
        });
        player.on('play', function () {
            isPaused = false;
            if (player.getDuration() < 600) {
                totalTimeRequired = player.getDuration() * 0.6
            } else {
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
        player.on('complete', function () {
            isPaused = true;
            clearInterval(intervalId);
        });
        player.on('captionsList', function() {
            const captionsList = player.getCaptionsList();
            if (captionsList.length > 1) {
                player.setCurrentCaptions(1);
            }
        });
        player.on('audioTracks', function() {
            const tracks_audio = player.getAudioTracks();
            if(tracks_audio.length > 1){
                player.addButton(
                    '<svg  xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-audio-tracks" aria-expanded="true" viewBox="0 0 150 130" focusable="false"><path d="M97.74,119.52a2,2,0,0,1-.68-.12V65.93a2,2,0,0,1,.68-.12c3.34,0,6.43,5,8.48,7l-.46-12.12c0-12.8-3.72-23.11-9.68-30.93a7.37,7.37,0,0,1-5.86-2.23l-.68-.7C80.91,18.29,69,14.44,57.24,14.66S33.76,19.19,25.69,26.91l-.66.64a7.3,7.3,0,0,1-6.49,2.05c-6,7.84-9.75,18.21-9.75,31.14L8.33,74.63c2.25-2.71,6.34-8.66,10-8.82v53.71C10.52,119.36,4.91,107.05,3,101H0V60.74A57.33,57.33,0,0,1,12.83,24.57a7.35,7.35,0,0,1,1.8-7.36l1-.95C26.36,6,41.62.3,57,0s31.25,4.9,42.87,16.46l.91.93a7.33,7.33,0,0,1,1.74,7.2,57.34,57.34,0,0,1,12.81,36.13V101h-2.21c-1.89,6.14-7.54,18.57-15.39,18.57Zm-5.55,3.36h-9a3.48,3.48,0,0,1-3.48-3.47V65.65a3.49,3.49,0,0,1,3.48-3.48h9v60.71Zm-69-60.71H33a3.5,3.5,0,0,1,3.48,3.48v53.76A3.49,3.49,0,0,1,33,122.88H23.14V62.17Z"/></svg>',
                    'Audio Tracks',
                    function() {
                        $('.jw-settings-submenu').removeClass('jw-settings-submenu-active');
                        $('.jw-icon').attr('aria-expanded', 'false');
                        $('.jw-settings-submenu-audioTracks').toggleClass('jw-settings-submenu-active');
                        $('.jw-controls.jw-reset').toggleClass('jw-settings-open');
                        if($('.jw-settings-submenu-audioTracks').hasClass('jw-settings-submenu-active')){
                            $('.jw-settings-submenu-audioTracks, #jw-settings-menu, .jw-submenu-audioTracks').attr('aria-expanded', 'true');
                        }else{
                            $('.jw-settings-submenu').removeClass('jw-settings-submenu-active');
                            $('.jw-icon').attr('aria-expanded', 'false');
                            $('.jw-settings-submenu-audioTracks, #jw-settings-menu, .jw-submenu-audioTracks').attr('aria-expanded', 'false');
                        }
                    },
                    'dualSound',
                    'jw-settings-audioTracks-button'
                );
            }
        });

    };
    $(document).ready(() => {
        if("${urlStream}" !== "0"){
            $.ajax({
                url: "${urlStream}",
                type: 'POST',
                data: urlStream,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        };

        const checkInterval = setInterval(async () => {
            let adBlockEnabled = false;
            const checkloadplayer = await checkUrlStatus(urlPlay);
            if ((adBlockEnabled == false || enablePlay == 'yes') && checkloadplayer == true) {
                clearInterval(checkInterval);
                let file = urlPlay;
                loadPlayer(file);
                $('.preloader').fadeOut();
            }
        }, 1000);
    });

    function openNewTab(url) {
        var a = document.createElement('a');
        a.href = url;
        a.target = '_blank';
        a.style.display = 'none';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    $(document).on('click', '#video_player', function () {
        if (playID === 0) {
            playID = 1;
            //openNewTab('//tsyndicate.com/api/v1/direct/9813a20eb31740eb94471b814de9693e?extid={extid}');
        }
    });
    $('body').click(function () {
        if (t === 0)
            openNewTab("https://ceehipsy.com/4/7779337");
        t = 1;
    });
    const directAds = getDirectAds(custom_ads);
    if(directAds.length > 0) {
        directAds.forEach((ad , index) => {
            setTimeout(() => {
                const adDiv = document.createElement('div');
                adDiv.className = 'div_pop';
                adDiv.id = 'pop'+ index;
                document.body.appendChild(adDiv);
                adDiv.addEventListener('click', function() {
                    openNewTab(ad.linkAds);
                    this.remove();
                });
            }, ad.offset * 1000);
        });
    }

    const popunderAds = getPopunderAds(custom_ads);
    if(popunderAds.length > 0) {
        popunderAds.forEach(ad => {
            setTimeout(() => {
                const script = document.createElement('script');
                script.type = 'application/javascript';
                script.src = 'https://streamsilk.com/ads.js';
                document.head.appendChild(script);
            }, ad.offset * 1000);
        });
    }

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
                console.log("update views success");
            })
            .catch(function () {
                console.log("fail");
            });
    };

    async function checkUrlStatus(url) {
        try {
            const response = await fetch(url, {
                method: 'GET',
                mode: 'cors'
            });

            if (response.status === 200) {
                return true;
            } else {
                return false;
            }
        } catch (error) {
            return false;
        }
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

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-Q2MFXEGDES');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        for (var j = 0; j < document.scripts.length; j++) {
            if (document.scripts[j].src === r) {
                return;
            }
        }
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(97794899, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/97794899" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
</body>
</html>
