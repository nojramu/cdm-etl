<?php
$text = isset($_POST['qrtext']) ? htmlspecialchars($_POST['qrtext'], ENT_QUOTES) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

<body>
    <h1>QR Code Generator</h1>
    <div class="content">
        <form action="qrgenerator.php" method="post" style="text-align: center; margin-bottom: 20px;">
            <label for="qrtext" style="display: block; margin-bottom: 10px;">Enter text to generate QR code:</label>
            <input type="text" id="qrtext" name="qrtext" value="<?php echo $text; ?>" required style="display: block; width: 100%; max-width: 400px; padding: 10px; margin: 0 auto 10px auto; box-sizing: border-box;">
            <input type="submit" value="Generate QR Code" style="padding: 10px 20px; width: 100%; max-width: 400px; margin: 0 auto; display: block;">
        </form>

        <?php if (!empty($text)): ?>
            <div id="qrcode" style="margin: 10px; justify-content: center;"></div>
            <script>
                new QRCode(document.getElementById('qrcode'), '<?php echo $text; ?>');
            </script>
            <button id="download">Download QR Code</button>
            <script>
                document.getElementById('download').addEventListener('click', function() {
                    var qrCanvas = document.getElementById('qrcode').querySelector('canvas');
                    var downloadLink = document.createElement('a');
                    downloadLink.href = qrCanvas.toDataURL();
                    downloadLink.download = 'qrcode.png';
                    downloadLink.click();
                });
            </script>
        <?php else: ?>
            <p>Please enter text to generate a QR code.</p>
        <?php endif; ?>

        <br>
        <button onclick="location.href='index.php'">Exit</button>
    </div>
</body>

</html>
