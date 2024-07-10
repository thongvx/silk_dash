@extends('landing-page.layouts.app')

@section('content')
    <section class="bg-[#142132] text-white xl:px-20 px-4 sm:px-8">
        <div class="grid grid-cols-4 text-white">
            <div class="col-span-1 hidden lg:block">
                <div class="fixed">
                    <h4 class="text-[#05ffff] text-xl font-medium">Account Info</h4>
                    <ul class="list-disc pl-4">
                        <li><a href="#account_info">Account Information</a></li>
                    </ul>
                    <h4 class="text-[#05ffff] text-xl font-medium mt-4">Upload</h4>
                    <ul class="list-disc pl-4">
                        <li><a href="#add_link">Remote Upload</a></li>
                        <li><a href="#webupload">Web Upload</a></li>
                    </ul>
                    <h4 class="text-[#05ffff] text-xl font-medium mt-4">File Management</h4>
                    <ul class="list-disc pl-4">
                        <li><a href="#list_file">List Files</a></li>
                        <li><a href="#info_video">Info File</a></li>
                        <li><a href="#file-rename">Rename File</a></li>
                        <li><a href="#copy">Clone File</a></li>
                        <li><a href="#move">Move File</a></li>
                        <li><a href="#delete">Delete File</a></li>
                    </ul>
                    <h4 class="text-[#05ffff] text-xl font-medium mt-4">Folder</h4>
                    <ul class="list-disc pl-4">
                        <li><a href="#list-folder">List Folder</a></li>
                        <li><a href="#create-folder">Create Folder</a></li>
                        <li><a href="#rename-folder">Rename Folder</a></li>
                        <li><a href="#delete-folder">Delete Folder</a></li>
                    </ul>
                </div>
            </div>
            <script>hljs.highlightAll();</script>
            <div class="col-start-5 col-span-4 lg:col-span-3 pb-10 overflow-auto">
                <div class="sticky top-0 z-10 pb-3 bg-[#121520] px-4 py-2 rounded-xl">
                    <h1 class="text-3xl">API Documentation</h1>
                    <span id="token" class=" flex items-center">
                        @if(Auth::user())
                            API Token: {{ Auth::user()->key_api}}
                            @if(Auth::user()->key_api)
                                <button class="rounded-lg hover:text-[#009fb2] cursor-pointer ml-3" btn-get-token>
                                <i class="material-symbols-outlined opacity-1 text-2xl">autorenew</i>
                            </button>
                            @else
                                <button class="ml-3 rounded-lg px-3 py-1 bg-[#009fb2]/50 hover:bg-[#009fb2]" btn-get-token>Get token</button>
                            @endif
                        @else
                            API Token: Please login to get token API <a href="{{ route('login') }}" class="ml-4 text-[#009fb2]">Login</a>
                        @endif
                    </span>
                </div>
                <div class="mt-4">
                    <div id="account_info" class="mb-10 scroll-mt-20">
                        <h3 class="pb-3 text-[#05ffff] text-3xl font-bold">Account Info</h3>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/info
                            </h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Response</h4>
                        <div class="relative">
<pre class="bg-[#121520] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "ok",
        "status": 200,
        "sever_time": "2024-06-22 07:32:54",
        "result": {
            "name": "user1",
            "email": "user1181@gmail.com",
            "files_total": 20,
            "storage": "20",
            "premium": 0
        }
    }
    </code>
</pre>
                        </div>
                    </div>
                    <h3 class="mt-10 text-[#05ffff] text-3xl font-bold">UPLOAD</h3>
                    <div id="add_link" class="mt-2 scroll-mt-20">
                        <h4 class="text-2xl font-medium text-white mb-2">Remote Upload</h4>
                        <h4 class="text-primary">Add link: Upload file using direct links</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/upload/uploadUrl?url={upload_url}&amp;nameFolder={name_folder}
                            </h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">
                                <thead>
                                <tr class="text-md">
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">url</td>
                                    <td class="pl-3 py-1 border border-slate-600">URL to upload</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">nameFolder</td>
                                    <td class="pl-3 py-1 border border-slate-600">To upload inside a folder (Defaul: root)</td>
                                    <td class="pl-3 py-1 border border-slate-600">No</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
<pre class="bg-[#121520] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "ok",
        "status": 200,
        "sever_time": "2024-06-22 07:32:54",
        "total_upload": 1,
        "result": {
            "Name Folder": "Name Folder",
            "videoID": [
                "66767e26439e1",
            ]
        }
    }
    </code>
