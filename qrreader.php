<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Reader</title>
    <link rel="stylesheet" href="style.css">
    <!-- Include Instascan library -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- Include jsQR library -->
    <script src="https://cdn.rawgit.com/cozmo/jsQR/master/dist/jsQR.js"></script>
</head>

<body>
    <h1>QR Code Reader</h1>
    <br>
    <div class="content">
        <!-- Video element for QR code scanning -->
        <video id="preview"></video>

        <!-- Hidden file input for uploading QR code images -->
        <input type="file" id="fileInput" accept="image/*" style="display: none;" />

        <br>
        <!-- Button to trigger file input click -->
        <button onclick="document.getElementById('fileInput').click();">Upload image</button>
        <br>
        <!-- Button to exit and return to the main page -->
        <button onclick="location.href='index.php'">Exit</button>

        <script>
            // Initialize the QR code scanner
            function initializeScanner() {
                var scanner = new Instascan.Scanner({
                    video: document.getElementById('preview'),
                    scanPeriod: 5
                });
                scanner.addListener('scan', function(content) {
                    alert(content);
                });
                Instascan.Camera.getCameras().then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function(e) {
                    console.error(e);
                });
            }

            // Handle QR code image upload and scanning
            function handleQRCodeUpload() {
                document.getElementById('fileInput').addEventListener('change', function(event) {
                    var file = event.target.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = new Image();
                            img.onload = function() {
                                var canvas = document.createElement('canvas');
                                canvas.width = img.width;
                                canvas.height = img.height;
                                var context = canvas.getContext('2d');
                                context.drawImage(img, 0, 0);
                                var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                                var code = jsQR(imageData.data, canvas.width, canvas.height);
                                if (code) {
                                    alert(code.data);
                                } else {
                                    alert('No QR code found.');
                                }
                            };
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Initialize functions
            initializeScanner();
            handleQRCodeUpload();
        </script>
    </div>

</body>

</html>