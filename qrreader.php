<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Reader</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>

<body>
    <div id="reader"></div>
    <p id="result"></p>

    <script type="text/javascript">
        function onScanSuccess(qrCodeMessage) {
            document.getElementById("result").innerHTML = qrCodeMessage;
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>

</html>
