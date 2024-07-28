
var $ = window.$; // use the global jQuery instance
var size1, size2, size3, size4;
const units = ['bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

function niceBytes(x){
    let l = 0, n = parseInt(x, 10) || 0;
    while(n >= 1024 && ++l){
        n = n/1024;
    }
    return n.toFixed(n < 10 && l > 0 ? 1 : 0) + ' ' + units[l];
}
function formatTime(seconds) {
    if (seconds < 60) return `${Math.floor(seconds)}s`;
    if (seconds < 3600) return `${Math.floor(seconds / 60)}m ${Math.floor(seconds % 60)}s`;
    if (seconds < 86400) return `${Math.floor(seconds / 3600)}h ${Math.floor((seconds % 3600) / 60)}m`;
}
var $fileUpload = $('#resumable-browse');
var $fileUploadDrop = $('#resumable-drop');
var $uploadList = $("#file-upload-list");

if ($fileUpload.length > 0) {
    var resumable = new Resumable({
        chunkSize: 5 * 1024 * 1024, // 10MB
        simultaneousUploads: 15,
        testChunks: false, // Disable the GET requests for testing chunks
        throttleProgressCallbacks: 1,
        target: $fileUpload.data('url'),
        method: 'POST', // Ensure the method is POST
        query: function (file, chunk) {
            return {
                resumableIdentifier: file.uniqueIdentifier,
                resumableFilename: file.fileName,
                resumableChunkNumber: chunk.offset,
                resumableChunkSize: chunk.size,
                resumableTotalSize: file.size,
                resumableType: file.file.type,
                resumableRelativePath: file.relativePath,
                resumableTotalChunks: file.chunks.length,
                userID: $('#userID').val(),
                folderID: $('#folderPost').val(),
            };
        }
    });

    if (!resumable.support) {
        $('#resumable-error').show();
    } else {
        $fileUploadDrop.show();
        resumable.assignDrop($fileUploadDrop[0]);
        resumable.assignBrowse($fileUpload[0]);

        resumable.on('fileAdded', function (file) {
            $uploadList.show();
            $('.resumable-progress .progress-resume-link').hide();
            $('.resumable-progress .progress-pause-link').show();
            $('#box-upload-file').hide()
            var div_progress = `<div class="mx-3 mb-3 info-file resumable-file-${file.uniqueIdentifier} flex justify-between items-center">
                                                <div>
                                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 111.87 122.88"
                                                    fill="white" width="60" height="50">
                                                    <defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>video-file</title>
                                                    <path class="cls-1" d="M56.75,113.57V75.07a9.34,9.34,0,0,1,9.31-9.31h36.5a9.34,9.34,0,0,1,9.31,9.31v38.5a9.34,9.34,0,0,1-9.31,9.31H66.06a9.34,9.34,0,0,1-9.31-9.31Zm2.74-102.1L79.08,29.82H59.49V11.47ZM20.72,69.38a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21H45.3V69.38Zm.68,15.83a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H46V85.21Zm-.7-47.5a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H43.45a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0-15.83a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21h12.5a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0,31.67a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H59.16a2.12,2.12,0,0,0,2-2.21,2.09,2.09,0,0,0-2-2.21ZM90,32.45a3.26,3.26,0,0,0-2.37-3.14L58.74,1.2A3.21,3.21,0,0,0,56.23,0H5.87A5.86,5.86,0,0,0,0,5.86V106.25a5.84,5.84,0,0,0,1.72,4.15,5.91,5.91,0,0,0,4.15,1.71H45.39v-6.55H6.55v-99H52.94V33.08a3.29,3.29,0,0,0,3.29,3.29h27.2V57.82H90V32.45Zm4.3,63.73c1.9-1.23,1.89-2.59,0-3.68L77.39,81.23c-1.55-1-3.16-.4-3.12,1.62l.06,22.78c.13,2.19,1.38,2.79,3.23,1.77L94.28,96.18Z"/></svg>
                                                </div>
                                                <div class="px-5 w-full">
                                                    <div class="text-white pb-2 flex justify-between items-center">
                                                        <div class="title-file resumable-file-name">${file.fileName}</div>
                                                        <div class="flex ml-5 items-end">
                                                              <div class="status text-slate-400">Pending</div>
                                                              <div class="text-progress ml-3 text-md font-bold">0%</div>
                                                          </div>
                                                    </div>
                                                    <div class="progress bg-gray-600 h-3.5 rounded-lg resumable-file-progress">
                                                        <div class="progress-bar bg-[#009FB2] h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center"
                                                        style="width: 0"></div>
                                                    </div>
                                                    <div class="flex justify-between mt-2">
                                                            <div class="size">${niceBytes(file.size)}</div>

                                                          <div class="estimated-time text-slate-400">Estimated time: 0</div>
                                                    </div>

                                                </div>
                                                <div class="flex justify-between mt-2 button-file">
                                                    <button class="resumable-pause-btn hover:text-orange-500 text-white rounded-lg">
                                                        <i class="material-symbols-outlined opacity-1 text-3xl">pause_circle</i>
                                                    </button>
                                                    <button class="resumable-resume-btn hidden hover:text-[#009FB2] text-white rounded-lg">
                                                        <i class="material-symbols-outlined opacity-1 text-3xl">resume</i>
                                                    </button>
                                                    <button class="resumable-remove-btn hover:text-rose-600 text-white ml-2 rounded-lg">
                                                        <i class="material-symbols-outlined opacity-1 text-3xl">close</i>
                                                    </button>
                                                </div>
                                            </div>`;
            $uploadList.append(div_progress);
            resumable.upload(); // Automatically start upload when file is added
            document.querySelector(`.resumable-file-${file.uniqueIdentifier} .resumable-pause-btn`).addEventListener('click', () => {
                resumable.pause();
                document.querySelector(`.resumable-file-${file.uniqueIdentifier} .resumable-pause-btn`).style.display = 'none';
                document.querySelector(`.resumable-file-${file.uniqueIdentifier} .resumable-resume-btn`).style.display = 'inline';
            });

            document.querySelector(`.resumable-file-${file.uniqueIdentifier} .resumable-resume-btn`).addEventListener('click', () => {
                resumable.upload();
                document.querySelector(`.resumable-file-${file.uniqueIdentifier} .resumable-pause-btn`).style.display = 'inline';
                document.querySelector(`.resumable-file-${file.uniqueIdentifier} .resumable-resume-btn`).style.display = 'none';
            });

            document.querySelector(`.resumable-file-${file.uniqueIdentifier} .resumable-remove-btn`).addEventListener('click', () => {
                resumable.removeFile(file);
                document.querySelector(`.resumable-file-${file.uniqueIdentifier}`).remove();
                if (document.querySelectorAll('#file-upload-list info-file').length === 0) {
                    $('#box-upload-file').show()
                }
            });
        });

        resumable.on('fileSuccess', function (file, message) {
            $('.resumable-file-' + file.uniqueIdentifier + ' .status').text('completed')
            $('.resumable-file-' + file.uniqueIdentifier + ' .button-file').remove();
        });

        resumable.on('fileError', function (file, message) {
            $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('file could not be uploaded: ' + message);
            $('.resumable-file-' + file.uniqueIdentifier + ' .button-file').remove();
        });
        const startTimes = {};
        resumable.on('fileProgress', function (file) {
            if (!startTimes[file.uniqueIdentifier]) {
                startTimes[file.uniqueIdentifier] = Date.now();
            }

            const now = Date.now();
            const timeElapsed = (now - startTimes[file.uniqueIdentifier]) / 1000; // Time elapsed in seconds
            const bytesTransferred = file.size * file.progress();

            const speed = (bytesTransferred / timeElapsed) / (1024 * 1024);
            const remainingBytes = file.size - bytesTransferred;
            const eta = (remainingBytes / (speed * 1024 * 1024)).toFixed(2); // ETA in seconds

            var progress = Math.floor(file.progress() * 100);
            var uploadedSize = (file.size * file.progress()).toFixed(2);
            $('.resumable-file-' + file.uniqueIdentifier + ' .size').text(niceBytes(uploadedSize)+'/'+niceBytes(file.size));
            $('.resumable-file-' + file.uniqueIdentifier + ' .status').text('Uploading')
            $('.resumable-file-' + file.uniqueIdentifier + ' .text-progress').text(progress + '%')
            $('.resumable-file-' + file.uniqueIdentifier + ' .progress-bar').css({width: Math.floor(resumable.progress() * 100) + '%'});
            $('.resumable-file-' + file.uniqueIdentifier + ' .estimated-time').html(`Estimated time: <span class="text-white">${formatTime(eta)}</span>`);

        });
        $uploadList.on('click', '.pause-upload', function () {
            var $fileDiv = $(this).closest('div[class^="resumable-file-"]');
            var uniqueIdentifier = $fileDiv.attr('class').split('resumable-file-')[1];
            var file = resumable.getFromUniqueIdentifier(uniqueIdentifier);
            if (file) {
                resumable.pause();
                $fileDiv.find('.status').text('Paused');
            }
        });
        $uploadList.on('click', '.remove-upload', function () {
            var $fileDiv = $(this).closest('div[class^="resumable-file-"]');
            var uniqueIdentifier = $fileDiv.attr('class').split('resumable-file-')[1];
            var file = resumable.getFromUniqueIdentifier(uniqueIdentifier);
            if (file) {
                resumable.removeFile(file);
                $fileDiv.remove();
            }
        });
    }
}

// Simulate a click on the hidden file input when the drop zone is clicked
$fileUploadDrop.on('click', function () {
    $fileUpload.click();
});
