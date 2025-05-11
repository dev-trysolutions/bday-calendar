<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="file" id="fileInput" />
    <button id="uploadBtn">Upload</button>
    <div id="progressContainer">
        <div id="progressBar" style="width: 0%; background: green; color: white;">0%</div>
    </div>

    <script>
        function uploadFile(file) {
            const formData = new FormData();
            formData.append("file", file);

            const xhr = new XMLHttpRequest();
            const progressBar = document.getElementById("progressBar");

            xhr.upload.onprogress = function(event) {
                if (event.lengthComputable) {
                    const percentComplete = (event.loaded / event.total) * 100;
                    progressBar.style.width = percentComplete + "%";
                    progressBar.textContent = Math.round(percentComplete) + "%";
                }
            };

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // alert("File uploaded successfully!");
                    console.log('File uploaded successfully!');
                    
                } else {
                    alert("Upload failed: " + xhr.statusText);
                }
            };

            xhr.onerror = function() {
                alert("An error occurred during the upload.");
            };

            xhr.onabort = function() {
                alert("Upload cancelled.");
            };

            xhr.open("POST", "upload.php", true);
            xhr.send(formData);
        }

        // Example usage:
        document.getElementById("uploadBtn").addEventListener("click", function() {
            const fileInput = document.getElementById("fileInput");
            if (fileInput.files.length > 0) {
                uploadFile(fileInput.files[0]);
            }
        });
    </script>
</body>

</html>