</pre>
                        </div>
                    </div>
                    <!-- /.end-add-link -->
                    <div class="mt-10 hidden" id="webupload">
                        <h3 class="pb-3 text-[#009FB2] text-3xl font-bold">Web Upload</h3>
                        <h4 class="text-primary">You need to change your api key value to the following tag:</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <pre class="!bg-[#121520] rounded-xl shadow-md font-normal">
                            <code class="language-html !bg-[#121520] !py-0 break-all text-clipboard">&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;

    &lt;title&gt;Turboviplay api webupload&lt;/title&gt;

    &lt;!-- Fonts --&gt;

    &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"&gt;&lt;/script&gt;
    &lt;script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"&gt;&lt;/script&gt;
    &lt;script src="https://turboviplay.com/frontend/js/vendor/blueimp-file-upload/js/vendor/jquery.ui.widget.js"&gt;&lt;/script&gt;
    &lt;script src="https://turboviplay.com/frontend/js/vendor/blueimp-file-upload/js/jquery.iframe-transport.js"&gt;&lt;/script&gt;
    &lt;script src="https://turboviplay.com/frontend/js/vendor/blueimp-file-upload/js/jquery.fileupload.js"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="flex-center position-ref full-height"&gt;
        &lt;h2&gt;Web Upload&lt;/h2&gt;
        &lt;div class="text-center"&gt;
            &lt;input type="text" id="keyApi" name="keyApi" value="iCDR9HRrRY" style="display: none;"&gt;
            &lt;input id="fileupload" type="file" name="file" data-url="https://uploadapi.sptvp.com/api/upload" style="display: inline;" multiple&gt;
            &lt;ul id="file-upload-list" class="list-unstyled"&gt;

            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;script &gt;
        var $ = window.$; // use the global jQuery instance

        var $uploadList = $("#file-upload-list");
        var $fileUpload = $('#fileupload');
        var $filePath = $('#filepath');
        var $keyApi = $('#keyApi');
        if ($uploadList.length &gt; 0 &amp;&amp; $fileUpload.length &gt; 0) {
            var idSequence = 0;

            // A quick way setup - url is taken from the html tag
            $fileUpload.fileupload({
                maxChunkSize: 5 * 1024 * 1024,
                method: "POST",
                // Not supported
                sequentialUploads: false,
                formData: function (form) {
                    // Append token to the request - required for web routes
                    return [{name: '_token', value: $('input[name=_token]').val()}, {name: 'keyApi', value: $keyApi.val()}];
                },
                progress: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#" + data._progress.theId).text('Uploading ' + data._progress.name + ': ' + progress + '%');
                },
                add: function (e, data) {
                    data._progress.theId = 'id_' + idSequence;
                    data._progress.name = data.originalFiles[data.originalFiles.length - 1].name;
                    idSequence++;
                    $uploadList.append($('&lt;li id="' + data._progress.theId + '"&gt;&lt;/li&gt;').text('Uploading'));
                    data.submit();
                },
                done: function (e, data) {
                    console.log(data, e);
                    $uploadList.append($('&lt;li&gt;&lt;/li&gt;').text('Uploaded: ' + data.result.path + data.result.name));
                },
                crossDomain: true,
                xhrFields: { withCredentials: true }
            });
        }
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code>
                        </pre>
                        </div>
                    </div>
                    <!-- /.end-web-upload -->
                    <h3 class="mt-10 text-[#05ffff] text-3xl font-bold">FILE</h3>
                    <div class="mt-2 scroll-mt-20" id="list_file">
                        <h4 class="text-2xl font-medium text-white mb-2">List Files</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/file/listFile?page={page}&amp;limit={Max_video}&amp;nameFolder={name_folder}
                            </h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">
                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">page</td>
                                    <td class="pl-3 py-1 border border-slate-600">page number Example: 2</td>
                                    <td class="pl-3 py-1 border border-slate-600">No</td>
                                </tr>
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">limit</td>
                                    <td class="pl-3 py-1 border border-slate-600">number of results per page (Defaul: 50; Max 500)</td>
                                    <td class="pl-3 py-1 border border-slate-600">No</td>
                                </tr>
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">folder</td>
                                    <td class="pl-3 py-1 border border-slate-600">Name Folder (Defaul: root)</td>
                                    <td class="pl-3 py-1 border border-slate-600">No</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
                    <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "ok",
        "status": 200,
        "sever_time": "2024-06-28 18:50:41",
        "total_video": 42,
        "page": 3,
        "show": "40 to 42 of 42",
        "file": [
            {
                "title": "abc.mp4",
                "folder": "copy3",
                "video_id": "8fPJ48lv7ddvE7NFpPcS",
                "embedLink": "https://emturbovid.com/t/fjre48lv7ddvE7NFpPcS",
                "poster": "https://ver1.sptvp.com/poster/1/6E/fjre48lv7ddvE7NFpPcS.png",
                "view": 0,
                "size": "81.41 MB",
                "date_uploaded": 06/28/2024 01:33:11
            },
            {
                "title": "def.mp4",
                "folder": "single videos,copy3",
                "video_id": "98CpQhkDM9W3BkKmmUcj",
                "embedLink": "https://emturbovid.com/t/rtjgnkDM9W3BkKmmUcj",
                "poster": "https://ver1.sptvp.com/poster/A/FF/rtjgnkDM9W3BkKmmUcj.png",
                "view": 1,
                "size": "81.41 MB",
                "date_uploaded": 06/08/2024 10:53:04
            }
        ]
    }
    </code>
