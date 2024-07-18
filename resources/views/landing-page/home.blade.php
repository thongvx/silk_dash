@extends('landing-page.layouts.app')

@section('content')
    <section class="bg-white pb-10">
        <div class="relative grid grid-cols-2 w-full px-0 overflow-hidden bg-cover bg-right bg-no-repeat"
             style='background-image: url({{ asset('image/landing-page/wave5.svg') }})'>
            <div class="col-span-2 lg:col-span-1 px-5 lg:pl-24 lg:px-0 pt-10 xl:pt-20">
                <div class="text-white ">
                    <h5 class="text-4xl xl:text-5xl font-extrabold">Ideal Platform to make money by sharing videos!
                    </h5>
                    <h6 class="text-xl mt-12 italic font-medium">At StreamSilk, everything is "smooth" like SILK,
                        uploading, playing, downloading and Earning too…
                    </h6>
                    <a href="/dashboard">
                        <button
                            class="px-12 py-4 font-semibold rounded-full bg-[#009FB2]/80 hover:bg-[#009FB2] text-white text-2xl mt-6 italic">
                            Get Start
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1 flex justify-center relative p-8">
                <img src="{{ asset('image/landing-page/video-upload-animate.svg') }}" loading="lazy" alt=""
                     class="w-full">
            </div>
        </div>
        <div class="relative w-full lg:px-20 mt-10 lg:mt-0">
            <div class="w-full rounded-3xl text-white px-4 mb-10">
                <h4 class="text-5xl text-center font-semibold mb-24 text-[#142132]">Our Key Features</h4>
                <div class="grid grid-cols-3 gap-6 lg:gap-10 mt-6 relative">
                    <div class="col-span-2 lg:col-span-3 w-full h-full absolute p-10 lg:p-20 flex">
                        <div class="h-full w-full bg-gradient-to-r from-teal-500 to-green-500 via-cyan-500"></div>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" fill="white"
                             width="100" height="80"
                             viewBox="0 0 122.88 99.09" style="enable-background:new 0 0 122.88 99.09"
                             xml:space="preserve"><g>
                                <path
                                    d="M7.87,0h107.12c1.96,0,3.73,0.8,5.02,2.08c1.29,1.29,2.08,3.06,2.08,5.02v57.54c0,1.96-0.8,3.73-2.08,5.02 c-1.28,1.28-3.06,2.08-5.02,2.08H7.87c-1.96,0-3.73-0.8-5.02-2.08c-1.29-1.29-2.08-3.06-2.08-5.02V7.1c0-1.96,0.8-3.73,2.08-5.02 C4.14,0.8,5.92,0,7.87,0L7.87,0z M67.07,35.97L52.9,26.09v19.68L67.07,35.97L67.07,35.97z M51.52,17.33l22.86,15.95 c0.36,0.22,0.68,0.52,0.93,0.89c1,1.45,0.64,3.45-0.81,4.45L51.72,54.37c-0.55,0.45-1.26,0.72-2.03,0.72 c-1.77,0-3.21-1.44-3.21-3.21V19.95h0.01c0-0.63,0.19-1.27,0.58-1.83C48.08,16.67,50.08,16.32,51.52,17.33L51.52,17.33z M61.98,77.39c2.99,0,5.7,1.22,7.66,3.18l0.01,0.01l0.01-0.01c1.23,1.23,2.17,2.76,2.7,4.46h47.32c1.77,0,3.21,1.44,3.21,3.21 c0,1.77-1.44,3.21-3.21,3.21H72.35c-0.53,1.71-1.46,3.23-2.7,4.46c-1.96,1.96-4.68,3.18-7.67,3.18c-3,0-5.71-1.21-7.67-3.18 c-1.23-1.23-2.17-2.76-2.7-4.46H3.21C1.44,91.45,0,90.01,0,88.24c0-1.77,1.44-3.21,3.21-3.21h48.4c0.53-1.71,1.46-3.23,2.7-4.46 c0.07-0.07,0.14-0.13,0.21-0.19C56.46,78.53,59.09,77.39,61.98,77.39L61.98,77.39z M65.12,85.1c-0.8-0.8-1.91-1.29-3.14-1.29 c-1.17,0-2.23,0.44-3.02,1.17l-0.12,0.13c-0.8,0.8-1.3,1.91-1.3,3.14c0,1.22,0.5,2.33,1.3,3.14c0.8,0.8,1.91,1.3,3.14,1.3 c1.22,0,2.33-0.5,3.14-1.3c0.75-0.75,1.23-1.77,1.29-2.9c-0.01-0.08-0.01-0.15-0.01-0.23c0-0.08,0-0.16,0.01-0.23 C66.35,86.88,65.87,85.86,65.12,85.1L65.12,85.1L65.12,85.1z M114.99,6.42H7.87c-0.18,0-0.35,0.08-0.48,0.2 c-0.12,0.12-0.2,0.29-0.2,0.48v57.54c0,0.18,0.08,0.35,0.2,0.48c0.12,0.12,0.29,0.2,0.48,0.2h107.12c0.18,0,0.35-0.08,0.48-0.2 c0.12-0.12,0.2-0.29,0.2-0.48V7.1c0-0.18-0.08-0.35-0.2-0.48C115.35,6.5,115.18,6.42,114.99,6.42L114.99,6.42z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-pink-500 to-red-500">
                            Streaming</h4>
                        <p>The latest and most powerful HLS & CDN streaming technology is applied to all videos.</p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_2" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             x="0px" y="0px" viewBox="0 0 122.88 103.77"
                             style="enable-background:new 0 0 122.88 103.77" xml:space="preserve"><g>
                                <path
                                    d="M86.35,29.93c-0.76,0.37-1.51,0.77-2.26,1.21c-2.25,1.32-4.47,2.93-6.74,4.78l-4.83-5.54c1.67-1.55,3.48-2.96,5.4-4.21 c1.53-1,3.13-1.89,4.78-2.65c0.66-0.33,1.32-0.64,2-0.93c-3.19-5.65-7.78-9.7-12.98-12.2c-5.2-2.49-11.02-3.45-16.69-2.9 c-5.63,0.54-11.1,2.59-15.62,6.1c-5.22,4.05-9.2,10.11-10.73,18.14l-0.47,2.51l-2.5,0.44c-2.45,0.43-4.63,1.02-6.56,1.77 c-1.86,0.72-3.52,1.61-4.97,2.66c-1.16,0.84-2.16,1.78-3.01,2.8C8.53,45.06,7.31,49.01,7.34,53c0.03,4.06,1.35,8.16,3.79,11.54 c0.9,1.25,1.96,2.4,3.16,3.4c1.22,1.01,2.59,1.85,4.13,2.48c1.25,0.51,2.61,0.91,4.09,1.18v7.43c-2.51-0.35-4.8-0.96-6.88-1.82 c-2.27-0.94-4.28-2.15-6.05-3.63c-1.68-1.4-3.15-2.99-4.4-4.72C1.84,64.25,0.04,58.63,0,53.03c-0.04-5.66,1.72-11.29,5.52-15.85 c1.23-1.48,2.68-2.84,4.34-4.04c1.93-1.4,4.14-2.58,6.63-3.55c1.72-0.67,3.56-1.23,5.5-1.68c2.2-8.73,6.89-15.47,12.92-20.15 c5.64-4.37,12.43-6.92,19.42-7.59c6.96-0.67,14.12,0.51,20.55,3.6c7.02,3.37,13.14,8.98,17.11,16.87l0,0 c1.6-0.25,3.2-0.37,4.79-0.36c6.72,0.04,13.19,2.45,18.3,7.95c1.07,1.15,2.08,2.45,3.02,3.9c3.2,4.92,4.84,11.49,4.77,17.92 c-0.07,6.31-1.77,12.59-5.25,17.21c-2.26,3.02-5.18,5.47-8.67,7.42c-3.36,1.88-7.28,3.31-11.68,4.33l-0.82,0.1h-3.28v-7.37h2.89 c3.53-0.85,6.65-2,9.3-3.48c2.63-1.47,4.78-3.26,6.39-5.41c2.5-3.33,3.73-8.04,3.78-12.87c0.06-5.07-1.18-10.15-3.59-13.86 c-0.69-1.07-1.45-2.03-2.25-2.89c-3.61-3.89-8.19-5.59-12.95-5.62C93.3,27.61,89.73,28.43,86.35,29.93L86.35,29.93L86.35,29.93z M83.46,56.79c-0.07,0-0.13,0.01-0.2,0.01H35.96c-0.07,0-0.14,0-0.2-0.01c-0.22,0.04-0.43,0.15-0.58,0.31 c-0.2,0.2-0.33,0.48-0.33,0.78v13.21c0,0.3,0.13,0.58,0.33,0.78c0.2,0.2,0.48,0.33,0.78,0.33h47.29c0.3,0,0.58-0.13,0.78-0.33 c0.2-0.2,0.33-0.48,0.33-0.78V57.88c0-0.3-0.13-0.58-0.33-0.78C83.88,56.94,83.68,56.83,83.46,56.79L83.46,56.79L83.46,56.79z M77.6,94.5v9.27h-6.34V94.5H77.6L77.6,94.5z M47.97,94.5v9.27h-6.34V94.5H47.97L47.97,94.5z M75.19,61.5c1.82,0,3.3,1.48,3.3,3.3 c0,1.82-1.48,3.3-3.3,3.3c-1.82,0-3.3-1.48-3.3-3.3C71.89,62.98,73.36,61.5,75.19,61.5L75.19,61.5z M83.46,75.76 c-0.07,0-0.13,0.01-0.2,0.01H35.96c-0.07,0-0.14,0-0.2-0.01c-0.22,0.04-0.43,0.15-0.58,0.31c-0.2,0.2-0.33,0.48-0.33,0.78v13.21 c0,0.3,0.13,0.58,0.33,0.78c0.2,0.2,0.48,0.33,0.78,0.33h47.29c0.3,0,0.58-0.13,0.78-0.33c0.2-0.2,0.33-0.48,0.33-0.78V76.85 c0-0.3-0.13-0.58-0.33-0.78C83.88,75.91,83.68,75.8,83.46,75.76L83.46,75.76L83.46,75.76z M39.56,79.86h2.78v7.19h-2.78V79.86 L39.56,79.86L39.56,79.86z M47.24,79.86h2.78v7.19h-2.78V79.86L47.24,79.86L47.24,79.86z M54.93,79.86h2.78v7.19h-2.78V79.86 L54.93,79.86L54.93,79.86z M39.56,60.89h2.78v7.19h-2.78V60.89L39.56,60.89L39.56,60.89z M47.24,60.89h2.78v7.19h-2.78V60.89 L47.24,60.89L47.24,60.89z M54.93,60.89h2.78v7.19h-2.78V60.89L54.93,60.89L54.93,60.89z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-cyan-500 to-blue-500">
                            Unlimited Storage</h4>
                        <p>Everyone can benefit from our unlimited storage without additional costs.</p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_3" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             x="0px" y="0px" viewBox="0 0 122.88 121.08"
                             style="enable-background:new 0 0 122.88 121.08" xml:space="preserve"><g>
                                <path
                                    d="M15.36,86.24c1.14-0.89,2.79-0.68,3.68,0.46c0.89,1.14,0.68,2.79-0.46,3.68L5.35,100.66l-0.1,13.85l16.25-0.91l8.82-14.02 c0.77-1.22,2.39-1.59,3.61-0.82c1.22,0.77,1.59,2.39,0.82,3.61l-9.5,15.09c-0.43,0.73-1.21,1.24-2.12,1.29L2.76,119.9v0 c-0.05,0-0.1,0-0.15,0c-1.44-0.01-2.61-1.18-2.6-2.63l0.13-17.71c-0.06-0.85,0.29-1.71,1.01-2.27L15.36,86.24L15.36,86.24z M40.09,53.93c6.6-19.73,15.5-33.72,28.02-42.53C81.1,2.25,97.8-1.21,119.68,0.37c1.51,0.11,2.67,1.35,2.69,2.83 c2.12,23.69-2.48,40.49-12.28,53.22c-9.43,12.24-23.58,20.52-41.14,27.47v23.13c0,1.13-0.65,2.12-1.6,2.59l-17.88,11.05 c-1.36,0.84-3.14,0.42-3.98-0.94c-0.22-0.36-0.36-0.75-0.41-1.14l0,0c-3.96-30.26-8.17-31.71-32.91-40.27 c-2.96-1.02-6.15-2.13-8.31-2.89c-1.51-0.53-2.3-2.19-1.77-3.69c0.11-0.32,0.28-0.61,0.48-0.87l11.79-16.8 c0.59-0.84,1.55-1.28,2.5-1.23v0L40.09,53.93L40.09,53.93z M90.71,31.64c-1.6-1.6-3.8-2.58-6.24-2.58c-2.43,0-4.64,0.99-6.24,2.58 c-1.6,1.6-2.58,3.8-2.58,6.24c0,2.43,0.99,4.64,2.58,6.24c1.6,1.6,3.8,2.58,6.24,2.58c2.43,0,4.64-0.99,6.24-2.58 c1.6-1.6,2.58-3.8,2.58-6.24C93.29,35.44,92.3,33.24,90.71,31.64L90.71,31.64z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-teal-500 to-green-500">
                            Max Speed</h4>
                        <p>Upload/download speed is maximum and unlimited; from high performance data centers.</p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_4" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             viewBox="0 0 122.88 114.3">
                            <defs>
                                <style>.cls-1 {
                                        fill-rule: evenodd;
                                    }</style>
                            </defs>
                            <title>encrypted</title>
                            <path class="cls-1"
                                  d="M61.46,24.21c11.15,7.07,21.23,10.42,29.87,9.62C92.84,64.38,81.56,82.42,61.57,90c-19.3-7-30.72-24.31-29.87-56.58,10.15.53,20.11-1.66,29.76-9.16Zm14.14-5.3v4.38c1.16.5,2.31.95,3.45,1.37v-4h4a5.06,5.06,0,1,0,0-3.45H77.32a1.71,1.71,0,0,0-1.72,1.72ZM0,36.48a5.06,5.06,0,1,1,7.09,4.63V51.22H25.43c.2,1.17.41,2.32.64,3.45H5.37A1.71,1.71,0,0,1,3.65,53V41.34A5.05,5.05,0,0,1,0,36.48Zm13.91-3.36a5.05,5.05,0,0,1,10-.94c0,.59,0,1.18,0,1.77a5.1,5.1,0,0,1-3.31,3.94v4h3.67c.09,1.17.2,2.32.32,3.45H18.91a1.72,1.72,0,0,1-1.72-1.72V37.85a5,5,0,0,1-3.28-4.73ZM.08,64.49a5.06,5.06,0,0,1,9.81-1.73H28.16c.37,1.18.77,2.33,1.18,3.45H9.89A5.06,5.06,0,0,1,.08,64.49ZM11,85.54a5.06,5.06,0,0,1,3.26-4.73V74.16A1.72,1.72,0,0,1,16,72.44H32.05c.59,1.19,1.22,2.34,1.88,3.46H17.71v4.86A5.06,5.06,0,1,1,11,85.54ZM84.4,114.3a5.06,5.06,0,1,0-4.62-7.1H69.67V94.72q-1.68.93-3.45,1.77v12.44a1.72,1.72,0,0,0,1.72,1.72H79.55a5.05,5.05,0,0,0,4.85,3.65Zm3.37-13.91A5.06,5.06,0,1,0,83,93.66h-4V88.18q-1.67,1.45-3.45,2.76v4.45a1.71,1.71,0,0,0,1.72,1.72H83a5,5,0,0,0,4.73,3.28ZM56.4,114.21a5.05,5.05,0,0,0,1.73-9.8V97.07C57,96.56,55.8,96,54.68,95.43v9a5.05,5.05,0,0,0,1.72,9.8Zm-21-10.91A5.06,5.06,0,0,0,40.08,100h6.65a1.74,1.74,0,0,0,1.72-1.73V91.68C47.26,90.85,46.11,90,45,89v7.56H40.13a5.06,5.06,0,1,0-4.78,6.71Zm87.53-66.82a5.06,5.06,0,1,0-7.09,4.63V51.22H98c-.18,1.17-.39,2.32-.62,3.45h20.18A1.71,1.71,0,0,0,119.23,53V41.34a5.05,5.05,0,0,0,3.65-4.86ZM109,33.12a5.05,5.05,0,0,0-9.81-1.71,5.69,5.69,0,0,0,0,3.51,5.1,5.1,0,0,0,3,3v4H99c-.08,1.17-.17,2.32-.28,3.45H104a1.72,1.72,0,0,0,1.72-1.72V37.85A5,5,0,0,0,109,33.12ZM122.8,64.49A5.06,5.06,0,0,0,113,62.76H95.25c-.38,1.18-.78,2.33-1.21,3.45H113a5.06,5.06,0,0,0,9.81-1.72ZM111.88,85.54a5.06,5.06,0,0,0-3.26-4.73V74.16a1.72,1.72,0,0,0-1.73-1.72H91.28c-.61,1.19-1.26,2.34-1.93,3.46h15.82v4.86a5.06,5.06,0,1,0,6.71,4.78ZM84.4,0a5.06,5.06,0,1,1-4.62,7.09H69.67V20.48c-1.14-.6-2.29-1.22-3.45-1.88V5.37a1.71,1.71,0,0,1,1.72-1.72H79.55A5.05,5.05,0,0,1,84.4,0ZM56.4.08a5.06,5.06,0,0,1,1.73,9.81v8.22q-1.73,1.17-3.45,2.16V9.89A5.06,5.06,0,0,1,56.4.08ZM35.35,11a5.06,5.06,0,0,1,4.73,3.26h6.65A1.74,1.74,0,0,1,48.45,16v7.35c-1.15.48-2.3.91-3.46,1.29V17.71H40.13A5.06,5.06,0,1,1,35.35,11Zm15,39.13h1.11V48.08a10.61,10.61,0,0,1,2.94-7.35,9.77,9.77,0,0,1,14.28,0,10.61,10.61,0,0,1,2.94,7.35v2.05h1.11a1.66,1.66,0,0,1,1.65,1.65V69.16a1.65,1.65,0,0,1-1.65,1.64H50.37a1.65,1.65,0,0,1-1.65-1.64V51.78a1.66,1.66,0,0,1,1.65-1.65Zm9.84,11.1-1.77,4.65h6.24L63,61.17a3.24,3.24,0,1,0-2.83.06ZM54.6,50.13H68.52V48.08a7.51,7.51,0,0,0-2.06-5.2,6.7,6.7,0,0,0-9.8,0,7.51,7.51,0,0,0-2.06,5.2v2.05Z"/>
                        </svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-yellow-500 to-amber-600">
                            Security</h4>
                        <p>100% your videos are encrypted and safe!
                            Always backup data 24/7.
                        </p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             viewBox="0 0 122.88 122.88">
                            <defs>
                                <style>.cls-1 {
                                        fill: white;
                                    }

                                    .cls-2 {
                                        fill: #ff1200;
                                    }</style>
                            </defs>
                            <title>high-risk</title>
                            <path class="cls-1"
                                  d="M42.89,114.9c1.43,2.23,2.87,4.3,4.3,6.22l-.09.65a25.88,25.88,0,0,1-6,1.11l-.56-.48-.36-.75q-.24-.48-1-2c-.48-1-.9-2-1.25-2.89H36l.21,5.77h-6l.3-5.68-.3-13.66,9.18,0a7.37,7.37,0,0,1,5,1.54,5.58,5.58,0,0,1,1.77,4.44,6.37,6.37,0,0,1-.86,3.2,8,8,0,0,1-2.37,2.57Zm-3.08-5.17A2.38,2.38,0,0,0,39.2,108a3,3,0,0,0-2-.64l-1.08.08-.12,5,2.18.12a2.68,2.68,0,0,0,1.23-1.05,3.38,3.38,0,0,0,.39-1.73ZM55,116.24l.24,6.28h-6l.3-5.68-.3-13.66h6.1L55,116.24Zm11.53-13.42a15.84,15.84,0,0,1,5.62,1.05l-1,4.87-.84.36a13.28,13.28,0,0,0-2.48-1.23,6,6,0,0,0-2-.45,1.93,1.93,0,0,0-1.09.27.82.82,0,0,0-.4.72,1.15,1.15,0,0,0,.61,1,15.55,15.55,0,0,0,2,1.06,30,30,0,0,1,2.75,1.39,6.42,6.42,0,0,1,1.88,1.77,4.58,4.58,0,0,1,.81,2.76,5.77,5.77,0,0,1-1,3.31A6.81,6.81,0,0,1,68.64,122a10,10,0,0,1-4.3.87,19.81,19.81,0,0,1-6.4-1.14l.87-5.2.59-.36a12.13,12.13,0,0,0,3,1.66,7.49,7.49,0,0,0,2.61.62,2,2,0,0,0,1.21-.29.85.85,0,0,0,.38-.7,1.26,1.26,0,0,0-.65-1.06,13,13,0,0,0-2.07-1.06A25.07,25.07,0,0,1,61.12,114a6.06,6.06,0,0,1-1.84-1.77,4.8,4.8,0,0,1-.77-2.76,6,6,0,0,1,1-3.4,7,7,0,0,1,2.84-2.37,9.55,9.55,0,0,1,4.16-.87Zm19.93,9.51q2.74,4.31,6.28,8.94l-.09.65a50.28,50.28,0,0,1-6,1l-.66-.36q-3-5.23-5-8.88l-.06,2.6.24,6.28h-6l.3-5.68-.3-13.66h6.1l-.21,8.07,3.7-6,1-2.09h6.34l-5.68,9.15Z"/>
                            <path class="cls-2"
                                  d="M69.35,55.26,93.09,83.93a.54.54,0,0,1,0,.72L90.26,88.1a.55.55,0,0,1-.72.11L59.1,68.13c-4.07-2.93-5.24-6.46-4.66-9.5a8.24,8.24,0,0,1,2-4,8.54,8.54,0,0,1,3.73-2.42c2.87-.91,6.29-.24,9.15,3l0,0Z"/>
                            <path class="cls-1"
                                  d="M19.33,106.17A61.43,61.43,0,0,1,61.44,0,60.91,60.91,0,0,1,84.87,4.66,62,62,0,0,1,118.2,38a60.85,60.85,0,0,1-5.58,57.24,62.84,62.84,0,0,1-7.6,9.3.5.5,0,0,1-.7,0l-3.07-3.06a.45.45,0,0,1-.17-.11l-8.56-8.56a.5.5,0,0,1,0-.7L97,87.62a.5.5,0,0,1,.7,0l6.61,6.61a54.73,54.73,0,0,0,3.85-5.7,53.34,53.34,0,0,0,7.34-26H106.4a.5.5,0,0,1-.5-.5V55.7a.5.5,0,0,1,.5-.5h8.76a53.73,53.73,0,0,0-4.72-16.58,54.59,54.59,0,0,0-9.82-14.37l-5.86,5.86a.5.5,0,0,1-.7,0l-4.49-4.49a.5.5,0,0,1,0-.7l5.65-5.65a54.23,54.23,0,0,0-14.87-8.5c-5.25-2-8.73-3.15-14.6-3.38v8a.5.5,0,0,1-.5.5H58.89a.5.5,0,0,1-.5-.5V7.59c-5.83.55-13.55,2-18.69,4.29a54.32,54.32,0,0,0-14.42,9.3l5.87,5.87a.5.5,0,0,1,0,.7l-4.49,4.49a.5.5,0,0,1-.7,0l-5.8-5.8a54,54,0,0,0-9,14.86A54.62,54.62,0,0,0,7.44,58.23h9a.5.5,0,0,1,.5.5v6.36a.5.5,0,0,1-.5.5h-9a53.66,53.66,0,0,0,1.35,8.58,53.12,53.12,0,0,0,2.91,8.72,54.31,54.31,0,0,0,3.64,7,52.69,52.69,0,0,0,4.28,6l7.24-7.24a.5.5,0,0,1,.7,0l4.49,4.49a.5.5,0,0,1,0,.7C28,97.93,24,101.9,20,106.15a.48.48,0,0,1-.69,0Z"/>
                        </svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-violet-500 to-fuchsia-500">
                            Fast Encoding</h4>
                        <p>High-performance GPU server helps encode your videos at the highest speed!</p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             viewBox="0 0 122.88 106.5">
                            <defs>
                                <style>.cls-1 {
                                        fill-rule: evenodd;
                                    }</style>
                            </defs>
                            <title>chart</title>
                            <path class="cls-1"
                                  d="M19.39,64.84v39.84a1.84,1.84,0,0,1-1.83,1.82H1.83A1.83,1.83,0,0,1,0,104.68V64.84ZM0,51.83,41.59,15.44c9.21,9,18.14,19.93,27.25,28.93L102.07,11,91.37.28,122.88,0V31.78L112.61,21.51c-7.37,7.47-24.8,23.92-32.17,31.3-9.33,9.32-13.78,9.49-23.1.17L41.59,35.46,23.13,51.83ZM114.37,38.69v66a1.84,1.84,0,0,1-1.82,1.82H96.81A1.84,1.84,0,0,1,95,104.68V57.29c3-2.91,6.5-6.29,10.07-9.73l7.45-7.17a24.16,24.16,0,0,1,1.87-1.7ZM82.71,68.34v36.34a1.84,1.84,0,0,1-1.83,1.82H65.15a1.84,1.84,0,0,1-1.83-1.82V72.22a22.48,22.48,0,0,0,5.73.63,24,24,0,0,0,13.66-4.51Zm-31.66-3v39.29a1.84,1.84,0,0,1-1.83,1.82H33.48a1.83,1.83,0,0,1-1.82-1.82V62q.48-.36.93-.75l7.86-7,6.34,7,.49.51q1.92,1.93,3.77,3.52Z"/>
                        </svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-violet-500 to-fuchsia-500">
                            Extensive Statistics</h4>
                        <p>Track your number of views per country, see if they are Adblock/VPN.</p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" fill="white"
                             width="100" height="80"
                             text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                             clip-rule="evenodd" viewBox="0 0 512 331.617">
                            <path fill-rule="nonzero"
                                  d="M271.099 21.308C274.787 6.304 289.956-2.873 304.96.815c15.005 3.688 24.181 18.857 20.493 33.862l-68.491 275.632c-3.689 15.005-18.857 24.181-33.862 20.493-15.005-3.688-24.181-18.857-20.493-33.862l68.492-275.632zm-118.45 224.344c11.616 10.167 12.795 27.834 2.628 39.45-10.168 11.615-27.835 12.794-39.45 2.627L9.544 194.604C-2.071 184.437-3.25 166.77 6.918 155.155c.873-.997 1.8-1.912 2.767-2.75l106.142-93.001c11.615-10.168 29.282-8.989 39.45 2.626 10.167 11.616 8.988 29.283-2.628 39.45l-82.27 72.086 82.27 72.086zm243.524 42.077c-11.615 10.167-29.282 8.988-39.45-2.627-10.167-11.616-8.988-29.283 2.628-39.45l82.27-72.086-82.27-72.086c-11.616-10.167-12.795-27.834-2.628-39.45 10.168-11.615 27.835-12.794 39.45-2.626l106.142 93.001a28.366 28.366 0 012.767 2.75c10.168 11.615 8.989 29.282-2.626 39.449l-106.283 93.125z"/>
                        </svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-violet-500 to-fuchsia-500">
                            API</h4>
                        <p>Develop your own script with our public APIs. Be simple and creative.</p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             x="0px" y="0px" viewBox="0 0 122.88 126.05"
                             style="enable-background:new 0 0 122.88 126.05" xml:space="preserve"><g>
                                <path
                                    d="M30.58,60.98c3.73,6.73,8.03,13.19,13.63,19.09C49.81,86,56.77,91.4,65.8,96c0.67,0.33,1.3,0.33,1.87,0.1 c0.87-0.33,1.73-1.03,2.6-1.9c0.67-0.67,1.5-1.73,2.37-2.9c3.47-4.56,7.76-10.23,13.83-7.4c0.13,0.07,0.23,0.13,0.37,0.2 l20.22,11.63c0.07,0.03,0.13,0.1,0.2,0.13c2.67,1.83,3.77,4.66,3.8,7.86c0,3.27-1.2,6.93-2.97,10.03c-2.33,4.1-5.76,6.8-9.73,8.6 c-3.77,1.73-7.96,2.67-12,3.27c-6.33,0.93-12.26,0.33-18.33-1.53c-5.93-1.83-11.9-4.86-18.43-8.9l-0.47-0.3 c-3-1.87-6.23-3.87-9.4-6.23C28.12,99.9,16.29,87.24,8.59,73.31c-6.46-11.7-10-24.32-8.06-36.35c1.07-6.6,3.9-12.59,8.83-16.56 c4.3-3.47,10.1-5.36,17.59-4.7c0.87,0.07,1.63,0.57,2.03,1.3l12.96,21.92c1.9,2.47,2.13,4.9,1.1,7.33c-0.87,2-2.6,3.83-4.96,5.56 c-0.7,0.6-1.53,1.2-2.4,1.83c-2.9,2.1-6.2,4.53-5.06,7.4L30.58,60.98L30.58,60.98z M74.96,0c-3.61,0-6.7,1.27-9.27,3.81 c-2.57,2.54-3.81,5.63-3.81,9.27v22.96c0,3.64,1.27,6.73,3.81,9.27c2.54,2.54,5.63,3.81,9.27,3.81h10.75 c-0.75,2.89-1.68,5.63-2.83,8.2c-1.13,2.6-3.06,5.08-5.72,7.45c5.11-1.33,9.65-3.32,13.66-5.95c3.99-2.6,7.45-5.86,10.31-9.71h8.67 c3.61,0,6.7-1.3,9.27-3.81c2.57-2.54,3.81-5.63,3.81-9.27V13.08c0-3.61-1.27-6.7-3.81-9.27C116.53,1.24,113.43,0,109.8,0 C98.18,0,86.57,0,74.96,0L74.96,0z M91.15,34.65H73.87c0.2-1.84,0.8-3.57,1.8-5.19c1-1.62,2.88-3.54,5.64-5.75 c1.69-1.35,2.77-2.38,3.25-3.08c0.47-0.7,0.71-1.37,0.71-2c0-0.68-0.23-1.27-0.7-1.75c-0.47-0.48-1.06-0.72-1.77-0.72 c-0.73,0-1.34,0.25-1.8,0.75c-0.47,0.51-0.78,1.39-0.94,2.66l-5.76-0.51c0.23-1.75,0.64-3.12,1.24-4.1 c0.6-0.98,1.45-1.73,2.55-2.26c1.1-0.53,2.62-0.79,4.56-0.79c2.03,0,3.6,0.25,4.73,0.75c1.12,0.49,2.01,1.26,2.65,2.29 c0.65,1.04,0.97,2.19,0.97,3.47c0,1.36-0.37,2.66-1.11,3.91c-0.74,1.24-2.08,2.6-4.04,4.09c-1.16,0.86-1.93,1.47-2.32,1.82 c-0.39,0.35-0.85,0.8-1.38,1.36h8.99V34.65L91.15,34.65z M103.5,30.46H93.03v-5.11L103.5,11.9h5.01v13.75h2.6v4.81h-2.6v4.19h-5.01 V30.46L103.5,30.46z M103.5,25.65v-7.06l-5.53,7.06H103.5L103.5,25.65z"/>
                            </g></svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-violet-500 to-fuchsia-500">
                            Support 24/7</h4>
                        <p>Ready to support you whenever you need via Support Ticket, Email, Telegram and Skype.</p>
                    </div>
                    <div
                        class="col-span-full sm:col-span-1 flex items-center flex-col bg-[#142132] py-8 px-4 rounded-3xl z-index-20 relative">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="white"
                             width="100" height="80"
                             viewBox="0 0 122.88 107.06">
                            <defs>
                                <style>.cls-1 {
                                        fill-rule: evenodd;
                                    }</style>
                            </defs>
                            <title>video-production</title>
                            <path class="cls-1"
                                  d="M113.21,57.27a4.25,4.25,0,0,1,1.31,1l3.56,4.09h0a4.53,4.53,0,0,1,.83,1.42,4,4,0,0,1,.21,1.65,4.48,4.48,0,0,1-.45,1.61,3.85,3.85,0,0,1-1,1.26l-2.43,2.12c0,.07.07.15.09.23.17.44.31.91.45,1.35,0,0,0,0,0,.07.15.44.26.93.38,1.44l0,.18,2.76.2a4.12,4.12,0,0,1,2.89,1.48l0,0a3.94,3.94,0,0,1,.8,1.42,4.49,4.49,0,0,1,.21,1.63l-.4,5.47A4.12,4.12,0,0,1,121,86.88a4.09,4.09,0,0,1-3.1,1l-3.21-.23c0,.07-.09.17-.12.24-.21.44-.44.88-.67,1.32s-.5.89-.76,1.28l-.08.14,1.81,2.08.07.08a4.05,4.05,0,0,1,.78,1.44,4.46,4.46,0,0,1-.23,3.19,4.28,4.28,0,0,1-1,1.32l-.05,0-4.12,3.53a4.2,4.2,0,0,1-1.42.86,3.9,3.9,0,0,1-1.68.2,4.66,4.66,0,0,1-1.64-.45,4,4,0,0,1-1.28-1l-2.06-2.42a1,1,0,0,1-.26.08c-.45.15-.91.31-1.4.45s-.95.26-1.44.38a.49.49,0,0,1-.2,0l-.21,2.74a3.93,3.93,0,0,1-.44,1.6,4.11,4.11,0,0,1-1,1.29l0,0a4.12,4.12,0,0,1-1.42.81,4.46,4.46,0,0,1-1.63.2l-5.47-.4a4.18,4.18,0,0,1-3.92-4.55L85,98.88l-.24-.12c-.44-.21-.88-.44-1.31-.68s-.9-.49-1.29-.75l-.14-.08L80,99.06l-.08.07a4.22,4.22,0,0,1-1.44.78,4.4,4.4,0,0,1-1.63.18,4.21,4.21,0,0,1-1.56-.42,4.09,4.09,0,0,1-1.31-1l0,0-3.55-4.17A4.57,4.57,0,0,1,69.53,93a4,4,0,0,1-.21-1.65,4,4,0,0,1,1.5-2.89l2.43-2.07a.67.67,0,0,1-.09-.26c-.14-.44-.31-.9-.45-1.39s-.28-1-.37-1.44l0-.21-2.73-.2A4,4,0,0,1,68,82.49a4.22,4.22,0,0,1-1.29-1l0,0a3.94,3.94,0,0,1-.8-1.42,4.28,4.28,0,0,1-.21-1.63l.4-5.47a4.41,4.41,0,0,1,.42-1.61,4.69,4.69,0,0,1,1-1.31,4.2,4.2,0,0,1,1.45-.82A4.36,4.36,0,0,1,70.6,69l3.21.24c0-.07.08-.17.12-.24.21-.44.44-.88.67-1.32s.5-.89.75-1.28l.09-.14-1.79-2.1a4,4,0,0,1-.82-1.45A4.09,4.09,0,0,1,72.62,61a3.92,3.92,0,0,1,.45-1.6,4.25,4.25,0,0,1,1-1.31l4.09-3.56v0a4.69,4.69,0,0,1,1.43-.83,4,4,0,0,1,1.65-.21,4.34,4.34,0,0,1,1.61.45,4,4,0,0,1,1.26,1l2.12,2.43.2-.09c.45-.17.91-.31,1.4-.48s1-.26,1.44-.37a.78.78,0,0,1,.21,0l.2-2.73a4,4,0,0,1,.44-1.61,4.19,4.19,0,0,1,1-1.28l0,0a3.94,3.94,0,0,1,1.42-.8,4.49,4.49,0,0,1,1.63-.21l5.47.4a4.63,4.63,0,0,1,1.6.43,3.67,3.67,0,0,1,1.32,1,4.16,4.16,0,0,1,.82,1.44,4.36,4.36,0,0,1,.19,1.66L103.42,58l.24.12c.44.21.88.44,1.31.68s.9.49,1.28.75l.15.08,2.1-1.79A3.87,3.87,0,0,1,110,57a4.06,4.06,0,0,1,1.65-.21,3.92,3.92,0,0,1,1.61.45v.05ZM10.78,0H93.24A10.81,10.81,0,0,1,104,10.78V41.1l-.4-.14-.61-.18a11.37,11.37,0,0,0-2.32-.39l-1.87-.14V21.13H5.2V70.38H56.45a11.92,11.92,0,0,0-.21,1.56L56,75.58h-.65V86.91h3.6c.32.35.67.7,1.06,1l.51.45c-.12.32-.22.64-.31,1a12.25,12.25,0,0,0-.4,2l0,.33,0,.37H10.78A10.81,10.81,0,0,1,0,81.32V10.78A10.79,10.79,0,0,1,10.78,0ZM46.46,31,64.7,43.68a2.41,2.41,0,0,1,.74.72,2.58,2.58,0,0,1-.65,3.6L46.62,60.56a2.55,2.55,0,0,1-1.64.59,2.6,2.6,0,0,1-2.6-2.6V33.08s.39-1.37.47-1.49A2.6,2.6,0,0,1,46.46,31Zm3.66,56V75.58H29.18V86.91ZM24,75.58H5.2v5.74a5.6,5.6,0,0,0,5.58,5.59H24V75.58ZM75.69,15.93V5.2H55.32V15.92ZM80.89,5.2V15.92H98.82V10.78A5.6,5.6,0,0,0,93.23,5.2ZM50.12,15.93V5.2H29.18V15.92ZM24,15.93V5.2H10.78A5.6,5.6,0,0,0,5.2,10.78v5.14ZM93.69,72.07A6.38,6.38,0,1,1,87.9,79a6.38,6.38,0,0,1,5.79-6.92ZM93,64.18a14.3,14.3,0,1,1-13,15.5,14.29,14.29,0,0,1,13-15.5Z"/>
                        </svg>
                        <h4 class="mt-4 h-14 text-xl font-semibold text-[#05ffff] from-violet-500 to-fuchsia-500">
                            Custom Player</h4>
                        <p>You can freely customize Color, Logo, Poster, Preview of player and more to match your
                            website.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

