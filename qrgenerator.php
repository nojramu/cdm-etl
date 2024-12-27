<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>

<body>
    <!-- Form to input text for QR code generation -->
    <form action="qrgenerator.php" method="post">
        <label>Enter text to generate QR code:</label><br>
        <input type="text" name="qrtext" required><br>
        <input type="submit" value="Generate QR Code">
    </form>

    <?php
    // Check if the form is submitted and the input is not empty
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["qrtext"])) {
            // Encode the input text for URL usage
            $text = urlencode($_POST["qrtext"]);
            // Display the generated QR code image
            echo "<img src='https://api.qrserver.com/v1/create-qr-code/?data={$text}&amp;size=150x150' alt='QR Code'>";
        } else {
            echo "<p>Please enter text to generate a QR code.</p>";
        }
    }
    ?>
    <br>
    <!-- Button to exit and return to the main page -->
    <button onclick="location.href='index.php'">Exit</button>
</body>

</html>

