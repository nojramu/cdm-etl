<?php
// Set error reporting to the highest level
error_reporting(-1);
ini_set('display_errors', '1');

// Check for null pointer references
if (!isset($scanPeriod)) {
    $scanPeriod = 5;
}

if (!isset($mirror)) {
    $mirror = false;
}

// Check for unhandled exceptions
try {
    if (!isset($cameras)) {
        throw new Exception('No cameras found.');
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Reader</title>
    <!-- Include Instascan library for QR code scanning -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <!-- Video element to display camera feed -->
    <video id="preview"></video>
    <script type="text/javascript">
        // Initialize Instascan scanner with specified options
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: <?php echo $scanPeriod; ?>, mirror: <?php echo $mirror; ?> });
        
        // Add event listener for scan event
        scanner.addListener('scan', function(content, image) {
            // Alert the scanned QR code content
            alert("QR Code content: " + content);
        });

        // Get available cameras and start the scanner with the first camera
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else{
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

</html>

