<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h2>Convertir imagen JPG a WebP</h2>
    <input type="file" id="upload" accept="image/jpeg" />
    <br><br>
    <canvas id="canvas" style="display:none;"></canvas>
    <br>
    <a id="download" download="imagen-convertida.webp">Descargar WebP</a>

    <script>
        document.getElementById('upload').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file && file.type === 'image/jpeg') {
                const reader = new FileReader();

                reader.onload = function (event) {
                    const img = new Image();
                    img.onload = function () {
                        const canvas = document.getElementById('canvas');
                        const ctx = canvas.getContext('2d');
                        
                        // Ajustar el tamaño del canvas al de la imagen
                        canvas.width = img.width;
                        canvas.height = img.height;

                        // Dibujar la imagen en el canvas
                        ctx.drawImage(img, 0, 0);

                        // Convertir la imagen del canvas a WebP
                        const webpImage = canvas.toDataURL('image/webp');

                        // Crear un enlace de descarga para la imagen WebP
                        const downloadLink = document.getElementById('download');
                        downloadLink.href = webpImage;
                    };

                    img.src = event.target.result; // Cargar la imagen desde el archivo
                };

                reader.readAsDataURL(file); // Leer el archivo como una URL base64
            } else {
                alert('Por favor, selecciona una imagen JPG.');
            }
        });
    </script>

</body>

</html>