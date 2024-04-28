<div class="grid grid-cols-4 text-white">
    <div class="col-span-1 hidden lg:block">
        <h4 class="text-orange-500">Upload</h4>
        <a href="#add_link"><h5>Remote Uplaod</h5></a>
        <a href="#webupload"><h5>Web Upload</h5></a>
        <h4 class="text-orange-500 mt-4">File/Folder Management</h4>
        <a href="#list_file"><h5>List Files</h5></a>
        <a href="#info_video"><h5>Infor Video</h5></a>
        <a href="#file-rename"><h5>Rename File</h5></a>
        <a href="#copy"><h5>Copy File</h5></a>
    </div>
    <script>hljs.highlightAll();</script>
    <div class="col-span-4 lg:col-span-3 px-0 pt-0 overflow-auto max-h-[calc(100vh-14em)]">
        <div>
            <div id="add_link" class="mb-10">
                <h3 class="pb-3 text-[#009FB2] text-lg">REMOTE UPLOAD</h3>
                <h4 class="text-primary">Add link: Upload file using direct links</h4>
                <h4>Request</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                        https://api.turboviplay.com/uploadUrl?keyApi={your_key_api}&amp;url={upload_url}&amp;nameFolder={name_folder}&amp;newTitle={title_video}
                    </h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                                <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                                <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                                <td class="pl-3 py-1 border border-slate-600">Yes</td>
                            </tr>
                            <tr>
                                <td class="pl-3 py-1 border border-slate-600">url</td>
                                <td class="pl-3 py-1 border border-slate-600">URL to upload</td>
                                <td class="pl-3 py-1 border border-slate-600">Yes</td>
                            </tr>
                            <tr>
                                <td class="pl-3 py-1 border border-slate-600">nameFolder</td>
                                <td class="pl-3 py-1 border border-slate-600">To upload inside a folder</td>
                                <td class="pl-3 py-1 border border-slate-600">No</td>
                            </tr>
                            <tr>
                                <td class="pl-3 py-1 border border-slate-600">newTitle</td>
                                <td class="pl-3 py-1 border border-slate-600">To set new title</td>
                                <td class="pl-3 py-1 border border-slate-600">No</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
<pre class="bg-[#142132] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#142132] !py-0">{
  "msg": "OK",
  "server_time": 2017-08-11 04:30:07,
  "new_title": "",
  "folder": "",
  "status": 200,
  "total_slots": 10,
  "used_slots": 0
 }</code>