</pre>
                        </div>
                    </div>
                    <!-- /.end-list-file -->
                    <div class="mt-10 scroll-mt-20" id="info_video">
                        <h4 class="text-2xl font-medium text-white mb-2">Info File</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/file/infoFile?videoID={id_video}</h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">videoID</td>
                                    <td class="pl-3 py-1 border border-slate-600">id video</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
                <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "ok",
        "status": 200,
        "file": {
            "title": "abc.mp4",
            "poster": "https://ver1.sptvp.com/poster/iolcndjeouw.png",
            "sub": "0",
            "view": 0,
            "date_uploaded": 07/28/2024 01:33:11,
            "size": "122.13 M",
            "duration": 515,
            "quality": 1080
        }
    }
</code>
</pre>
                        </div>
                    </div>
                    <!-- /.end-info-video -->
                    <div class="mt-10 scroll-mt-20" id="file-rename">
                        <h4 class="text-2xl font-medium text-white mb-2">RENAME FILE</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/file/renameFile/{id_video}&amp;newTitle={new_title_video}</h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">videoID</td>
                                    <td class="pl-3 py-1 border border-slate-600">id video</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">newTitle</td>
                                    <td class="pl-3 py-1 border border-slate-600">new file name</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4>Header</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
            <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "Ok",
        "status": "200",
        "sever_time": "2024-06-22 08:04:08",
        "file": {
            "New title": "test5",
            "videoID": "664999e98159b",
        }
    }
</code>
</pre>
                        </div>
                    </div>
                    <!-- /.end-file-name -->
                    <div class="mt-10 scroll-mt-20" id="copy">
                        <h4 class="text-2xl font-medium text-white mb-2">Clone File</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/cloneFile?url={embed_link}&amp;folderID={folderID}</h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">url</td>
                                    <td class="pl-3 py-1 border border-slate-600">embed link</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">folderID</td>
                                    <td class="pl-3 py-1 border border-slate-600">your name folderID</td>
                                    <td class="pl-3 py-1 border border-slate-600">No (Defaul: root)</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4>Header</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
            <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "ok",
        "status": 200,
        "sever_time": "2024-06-28 08:45:57",
        "file Clone": [
            {
                "title": "title1-clone",
                "folder": "folder_name",
                "video_id": "668ba745b16a8654654",
                "embedLink": "https://streamsilk.com/t/668ba745b16a8654654"
            },
            {
                "title": "title2-clone",
                "folder": "folder_name",
                "video_id": "668ba745b4878768",
                "embedLink": "https://streamsilk.com/t/668ba745b4878768"
            }
        ]
    }
</code>
</pre>
                        </div>
                    </div>
                    <!-- /.end-copy -->
                    <!-- move file -->
                    <div class="mt-10 scroll-mt-20" id="move">
                        <h4 class="text-2xl font-medium text-white mb-2">Move File</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/moveFile?videoID={id_video}&amp;folderID={folderID}</h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">videoID</td>
                                    <td class="pl-3 py-1 border border-slate-600">videoID</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">folderID</td>
                                    <td class="pl-3 py-1 border border-slate-600">folder-ID</td>
                                    <td class="pl-3 py-1 border border-slate-600">No (Defaul: root)</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4>Header</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="relative">
            <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "Success",
        "status": "200",
        "sever_time": "2024-06-28 09:13:13",
        "result": "Videos moved successfully!"
    }
</code>
</pre>
                        </div>
                    </div>
                    <!-- /.end-move -->
                    <!-- delete file -->
                    <div class="mt-10 scroll-mt-20" id="delete">
                        <h4 class="text-2xl font-medium text-white mb-2">Delete File</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/deleteFile?videoID={videoID}</h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">videoID</td>
                                    <td class="pl-3 py-1 border border-slate-600">videoID</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4>Header</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
            <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "Ok",
        "status": "200",
        "sever_time": "2024-06-28 08:33:50",
        "result": "Videos deleted successfully"
    }
