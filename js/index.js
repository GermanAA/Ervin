function processExcel() {
    const fileInput = document.getElementById('excelFile');
    const file = fileInput.files[0];
    
    if (!file) {
        alert("Por favor, selecciona un archivo.");
        return;
    }

    const reader = new FileReader();

    reader.onload = function (e) {
        const data = new Uint8Array(e.target.result);
        const workbook = XLSX.read(data, { type: 'array' });
        
        const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
        const excelData = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });
        
        console.log(excelData); // Ver los datos en consola

        // Convertir las fechas en la última columna
        excelData.forEach((row, index) => {
            if (index > 0 && row[row.length - 1]) { // Saltar la cabecera
                row[row.length - 1] = excelDateToJSDate(row[row.length - 1]);
            }
        });

        // Mostrar los datos en HTML
        let output = '<table border="1">';
        excelData.forEach(row => {
            output += '<tr>';
            row.forEach(cell => {
                output += `<td>${cell}</td>`;
            });
            output += '</tr>';
        });
        output += '</table>';
        document.getElementById('output').innerHTML = output;

        // Convertir los datos a formato JSON para enviar a la base de datos
        sendDataToDatabase(excelData);
    };

    reader.readAsArrayBuffer(file);
}

// Función para convertir el formato de fecha de Excel a una fecha JS (YYYY-MM-DD)
function excelDateToJSDate(excelDate) {
    const date = new Date((excelDate - (25567 + 2)) * 86400 * 1000); // Ajustar la fecha base de Excel (1900)
    return date.toISOString().split('T')[0]; // Devuelve la fecha en formato YYYY-MM-DD
}

function sendDataToDatabase(data) {
    // Envía los datos a un archivo PHP mediante AJAX para procesarlos y guardarlos en la base de datos MySQL
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Datos enviados exitosamente a la base de datos");
        }
    };

    const jsonData = JSON.stringify({ excelData: data });
    xhr.send(jsonData);
}