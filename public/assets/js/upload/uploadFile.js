var size, size2, size3, size4
var $ = window.$; // use the global jQuery instance
var $uploadList = $("#list-upload-file");
var uploadlist1 = document.getElementById('list-upload-file')
var $fileUpload = $('#file');
var $folder = $('#folder');
const units = ['bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
function niceBytes(x){
    let l = 0, n = parseInt(x, 10) || 0;
    while(n >= 1024 && ++l){
        n = n/1024;
    }
    size = n.toFixed(n < 10 && l > 0 ? 1 : 0) + ' ' + units[l]
}
Upload_FILE()
$(document).ready(function() {
    $(document).on('change', '#file', function() {
        const MAX_FILE_SIZE = 100 * 1073741824; // 100GB
        const form = this.closest('form');
        const total_size = Array.from(this.files).reduce((total, file) => total + file.size, 0);
        if(total_size < MAX_FILE_SIZE){
            Upload_FILE(formData);
            $(form).addClass('hidden');
        }

    });
});
function Upload_FILE (){
    if ($uploadList.length > 0 && $fileUpload.length > 0) {
        const form = $('#form-upload-file')[0];
        var formData = new FormData(form);
        var idSequence = 0;
        $fileUpload.fileupload({
            maxChunkSize: 5 * 1024 * 1024,
            method: "POST",
            // Not supported
            sequentialUploads: false,
            formData: formData,
            crossDomain: true,
            xhrFields: { withCredentials: true },
            add: function (e, data) {
                console.log('add')
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
                uploadlist1.insertAdjacentHTML('beforebegin', div_progress);
                $('#form-upload-file').addClass('hidden');
                data.submit();
            },
            progress: function (e, data) {
                console.log('progress')
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $("#" + data._progress.theId + " .title-file").text(data._progress.name);
                $("#" + data._progress.theId + " .bar").text(progress + '%');
                $("#" + data._progress.theId + " .bar").css("width",progress + '%');
                $("#" + data._progress.theId + " .size").text(data.loaded +'/'+ data.total);
                $("#" + data._progress.theId + " .progress").removeClass('hidden');
                size1 = data.loaded
                size2 = data.total
                niceBytes(size1)
                size4 = size3
                niceBytes(size2)
                $("#" + data._progress.theId + " .size").text(size4 +'/'+ size3);
            },
            done: function (e, data) {
                console.log('done')
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


