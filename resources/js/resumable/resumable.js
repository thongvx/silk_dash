
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
                                                <div class="progress bg-gray-600 h-3.5 rounded-lg resumable-file-progress">
                                                    <div class="progress-bar w-0 bg-orange-500 h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center "></div>
                                                </div>
                                            </div>`;
            // $uploadList.append('<li class="resumable-file-' + file.uniqueIdentifier + '">Uploading' +
            //                         '<br> <span class="resumable-file-name"></span>' +
            //                         '<br> <span class="resumable-file-progress">' +'</span>' +
            //                         '<br> <span class="resumable-file-speed"></span>' +
            //                     '</li>');
            $uploadList.append(div_progress);
            // $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-name').html(file.fileName);
            resumable.upload(); // Automatically start upload when file is added
        });

        resumable.on('fileSuccess', function (file, message) {
            $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('(completed)');
        });

        resumable.on('fileError', function (file, message) {
            $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('(file could not be uploaded: ' + message + ')');
        });
        var startTime = null;
        var totalBytesTransferred = 0;
        resumable.on('fileProgress', function (file) {
            if (!startTime) {
                startTime = new Date().getTime();
            }

            var now = new Date().getTime();
            var timeElapsed = (now - startTime) / 1000; // Time elapsed in seconds
            totalBytesTransferred = file.chunks.reduce((total, chunk) => total + (chunk.startByte + chunk.loaded), 0);

            var speed = totalBytesTransferred / timeElapsed / (1024*1024); // Speed in KB/s

            var progress = Math.floor(file.progress() * 100);
            var uploadedSize = (file.size * file.progress()).toFixed(2);
            $('.resumable-file-' + file.uniqueIdentifier + ' .size').html(niceBytes(uploadedSize)+'/'+niceBytes(file.size));
            $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').text(progress + '%');
            $('.progress-bar').css({width: Math.floor(resumable.progress() * 100) + '%'});
        });
    }
}

// Simulate a click on the hidden file input when the drop zone is clicked
$fileUploadDrop.on('click', function () {
    $fileUpload.click();
});
