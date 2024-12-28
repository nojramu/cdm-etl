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
    <div class="content">
        <video id="preview"></video>
        <input type="file" id="fileInput" accept="image/*" style="display: none;" />
        <button onclick="document.getElementById('fileInput').click();">Upload image</button>
        <button onclick="location.href='index.php'">Exit</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeScanner();
            handleQRCodeUpload();
        });

        function initializeScanner() {
            const scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
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

        function handleQRCodeUpload() {
            document.getElementById('fileInput').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = new Image();
                        img.onload = function() {
                            const canvas = document.createElement('canvas');
                            canvas.width = img.width;
                            canvas.height = img.height;
                            const context = canvas.getContext('2d');
                            context.drawImage(img, 0, 0);
                            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                            const code = jsQR(imageData.data, canvas.width, canvas.height);
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
    </script>
</body>

</html>
