const units = ['bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
var size, size2, size3, size4
var $ = window.$; // use the global jQuery instance
var $uploadList = $("#list-upload");
var uploadlist1 = document.getElementById('list-upload')
var $fileUpload = $('#file');
function niceBytes(x){
    let l = 0, n = parseInt(x, 10) || 0;

    while(n >= 1024 && ++l){
        n = n/1024;
    }
    size = n.toFixed(n < 10 && l > 0 ? 1 : 0) + ' ' + units[l]
}
$(document).on('change', '#file', function() {
    let total_size = 0
    var form = this.closest('form');
    for(let a =0; a< this.files.length; a++){
        let file_size = this.files[a].size;
        total_size += file_size
    }
    var button = form.querySelector('input[type=submit]');
    var span = form.querySelector('span');
    var p = form.querySelector('p');
    var formData = new FormData(form);
    if(total_size < 100*1073741824){
        Upload_FILE (formData)
        form.remove()
    }else {

    }
});
function Upload_FILE (formData){
    if ($uploadList.length > 0 && $fileUpload.length > 0) {
        var idSequence = 0;
        $fileUpload.fileupload({
            maxChunkSize: 5 * 1024 * 1024,
            method: "POST",
            // Not supported
            sequentialUploads: false,
            formData: formData,
            progress: function (e, data) {
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
            add: function (e, data) {
                console.log('a')
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
                $('#box-upload').addClass('d-none');
                data.submit();
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
            },
            crossDomain: true,
            xhrFields: { withCredentials: true }
        });
    }
}
function uploadFile(e){
    e.preventDefault();
    var form = e.target.closest('form')
    var formData = new FormData(form);
    var input = form.querySelector('#file');
    var span2 = form.querySelector('span');
    var p2 = form.querySelector('p');

    input.value = ''
    span2.innerHTML = 'Select Video files to upload'
    p2.innerHTML = 'or drag and dro'
}
