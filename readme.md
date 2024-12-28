# QR Code Tools

This project provides tools for generating and reading QR codes. It includes a QR code generator and a QR code reader, both accessible through a simple web interface.

## Features

- **QR Code Generator**: Generate QR codes from text input.
- **QR Code Reader**: Read QR codes using a webcam or by uploading an image.

## Installation

1. Clone the repository to your local machine.
2. Ensure you have a web server (e.g., XAMPP) running.
3. Place the project files in the web server's root directory (e.g., `/Applications/XAMPP/xamppfiles/htdocs/etl`).

## Usage

### QR Code Generator

1. Navigate to `http://localhost/etl/qrgenerator.php`.
2. Enter the text you want to encode in the QR code.
3. Click "Generate QR Code" to generate the QR code.
4. You can download the generated QR code by clicking the "Download QR Code" button.

### QR Code Reader

1. Navigate to `http://localhost/etl/qrreader.php`.
2. Use your webcam to scan a QR code or upload an image containing a QR code.
3. The content of the QR code will be displayed in an alert.

## Files

- `index.php`: Main page with links to the QR code generator and reader.
- `qrgenerator.php`: Page for generating QR codes.
- `qrreader.php`: Page for reading QR codes.
- `style.css`: Stylesheet for the project.

## Dependencies

- [qrcodejs](https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js): Library for generating QR codes.
- [Instascan](https://rawgit.com/schmich/instascan-builds/master/instascan.min.js): Library for scanning QR codes using a webcam.
- [jsQR](https://cdn.rawgit.com/cozmo/jsQR/master/dist/jsQR.js): Library for decoding QR codes from images.