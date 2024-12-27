<?php

// Check if the form is submitted and the input is not empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["qrtext"])) {
        // Encode the input text for URL usage
        $text = urlencode($_POST["qrtext"]);
    } else {
        $text = "";
    }
} else {
    $text = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <!-- Include the qrcode library -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

<body>
    <hi>QR Code Generator</hi>
    <!-- Form to input text for QR code generation -->
    <form action="qrgenerator.php" method="post">
        <label>Enter text to generate QR code:</label><br>
        <input type="text" name="qrtext" value="<?php echo htmlspecialchars($text, ENT_QUOTES); ?>" required><br>
        <input type="submit" value="Generate QR Code">
    </form>

    <?php
    if (!empty($text)) {
        // Display the generated QR code image
        echo "<div id='qrcode'></div><script>new QRCode(document.getElementById('qrcode'), '{$text}');</script>";
        // Create a button to download the QR code as an image
        echo "<button id='download'>Download QR Code</button>";
        echo "<script>document.getElementById('download').addEventListener('click', function() {
            var qr = document.getElementById('qrcode').querySelector('canvas');
            var link = document.createElement('a');
            link.href = qr.toDataURL();
            link.download = 'qrcode.png';
            link.click();
        });</script>";
    } else {
        echo "<p>Please enter text to generate a QR code.</p>";
    }
    ?>
    <br>
    <!-- Button to exit and return to the main page -->
    <button onclick="location.href='index.php'">Exit</button>

</body>

</html>