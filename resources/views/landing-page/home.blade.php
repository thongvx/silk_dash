@extends('landing-page.layouts.app')

@section('content')
    <section class="bg-white pb-10">
        <div class="relative grid grid-cols-2 w-full px-0 overflow-hidden bg-cover bg-right bg-no-repeat"
             style='background-image: url({{ asset('image/landing-page/wave5.svg') }})'>
            <div class="col-span-2 lg:col-span-1 px-5 lg:pl-24 lg:px-0 pt-10 xl:pt-20">
                <div class="text-white ">
                    <h5 class="text-4xl xl:text-5xl font-extrabold">Secure & Powerful<br>
                        Video Streaming Platform</h5>
                    <h6 class="text-lg mt-12 italic font-medium">Our platform is committed to providing a seamless,
                        high-quality video streaming service that caters to your needs.</h6>
                    <a href="/dashboard">
                        <button
                            class="px-12 py-4 font-semibold rounded-full bg-[#009FB2]/80 hover:bg-[#009FB2] text-white text-2xl mt-6 italic">
                            Get Start
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1 flex justify-center relative p-8">
                <img src="{{ asset('image/landing-page/video-upload-animate.svg') }}" loading="lazy" alt="" class="w-full">
            </div>
        </div>
        <div class="relative w-full lg:px-20 mt-10 lg:mt-0">
            <div class="w-full rounded-3xl text-white px-4">
                <h4 class="text-5xl text-center font-semibold mb-24 text-[#142132]">Our Features</h4>
                <div class="grid grid-cols-3 gap-6 lg:gap-10 mt-6 relative">
                    <div class="col-span-2 lg:col-span-3 w-full h-full absolute p-10 lg:p-20 flex">
                        <div class="h-full w-full bg-gradient-to-r from-teal-500 to-green-500 via-cyan-500"></div>
                    </div>
                    <div class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" fill="white"
                             width="100" height="80"
                             viewBox="0 0 122.88 99.09" style="enable-background:new 0 0 122.88 99.09"
                             xml:space="preserve"><g>
                                <path
                                    d="M7.87,0h107.12c1.96,0,3.73,0.8,5.02,2.08c1.29,1.29,2.08,3.06,2.08,5.02v57.54c0,1.96-0.8,3.73-2.08,5.02 c-1.28,1.28-3.06,2.08-5.02,2.08H7.87c-1.96,0-3.73-0.8-5.02-2.08c-1.29-1.29-2.08-3.06-2.08-5.02V7.1c0-1.96,0.8-3.73,2.08-5.02 C4.14,0.8,5.92,0,7.87,0L7.87,0z M67.07,35.97L52.9,26.09v19.68L67.07,35.97L67.07,35.97z M51.52,17.33l22.86,15.95 c0.36,0.22,0.68,0.52,0.93,0.89c1,1.45,0.64,3.45-0.81,4.45L51.72,54.37c-0.55,0.45-1.26,0.72-2.03,0.72 c-1.77,0-3.21-1.44-3.21-3.21V19.95h0.01c0-0.63,0.19-1.27,0.58-1.83C48.08,16.67,50.08,16.32,51.52,17.33L51.52,17.33z M61.98,77.39c2.99,0,5.7,1.22,7.66,3.18l0.01,0.01l0.01-0.01c1.23,1.23,2.17,2.76,2.7,4.46h47.32c1.77,0,3.21,1.44,3.21,3.21 c0,1.77-1.44,3.21-3.21,3.21H72.35c-0.53,1.71-1.46,3.23-2.7,4.46c-1.96,1.96-4.68,3.18-7.67,3.18c-3,0-5.71-1.21-7.67-3.18 c-1.23-1.23-2.17-2.76-2.7-4.46H3.21C1.44,91.45,0,90.01,0,88.24c0-1.77,1.44-3.21,3.21-3.21h48.4c0.53-1.71,1.46-3.23,2.7-4.46 c0.07-0.07,0.14-0.13,0.21-0.19C56.46,78.53,59.09,77.39,61.98,77.39L61.98,77.39z M65.12,85.1c-0.8-0.8-1.91-1.29-3.14-1.29 c-1.17,0-2.23,0.44-3.02,1.17l-0.12,0.13c-0.8,0.8-1.3,1.91-1.3,3.14c0,1.22,0.5,2.33,1.3,3.14c0.8,0.8,1.91,1.3,3.14,1.3 c1.22,0,2.33-0.5,3.14-1.3c0.75-0.75,1.23-1.77,1.29-2.9c-0.01-0.08-0.01-0.15-0.01-0.23c0-0.08,0-0.16,0.01-0.23 C66.35,86.88,65.87,85.86,65.12,85.1L65.12,85.1L65.12,85.1z M114.99,6.42H7.87c-0.18,0-0.35,0.08-0.48,0.2 c-0.12,0.12-0.2,0.29-0.2,0.48v57.54c0,0.18,0.08,0.35,0.2,0.48c0.12,0.12,0.29,0.2,0.48,0.2h107.12c0.18,0,0.35-0.08,0.48-0.2 c0.12-0.12,0.2-0.29,0.2-0.48V7.1c0-0.18-0.08-0.35-0.2-0.48C115.35,6.5,115.18,6.42,114.99,6.42L114.99,6.42z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-red-500">
                            HLS Streaming</h4>
                        <p>HLS Streaming technology and Global server system, optimize video playback speed.</p>
                    </div>
                    <div class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_2" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             x="0px" y="0px" viewBox="0 0 122.88 103.77"
                             style="enable-background:new 0 0 122.88 103.77" xml:space="preserve"><g>
                                <path
                                    d="M86.35,29.93c-0.76,0.37-1.51,0.77-2.26,1.21c-2.25,1.32-4.47,2.93-6.74,4.78l-4.83-5.54c1.67-1.55,3.48-2.96,5.4-4.21 c1.53-1,3.13-1.89,4.78-2.65c0.66-0.33,1.32-0.64,2-0.93c-3.19-5.65-7.78-9.7-12.98-12.2c-5.2-2.49-11.02-3.45-16.69-2.9 c-5.63,0.54-11.1,2.59-15.62,6.1c-5.22,4.05-9.2,10.11-10.73,18.14l-0.47,2.51l-2.5,0.44c-2.45,0.43-4.63,1.02-6.56,1.77 c-1.86,0.72-3.52,1.61-4.97,2.66c-1.16,0.84-2.16,1.78-3.01,2.8C8.53,45.06,7.31,49.01,7.34,53c0.03,4.06,1.35,8.16,3.79,11.54 c0.9,1.25,1.96,2.4,3.16,3.4c1.22,1.01,2.59,1.85,4.13,2.48c1.25,0.51,2.61,0.91,4.09,1.18v7.43c-2.51-0.35-4.8-0.96-6.88-1.82 c-2.27-0.94-4.28-2.15-6.05-3.63c-1.68-1.4-3.15-2.99-4.4-4.72C1.84,64.25,0.04,58.63,0,53.03c-0.04-5.66,1.72-11.29,5.52-15.85 c1.23-1.48,2.68-2.84,4.34-4.04c1.93-1.4,4.14-2.58,6.63-3.55c1.72-0.67,3.56-1.23,5.5-1.68c2.2-8.73,6.89-15.47,12.92-20.15 c5.64-4.37,12.43-6.92,19.42-7.59c6.96-0.67,14.12,0.51,20.55,3.6c7.02,3.37,13.14,8.98,17.11,16.87l0,0 c1.6-0.25,3.2-0.37,4.79-0.36c6.72,0.04,13.19,2.45,18.3,7.95c1.07,1.15,2.08,2.45,3.02,3.9c3.2,4.92,4.84,11.49,4.77,17.92 c-0.07,6.31-1.77,12.59-5.25,17.21c-2.26,3.02-5.18,5.47-8.67,7.42c-3.36,1.88-7.28,3.31-11.68,4.33l-0.82,0.1h-3.28v-7.37h2.89 c3.53-0.85,6.65-2,9.3-3.48c2.63-1.47,4.78-3.26,6.39-5.41c2.5-3.33,3.73-8.04,3.78-12.87c0.06-5.07-1.18-10.15-3.59-13.86 c-0.69-1.07-1.45-2.03-2.25-2.89c-3.61-3.89-8.19-5.59-12.95-5.62C93.3,27.61,89.73,28.43,86.35,29.93L86.35,29.93L86.35,29.93z M83.46,56.79c-0.07,0-0.13,0.01-0.2,0.01H35.96c-0.07,0-0.14,0-0.2-0.01c-0.22,0.04-0.43,0.15-0.58,0.31 c-0.2,0.2-0.33,0.48-0.33,0.78v13.21c0,0.3,0.13,0.58,0.33,0.78c0.2,0.2,0.48,0.33,0.78,0.33h47.29c0.3,0,0.58-0.13,0.78-0.33 c0.2-0.2,0.33-0.48,0.33-0.78V57.88c0-0.3-0.13-0.58-0.33-0.78C83.88,56.94,83.68,56.83,83.46,56.79L83.46,56.79L83.46,56.79z M77.6,94.5v9.27h-6.34V94.5H77.6L77.6,94.5z M47.97,94.5v9.27h-6.34V94.5H47.97L47.97,94.5z M75.19,61.5c1.82,0,3.3,1.48,3.3,3.3 c0,1.82-1.48,3.3-3.3,3.3c-1.82,0-3.3-1.48-3.3-3.3C71.89,62.98,73.36,61.5,75.19,61.5L75.19,61.5z M83.46,75.76 c-0.07,0-0.13,0.01-0.2,0.01H35.96c-0.07,0-0.14,0-0.2-0.01c-0.22,0.04-0.43,0.15-0.58,0.31c-0.2,0.2-0.33,0.48-0.33,0.78v13.21 c0,0.3,0.13,0.58,0.33,0.78c0.2,0.2,0.48,0.33,0.78,0.33h47.29c0.3,0,0.58-0.13,0.78-0.33c0.2-0.2,0.33-0.48,0.33-0.78V76.85 c0-0.3-0.13-0.58-0.33-0.78C83.88,75.91,83.68,75.8,83.46,75.76L83.46,75.76L83.46,75.76z M39.56,79.86h2.78v7.19h-2.78V79.86 L39.56,79.86L39.56,79.86z M47.24,79.86h2.78v7.19h-2.78V79.86L47.24,79.86L47.24,79.86z M54.93,79.86h2.78v7.19h-2.78V79.86 L54.93,79.86L54.93,79.86z M39.56,60.89h2.78v7.19h-2.78V60.89L39.56,60.89L39.56,60.89z M47.24,60.89h2.78v7.19h-2.78V60.89 L47.24,60.89L47.24,60.89z M54.93,60.89h2.78v7.19h-2.78V60.89L54.93,60.89L54.93,60.89z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">
                            Unlimited Storage</h4>
                        <p>Upload as many videos as you want. Active files will be saved on a secure server system.</p>
                    </div>
                    <div class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_3" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             x="0px" y="0px" viewBox="0 0 122.88 121.08"
                             style="enable-background:new 0 0 122.88 121.08" xml:space="preserve"><g>
                                <path
                                    d="M15.36,86.24c1.14-0.89,2.79-0.68,3.68,0.46c0.89,1.14,0.68,2.79-0.46,3.68L5.35,100.66l-0.1,13.85l16.25-0.91l8.82-14.02 c0.77-1.22,2.39-1.59,3.61-0.82c1.22,0.77,1.59,2.39,0.82,3.61l-9.5,15.09c-0.43,0.73-1.21,1.24-2.12,1.29L2.76,119.9v0 c-0.05,0-0.1,0-0.15,0c-1.44-0.01-2.61-1.18-2.6-2.63l0.13-17.71c-0.06-0.85,0.29-1.71,1.01-2.27L15.36,86.24L15.36,86.24z M40.09,53.93c6.6-19.73,15.5-33.72,28.02-42.53C81.1,2.25,97.8-1.21,119.68,0.37c1.51,0.11,2.67,1.35,2.69,2.83 c2.12,23.69-2.48,40.49-12.28,53.22c-9.43,12.24-23.58,20.52-41.14,27.47v23.13c0,1.13-0.65,2.12-1.6,2.59l-17.88,11.05 c-1.36,0.84-3.14,0.42-3.98-0.94c-0.22-0.36-0.36-0.75-0.41-1.14l0,0c-3.96-30.26-8.17-31.71-32.91-40.27 c-2.96-1.02-6.15-2.13-8.31-2.89c-1.51-0.53-2.3-2.19-1.77-3.69c0.11-0.32,0.28-0.61,0.48-0.87l11.79-16.8 c0.59-0.84,1.55-1.28,2.5-1.23v0L40.09,53.93L40.09,53.93z M90.71,31.64c-1.6-1.6-3.8-2.58-6.24-2.58c-2.43,0-4.64,0.99-6.24,2.58 c-1.6,1.6-2.58,3.8-2.58,6.24c0,2.43,0.99,4.64,2.58,6.24c1.6,1.6,3.8,2.58,6.24,2.58c2.43,0,4.64-0.99,6.24-2.58 c1.6-1.6,2.58-3.8,2.58-6.24C93.29,35.44,92.3,33.24,90.71,31.64L90.71,31.64z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-green-500">
                            Unlimited bandwidth</h4>
                        <p>Stream videos from anywhere, anytime with unlimited bandwidth and speed</p>
                    </div>
                    <div class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             viewBox="0 0 111.87 122.88">
                            <defs>
                                <style>.cls-1 {
                                        fill-rule: evenodd;
                                    }</style>
                            </defs>
                            <title>video-file</title>
                            <path class="cls-1"
                                  d="M56.75,113.57V75.07a9.34,9.34,0,0,1,9.31-9.31h36.5a9.34,9.34,0,0,1,9.31,9.31v38.5a9.34,9.34,0,0,1-9.31,9.31H66.06a9.34,9.34,0,0,1-9.31-9.31Zm2.74-102.1L79.08,29.82H59.49V11.47ZM20.72,69.38a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21H45.3V69.38Zm.68,15.83a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H46V85.21Zm-.7-47.5a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H43.45a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0-15.83a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21h12.5a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0,31.67a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H59.16a2.12,2.12,0,0,0,2-2.21,2.09,2.09,0,0,0-2-2.21ZM90,32.45a3.26,3.26,0,0,0-2.37-3.14L58.74,1.2A3.21,3.21,0,0,0,56.23,0H5.87A5.86,5.86,0,0,0,0,5.86V106.25a5.84,5.84,0,0,0,1.72,4.15,5.91,5.91,0,0,0,4.15,1.71H45.39v-6.55H6.55v-99H52.94V33.08a3.29,3.29,0,0,0,3.29,3.29h27.2V57.82H90V32.45Zm4.3,63.73c1.9-1.23,1.89-2.59,0-3.68L77.39,81.23c-1.55-1-3.16-.4-3.12,1.62l.06,22.78c.13,2.19,1.38,2.79,3.23,1.77L94.28,96.18Z"/>
                        </svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-amber-600">
                            Large File accepted</h4>
                        <p>You are allowed to upload a file up to 15 GB</p>
                    </div>
                    <div class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_5" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             x="0px" y="0px" viewBox="0 0 122.88 122.88"
                             style="enable-background:new 0 0 122.88 122.88" xml:space="preserve"><style
                                type="text/css">.st0 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                }</style>
                            <g>
                                <path class="st0"
                                      d="M61.44,0c9.75,0,18.96,2.27,27.15,6.31c-2.61,2.27-4.78,5.04-6.36,8.16c-6.36-2.82-13.39-4.39-20.79-4.39 c-28.36,0-51.35,22.99-51.35,51.35c0,28.36,22.99,51.35,51.35,51.35c28.36,0,51.35-22.99,51.35-51.35c0-2.89-0.24-5.72-0.7-8.48 c3.46-0.76,6.67-2.19,9.49-4.14c0.85,4.07,1.3,8.29,1.3,12.62c0,33.93-27.51,61.44-61.44,61.44S0,95.37,0,61.44S27.51,0,61.44,0 L61.44,0z M111.04,22.13h10.28v8.71h-10.28v11.78h-9.5V30.83H91.23v-8.71h10.31V10.67h9.5V22.13L111.04,22.13z M67.58,59.6 c-1.95-1.03-3.37-2.2-4.26-3.48c-1.22-1.75-1.83-3.76-1.83-6.03c0-3.74,1.76-6.8,5.28-9.19c2.75-1.82,6.38-2.74,10.9-2.74 c5.99,0,10.4,1.14,13.27,3.42c2.86,2.27,4.29,5.14,4.29,8.59c0,2.02-0.57,3.89-1.72,5.64c-0.86,1.3-2.21,2.56-4.05,3.78 c2.42,1.16,4.23,2.7,5.42,4.6c1.2,1.92,1.79,4.03,1.79,6.35c0,2.24-0.51,4.32-1.54,6.27c-1.03,1.95-2.29,3.45-3.78,4.5 c-1.5,1.06-3.36,1.83-5.58,2.33c-2.23,0.5-4.6,0.75-7.13,0.75c-4.74,0-8.35-0.56-10.86-1.68c-2.5-1.12-4.39-2.77-5.7-4.95 c-1.3-2.18-1.96-4.6-1.96-7.29c0-2.62,0.61-4.84,1.83-6.67C63.17,62,65.04,60.6,67.58,59.6L67.58,59.6z M73.18,50.82 c0,1.54,0.49,2.79,1.46,3.74c0.97,0.95,2.26,1.42,3.88,1.42c1.43,0,2.6-0.47,3.52-1.41c0.93-0.94,1.38-2.15,1.38-3.62 c0-1.55-0.48-2.8-1.44-3.77c-0.97-0.97-2.2-1.45-3.69-1.45c-1.51,0-2.75,0.47-3.7,1.42C73.65,48.09,73.18,49.32,73.18,50.82 L73.18,50.82z M72.49,70.06c0,1.98,0.6,3.58,1.8,4.84c1.2,1.25,2.57,1.87,4.11,1.87c1.49,0,2.82-0.64,4-1.91 c1.18-1.27,1.77-2.88,1.77-4.84c0-1.98-0.59-3.59-1.78-4.85c-1.2-1.26-2.57-1.89-4.13-1.89c-1.55,0-2.9,0.61-4.04,1.83 C73.06,66.33,72.49,67.99,72.49,70.06L72.49,70.06z M51.83,38.16v45.49H39.27V53.89c-2.03,1.54-4,2.78-5.9,3.73 c-1.91,0.95-4.29,1.86-7.15,2.73V50.22c4.23-1.37,7.52-3.02,9.85-4.94c2.34-1.93,4.18-4.3,5.5-7.12H51.83L51.83,38.16z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-fuchsia-500">
                            Adult Content</h4>
                        <p>All the legal adult contents are allowed without any restrictions.</p>
                    </div>
                    <div class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" fill="white"
                             width="100" height="80"
                             text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                             clip-rule="evenodd" viewBox="0 0 512 331.617">
                            <path fill-rule="nonzero"
                                  d="M271.099 21.308C274.787 6.304 289.956-2.873 304.96.815c15.005 3.688 24.181 18.857 20.493 33.862l-68.491 275.632c-3.689 15.005-18.857 24.181-33.862 20.493-15.005-3.688-24.181-18.857-20.493-33.862l68.492-275.632zm-118.45 224.344c11.616 10.167 12.795 27.834 2.628 39.45-10.168 11.615-27.835 12.794-39.45 2.627L9.544 194.604C-2.071 184.437-3.25 166.77 6.918 155.155c.873-.997 1.8-1.912 2.767-2.75l106.142-93.001c11.615-10.168 29.282-8.989 39.45 2.626 10.167 11.616 8.988 29.283-2.628 39.45l-82.27 72.086 82.27 72.086zm243.524 42.077c-11.615 10.167-29.282 8.988-39.45-2.627-10.167-11.616-8.988-29.283 2.628-39.45l82.27-72.086-82.27-72.086c-11.616-10.167-12.795-27.834-2.628-39.45 10.168-11.615 27.835-12.794 39.45-2.626l106.142 93.001a28.366 28.366 0 012.767 2.75c10.168 11.615 8.989 29.282-2.626 39.449l-106.283 93.125z"/>
                        </svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-fuchsia-500">
                            API</h4>
                        <p>Develop your own script with our public APIs. Be simple and creative.</p>
                    </div>
                </div>

            </div>
            <div class="w-full bg-[#ecfdff] bg-cover bg-center bg-no-repeat rounded-3xl text-[#005f6a] px-8 pb-20 mt-32"
                 style="background-image: url({{asset('assets/img/background-homepage.svg')}})">
                <div class="grid grid-cols-2 gap-10 mt-6 items-center">
                    <div class="col-span-full lg:col-span-1">
                        <img src="{{ asset('image/landing-page/statistics.svg') }}" loading="lazy" alt="">
                    </div>
                    <div class="col-span-full lg:col-span-1 text-[#005f6a]">
                        <h4 class="mt-4 h-14 text-4xl font-semibold">Extensive statistics</h4>
                        <p class="text-lg pt-6">We got you covered! See where your viewers are coming from. See if they
                            use adblock. Improve your metrics based on that!</p>
                        <p class="text-lg mt-6">Not interested in statistics and numbers? In case you want to do a
                            product placement in one of your videos, your potential advertisers need to know all your
                            statistics. VideoVard got you covered!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

