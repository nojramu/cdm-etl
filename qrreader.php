<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Reader</title>
</head>

<body>
    <video id="preview"></video>
    <!-- Include the Instascan library -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        // Create a new Instascan.Scanner object
        var scanner = new Instascan.Scanner({
            // Set the video element to display the camera view
            video: document.getElementById('preview'),
            // Set the scan period to 5 seconds
            scanPeriod: 5
        });
        // Add an event listener to the scanner to detect when a QR code is scanned
        scanner.addListener('scan', function(content) {
            // The content parameter is the value of the scanned QR code
            alert(content);
        });
        // Get a list of all available cameras
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                // Start the scanner with the first camera
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
    </script>
    <br>
    <!-- Button to exit and return to the main page -->
    <button onclick="location.href='index.php'">Exit</button>
</body>
