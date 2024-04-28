function transferLink(e){
    e.preventDefault();
    var form = e.target.closest('form')
    var formData = new FormData(form);
    $.ajax({
        url: '/transfer',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (e) {
                if (e.lengthComputable) {
                    var progress = (e.loaded / e.total) * 100;
                    document.getElementById('progressBar').value = progress;
                }
            }, false);
            return xhr;
        },
        success: function (response) {
            form.querySelector('input[type="file"]').value = ''
            form.querySelector('span').innerHTML = 'Select Video files to upload'
            console.log(form.querySelector('input[type="file"]').value)
            $('.loading').remove()
            var div_success = `<div class="text-success">File updated successfully</div>`
            form.insertAdjacentHTML("beforeend", div_success);
        },
        error: function (xhr, status, error) {
            console.error('Error uploading file:', error);
            alert('Failed to upload file');
        }
    });
}
