function handleFileUpload(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    const originalFileName = file.name.replace(/\.[^/.]+$/, ""); // Nombre del archivo sin la extensión original

    reader.onload = function (e) {
        const img = new Image();
        img.src = e.target.result;

        img.onload = function () {
            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            canvas.toBlob(function (blob) {
                const newFile = new File([blob], originalFileName + '.webp', { type: 'image/webp' }); // Añadir la extensión .webp
                uploadFile(newFile);
            }, 'image/webp');
        };
    };

    reader.readAsDataURL(file); // Lee el archivo seleccionado
}

function uploadFile(file) {
    const formData = new FormData();
    formData.append('product', file); // Subimos el archivo convertido a WebP
    // Agregar otros campos del formulario aquí
    formData.append('condicion', document.getElementById('condicion').value);
    formData.append('fabricante', document.getElementById('fabricante').value);
    formData.append('modelo', document.getElementById('modelo').value);
    formData.append('ubicacion', document.getElementById('ubicacion').value);
    formData.append('precio', document.getElementById('precio').value);
    formData.append('estatus', document.getElementById('estatus').value);
    formData.append('FechaIngreso', document.getElementById('FechaIngreso').value);

    fetch('php/upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert('Imagen y datos enviados correctamente');
         // Limpiar el formulario
         document.getElementById('myForm').reset(); // Limpia todos los campos del formulario
        
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Evitar el envío tradicional del formulario
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('myForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto
        const fileInput = document.getElementById('product');
        if (fileInput.files.length > 0) {
            handleFileUpload({ target: fileInput });
        } else {
            alert('Por favor selecciona una imagen antes de enviar.');
        }
    });
});