</pre>
                </div>
            </div>
            <!-- /.end-add-link -->
            <div class="mt-10" id="webupload">
                <h3 class="pb-3 text-[#009FB2] text-lg">Web Upload</h3>
                <h4 class="text-primary">You need to change your api key value to the following tag:</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <pre class="!bg-[#142132] rounded-xl shadow-md font-normal">
                            <code class="language-html !bg-[#142132] !py-0 break-all">&lt;html lang="en"&gt;
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
            <div class="mt-10" id="list_file">
                <h3 class="pb-3  text-[#009FB2] text-lg">LIST FILE</h3>
                <h4 class="text-primary">List All File</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                    https://api.turboviplay.com/listFile?keyApi={Your_key_api}&amp;page={page}&amp;perPage={Max_video}&amp;folder={name_folder}
                </h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                            <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                            <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">page</td>
                            <td class="pl-3 py-1 border border-slate-600">page number Example: 2</td>
                            <td class="pl-3 py-1 border border-slate-600">No</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">perPage</td>
                            <td class="pl-3 py-1 border border-slate-600">number of results per page (Defaul: 50; Max 500)</td>
                            <td class="pl-3 py-1 border border-slate-600">No</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">folder</td>
                            <td class="pl-3 py-1 border border-slate-600">Name Folder (Defaul:single videos)</td>
                            <td class="pl-3 py-1 border border-slate-600">No</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <pre class="bg-[#142132] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#142132] !py-0">{
    "msg": "ok",
    "status": 200,
    "total_video": 2,
    "file": [
        {
            "title": "abc.mp4",
            "folder": "copy3",
            "video_id": "8fPJ48lv7ddvE7NFpPcS",
            "embedLink": "https://emturbovid.com/t/fjre48lv7ddvE7NFpPcS",
            "poster": "https://ver1.sptvp.com/poster/1/6E/fjre48lv7ddvE7NFpPcS.png",
            "view": 0,
            "date_uploaded": 07/28/2021 01:33:11
        },
        {
            "title": "def.mp4",
            "folder": "single videos,copy3",
            "video_id": "98CpQhkDM9W3BkKmmUcj",
            "embedLink": "https://emturbovid.com/t/rtjgnkDM9W3BkKmmUcj",
            "poster": "https://ver1.sptvp.com/poster/A/FF/rtjgnkDM9W3BkKmmUcj.png",
            "view": 1,
            "date_uploaded": 08/08/2021 10:53:04
        }
    ]
}</code>
</pre>
            </div>
            <!-- /.end-list-file -->
            <div class="mt-10" id="info_video">
                <h3 class="pb-3  text-[#009FB2] text-lg">INFO VIDEO</h3>
                <h4 class="text-primary">Get file info</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                    https://api.turboviplay.com/infoFile?keyApi={your_key_api}&amp;videoID={id_video}</h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                            <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                            <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">videoID</td>
                            <td class="pl-3 py-1 border border-slate-600">id video</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <pre class="bg-[#142132] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#142132] !py-0">{
    "msg": "ok",
    "status": 200,
    "file": {
        "title": "abc.mp4",
        "poster": "https://ver1.sptvp.com/poster/iolcndjeouw.png",
        "sub": "0",
        "view": 0,
        "date_uploaded": 07/28/2021 01:33:11,
        "size": "122.13 M",
        "duration": 515,
        "quality": 1080
    }
}</code>
</pre>
            </div>
            <!-- /.end-info-video -->
            <div class="mt-10" id="file-rename">
                <h3 class="pb-3  text-[#009FB2] text-lg">RENAME FILE</h3>
                <h4 class="text-primary">Rename Your File</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                    https://api.turboviplay.com/renameFile?keyApi={your_key_api}&amp;videoID={id_video}&amp;newTitle={new_title_video}</h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                            <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                            <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
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
                <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <pre class="bg-[#142132] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#142132] !py-0">{
  "msg": "OK",
  "server_time": 2017-08-11 04:30:07,
  "status": 200,
  "result": true
}</code>
</pre>
            </div>
            <!-- /.end-file-name -->
            <div class="mt-10" id="copy">
                <h3 class="pb-3  text-[#009FB2] text-lg">COPY VIDEO</h3>
                <h4 class="text-primary">Copy my video</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                    https://api.turboviplay.com/copyVideo?keyApi={your_key_api}&amp;videoID={id_video}&amp;folder={folder_video}</h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                            <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                            <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">videoID</td>
                            <td class="pl-3 py-1 border border-slate-600">id video</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">folder</td>
                            <td class="pl-3 py-1 border border-slate-600">your name folder</td>
                            <td class="pl-3 py-1 border border-slate-600">No (Defaul: single videos)</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.end-copy -->
            <!-- list folder -->
            <div class="mt-10" id="copy">
                <h3 class="pb-3  text-[#009FB2] text-lg">List Folder</h3>
                <h4 class="text-primary">Get list folder</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                    https://api.turboviplay.com/listFolder?keyApi={your_key_api}</h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                            <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                            <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <pre class="bg-[#142132] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#142132] !py-0">{
    "userID": 1000,
    "nameFolder": "single videos",
    "idFolder": "kjgnfslkdfjiwe",
    "numberFile": 33,
    "updateFile": 1682337404,
    "creatAt": 1630491363
}</code>
</pre>
            </div>
            <!-- /.end list folder -->
            <!-- creat folder -->
            <div class="mt-10" id="copy">
                <h3 class="pb-3  text-[#009FB2] text-lg">Creat Folder</h3>
                <h4 class="text-primary">Creat my folder</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                    https://api.turboviplay.com/newFolder?keyApi={your_key_api}&amp;nameFolder={name new folder}</h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                            <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                            <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">nameFolder</td>
                            <td class="pl-3 py-1 border border-slate-600">Your name new folder</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <pre class="bg-[#142132] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#142132] !py-0">{
    "msg": "OK",
    "server_time": 2017-08-11 04:30:07,
    "status": 200,
    "result": true
}</code>
</pre>
            </div>
            <!-- /.end creat folder -->
            <!-- rename folder -->
            <div class="mt-10" id="copy">
                <h3 class="pb-10 text-[#009FB2]">Rename Folder</h3>
                <h4 class="text-primary">Rename my folder</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <h5 class="pl-3 py-3 pr-6 bg-[#142132] rounded-xl shadow-md font-normal my-3">
                    https://api.turboviplay.com/editNameFolder?keyApi={your_key_api}&amp;oldNameFolder={old name my folder}&amp;newNameFolder={name new folder}
                    </h5>
                </div>
                <h4>Parameters</h4>
                <div class="bg-[#142132] my-3">
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
                            <td class="pl-3 py-1 border border-slate-600">keyApi</td>
                            <td class="pl-3 py-1 border border-slate-600">Your api key</td>
                            <td class="pl-3 py-1 border border-slate-600">Yes</td>
                        </tr>
                        <tr>
                            <td class="pl-3 py-1 border border-slate-600">oldNameFolder</td>
                            <td class="pl-3 py-1 border border-slate-600">Your name old folder</td>
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
                <h4 class="text-xl font-medium text-white mb-2">Response</h4>
                <div class="relative">
                    <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-md" clipboard-copy>content_copy</i>
                    <pre class="bg-[#142132] rounded-xl shadow-md font-normal">
    <code class="language-json !bg-[#142132] !py-0">{
    "msg": "OK",
    "server_time": 2017-08-11 04:30:07,
    "status": 200,
    "result": true
}</code>
</pre>
            </div>
            <!-- /.end rename folder -->
        </div>
    </div>
</div>