</code>
</pre>
                        </div>
                    </div>
                    <!-- /.end-delete-file -->
                    <h3 class="mt-10 text-[#05ffff] text-3xl font-bold">FOLDER</h3>
                    <!-- list folder -->
                    <div class="mt-2 scroll-mt-20" id="list-folder">
                        <h4 class="text-2xl font-medium text-white mb-2">List Folder</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/folder/listFolder</h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
        <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "oke",
        "sever_time": "2024-06-22 06:28:29",
        "status": "200",
        "total_folder": 2,
        "folders": [
            {
                "id": 1,
                "name": "folder1",
                "number_file": 41,
                "created_at": "2024-06-03 17:30:32",
                "updated_at": "2024-06-22 06:16:22"
            },
            {
                "id": 2,
                "name": "folder2",
                "number_file": 171,
                "created_at": "2024-05-19 06:19:09",
                "updated_at": "2024-06-21 03:25:43"
            },
        ]
    }
</code>
</pre>
                        </div>
                    </div>
                    <!-- /.end list folder -->
                    <!-- creat folder -->
                    <div class="mt-10 scroll-mt-20" id="create-folder">
                        <h4 class="text-2xl font-medium text-white mb-2">Create Folder</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/folder/createFolder?nameFolder={name new folder}</h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">
                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">nameFolder</td>
                                    <td class="pl-3 py-1 border border-slate-600">Your name new folder</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">
                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
    <pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "ok",
        "sever_time": "2024-06-22 06:42:27",
        "status": "200",
        "folder":
            {
                "id": 88,
                "name": "new folder"
            }
    }
</code>
</pre>
                        </div>
                    </div>
                    <!-- /.end creat folder -->
                    <!-- rename folder -->
                    <div class="mt-10 scroll-mt-20" id="rename-folder">
                        <h4 class="text-2xl font-medium text-white mb-2">Rename Folder</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/folder/renameFolder/{folderID}?newNameFolder={name new folder}
                            </h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">folderID</td>
                                    <td class="pl-3 py-1 border border-slate-600">Your folderID</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">newNameFolder</td>
                                    <td class="pl-3 py-1 border border-slate-600">Your name new folder</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
<pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "oke",
        "sever_time": "2024-06-22 06:55:08",
        "status": "200",
        "folder":
            {
                "id": 88,
                "name": "new name folder"
            }
    }
</code>
</pre>
                        </div>
                        <!-- /.end rename folder -->
                    </div>
                    <!-- /.end rename folder -->
                    <!-- delete folder -->
                    <div class="mt-10 scroll-mt-20" id="delete-folder">
                        <h4 class="text-2xl font-medium text-white mb-2">Delete Folder</h4>
                        <h4 class="text-lg font-medium text-white mb-2">Request</h4>
                        <div class="relative">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                            <h5 class="pl-3 py-3 pr-6 bg-[#121520] rounded-xl shadow-md font-normal my-3 text-clipboard">
                                https://streamsilk.com/api/folder/deleteFolder/{folderID}
                            </h5>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Parameters</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Parameter</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">folderID</td>
                                    <td class="pl-3 py-1 border border-slate-600">Your folderID</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-lg font-medium text-white mb-2">Headers</h4>
                        <div class="bg-[#121520] my-3">
                            <table data-page-size="10"
                                   class="text-sm table-auto border-collapse w-full min-w-max text-white text-left border border-slate-500">

                                <thead>
                                <tr>
                                    <th class="py-2.5 px-3 border border-slate-600">Headers</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Description</th>
                                    <th class="py-2.5 px-3 border border-slate-600">Required</th>
                                </tr>
                                </thead>
                                <tbody class="font-normal">
                                <tr>
                                    <td class="pl-3 py-1 border border-slate-600">Authorization</td>
                                    <td class="pl-3 py-1 border border-slate-600">Token</td>
                                    <td class="pl-3 py-1 border border-slate-600">Yes</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                        <div class="relative">
<pre class="bg-[#121520] rounded-xl shadow-md font-normal">
<code class="language-json !bg-[#121520] !py-0">
    {
        "msg": "oke",
        "sever_time": "2024-06-22 06:55:08",
        "status": "200",
        'result': 'Folder deleted successfully'
    }
</code>
</pre>
                        </div>
                        <!-- /.end rename folder -->
                    </div>
                    <!-- /.end rename folder -->
                </div>
            </div>
        </div>
    </section>
@endsection
