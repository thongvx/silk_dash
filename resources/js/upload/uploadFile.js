var size1, size2, size3, size4;
var $ = window.$; // use the global jQuery instance
var $uploadList = $("#list-upload-file");
var $fileUpload = $('#file');
const units = ['bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
function niceBytes(x){
    let l = 0, n = parseInt(x, 10) || 0;
    while(n >= 1024 && ++l){
        n = n/1024;
    }
    return n.toFixed(n < 10 && l > 0 ? 1 : 0) + ' ' + units[l];
}
function Upload_FILE (){
    if ($uploadList.length > 0 && $fileUpload.length > 0) {
        console.log('a')
        const form = $('#form-upload-file')[0];
        var formData = new FormData(form);
        var userIDValue = formData.get('userID');
        var folderID = formData.get('folderID');
        var tokenValue = formData.get('_token');
        var idSequence = 0;
        $fileUpload.fileupload({
            maxChunkSize: 5 * 1024 * 1024,
            method: "POST",
            // Not supported
            sequentialUploads: false,
            formData: function (form) {
                        // Append token to the request - required for web routes
                        return [{name: '_token', value: tokenValue}, {name: 'userID', value: userIDValue}, {name: 'folderID', value: folderID}];
                    },
            crossDomain: true,
            xhrFields: { withCredentials: true },
            add: function (e, data) {
                data._progress.theId = 'id_' + idSequence;
                data._progress.name = data.originalFiles[idSequence].name;
                idSequence++;
                var div_progress = `<div class="mx-3 mb-3" id="${data._progress.theId}">
                                                <div class="text-white pb-2 flex justify-between">
                                                    <div class="title-file">Uploading</div>
                                                    <div class="size"></div>
                                                </div>
                                                <div class="progress bg-gray-600 h-3.5 rounded-lg hidden">
                                                    <div class="bar bg-orange-500 h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center"></div>
                                                </div>
                                            </div>`;
                document.getElementById('list-upload-file').insertAdjacentHTML('beforebegin', div_progress);
                $('#form-upload-file').addClass('hidden');
                data.submit();
            },
            progress: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $("#" + data._progress.theId + " .title-file").text(data._progress.name);
                $("#" + data._progress.theId + " .bar").text(progress + '%');
                $("#" + data._progress.theId + " .bar").css("width",progress + '%');
                $("#" + data._progress.theId + " .progress").removeClass('hidden');
                size1 = data.loaded
                size2 = data.total
                size3 = niceBytes(size1)
                size4 = niceBytes(size2)
                $("#" + data._progress.theId + " .size").text(size3 +'/'+ size4);
            },
            done: function (e, data) {
                $("#" + data._progress.theId + " .progress").addClass('d-none');
                $("#" + data._progress.theId + " .title-file").text(data.result.name);
                $("#" + data._progress.theId + " .title-file").removeClass('col-lg-8');
                if(data._response.textStatus === "success"){
                    $("#" + data._progress.theId + " .size").text("Uploaded Successfully!");
                    $("#" + data._progress.theId + " .size").addClass('text-success')
                }else{
                    $("#" + data._progress.theId + " .size").text("Upload Failed!");
                    $("#" + data._progress.theId + " .size").addClass('text-danger')
                }
                $("#file").val('')
            },

        });
    }
}
$(document).ready(function() {
     Upload_FILE()
});
$(document).on('click', '.webupload', function() {
    setTimeout(() => {
        Upload_FILE()
    }, 1000);
});
