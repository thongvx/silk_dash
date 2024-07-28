
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
            $('#box-upload-file').addClass('hidden');
            var div_progress = `<div class="mx-3 mb-3 resumable-file-${file.uniqueIdentifier}">
                                                <div class="text-white pb-2 flex justify-between">
                                                    <div class="title-file resumable-file-name">${file.fileName}</div>
                                                    <div class="size">${niceBytes(file.size)}</div>
                                                </div>
                                                <div class="flex justify-between">
                                                      <div class="flex">
                                                          <div class="text-progress mr-3 text-lg font-bold"></div>
                                                          <div class="status text-slate-400">Pending</div>
                                                      </div>
                                                      <div class="estimated-time text-slate-400">0</div>
                                                </div>
                                                <div class="progress bg-gray-600 h-3.5 rounded-lg resumable-file-progress">
                                                    <div class="progress-bar bg-[#009FB2] h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center"
                                                    style="width: 0"></div>
                                                </div>
                                                <div class="flex justify-between mt-2">
                                                    <button class="resumable-pause-btn bg-[#142132] hover:bg-orange-500 text-white px-2 py-1 rounded-lg">Pause</button>
                                                    <button class="resumable-resume-btn hidden bg-[#142132] hover:bg-[#009FB2] text-white px-2 py-1 rounded-lg">Resume</button>
                                                    <button class="resumable-remove-btn bg-[#142132] hover:bg-rose-600 text-white px-2 py-1 rounded-lg">Remove</button>
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
            });
        });

        resumable.on('fileSuccess', function (file, message) {
            $('.resumable-file-' + file.uniqueIdentifier + ' .status').text('completed')
        });

        resumable.on('fileError', function (file, message) {
            $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('file could not be uploaded: ' + message);
        });
        const startTimes = {};
        var totalBytesTransferred = 0;
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
            $('.resumable-file-' + file.uniqueIdentifier + ' .status').text('Uploading...')
            $('.resumable-file-' + file.uniqueIdentifier + ' .text-progress').text(progress + '%')
            $('.resumable-file-' + file.uniqueIdentifier + ' .progress-bar').css({width: Math.floor(resumable.progress() * 100) + '%'});
            $('.resumable-file-' + file.uniqueIdentifier + ' .estimated-time').text('Estimated time: ' + formatTime(eta));

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
