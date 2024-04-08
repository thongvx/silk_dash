<!DOCTYPE html>
<html>
<head>
    <title>Upload Remote</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <form id="download-form">
    <input type="text" id="url-input" placeholder="Enter URL here">
    <input type="text" id="filename-input" placeholder="Enter filename here">
    <button type="submit">Submit</button>
</form>
<progress id="download-progress" value="0" max="100"></progress>

<script>
    document.getElementById('download-form').addEventListener('submit', function (event) {
        event.preventDefault();

        var url = document.getElementById('url-input').value;
        var filename = document.getElementById('filename-input').value;
        url = url.replace('/file/d/', '/uc?export=download&id=');
        url = url.replace('/view?usp=sharing', '');

        axios({
            method: 'post',
            url: '/download',
            data: {
                url: url,
                filename: filename
            },
            onDownloadProgress: function (progressEvent) {
                var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                document.getElementById('download-progress').value = percentCompleted;
            }
        })
        .then(function (response) {
            console.log(response.data.filename);
        })
        .catch(function (error) {
            console.error(error);
        });
    });
</script>
</body>
</html>
