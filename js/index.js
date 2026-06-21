// 1. Define la función que hace la petición y muestra los resultados.
function fetchInventory() {
    const form = document.getElementById('searchForm');
    const formData = new FormData(form);

    formData.append('action', 'search');
    
    fetch('api_inventario.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json()) // <-- Regresar de .text() a .json()
        .then(data => {
            // Esto imprimirá el error real de PHP (o el HTML) en tu consola
            displayGallery(data.items);
            setupPagination(data.total_pages, data.current_page);
        })
        .catch(error => console.error('Error del Fetch:', error));
}
// 2. Agrega el "listener" para el evento 'submit' del formulario.
document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita la recarga de la página.
    fetchInventory();   // Llama a la función para buscar y mostrar.
});

// 3. Agrega el "listener" para el evento 'DOMContentLoaded'.
// Este evento se dispara cuando el HTML inicial de la página se ha cargado por completo.
document.addEventListener('DOMContentLoaded', function () {
    fetchInventory(); // Llama a la función para la carga inicial.
});

function displayGallery(items) {
    const gallery = document.getElementById('gallery');
    gallery.innerHTML = ''; // Limpia la galería anterior

    items.forEach(item => {
        const itemDiv = document.createElement('div');
        // Agregamos clases de Bootstrap para que sea una tarjeta bonita
        itemDiv.classList.add('col-6', 'col-sm-4', 'col-md-3', 'mb-4');

        // Ya no necesitamos el "if", porque PHP ya nos manda la ruta correcta o el placeholder
        itemDiv.innerHTML = `
            <div class="card h-100 shadow-sm bg-dark text-light border-secondary">
            <img src="${item.image_url}" class="card-img-top img-fluid" alt="${item.Fabricante} ${item.Modelo}" style="aspect-ratio: 1 / 1; width: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/cccccc/666666?text=Sin+Fotografia';">
                <div class="card-body">
                    <h5 class="card-title">${item.Fabricante} ${item.Modelo}</h5>
                    <p class="card-text mb-1"><strong>Condición:</strong> ${item.Condicion}</p>
                    <p class="card-text mb-1"><strong>Ubicación:</strong> ${item.Ubicacion}</p>
                    <p class="card-text"><strong>Estatus:</strong> ${item.Estatus}</p>
                </div>
            </div>
        `;
        gallery.appendChild(itemDiv);
    });
}



function setupPagination(totalPages, currentPage) {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = ''; // Clear previous pagination

    // Create Previous button
    const prevBtn = document.createElement('li');
    prevBtn.classList.add('page-item'); // Add the 'page-item' class to follow Bootstrap style
    if (currentPage === 1) {
        prevBtn.classList.add('disabled'); // Disable if on the first page
    }
    const prevLink = document.createElement('a');
    prevLink.classList.add('page-link');
    prevLink.href = '#';
    prevLink.textContent = 'Previous';
    prevLink.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent the default action
        if (currentPage > 1) {
            loadPage(currentPage - 1);
        }
    });
    prevBtn.appendChild(prevLink);
    pagination.appendChild(prevBtn);

    // Create page number buttons
    for (let i = 1; i <= totalPages; i++) {
        const pageBtn = document.createElement('li');
        pageBtn.classList.add('page-item'); // Add the 'page-item' class
        if (i === currentPage) {
            pageBtn.classList.add('active'); // Highlight the current page
        }

        const pageLink = document.createElement('a');
        pageLink.classList.add('page-link');
        pageLink.href = '#';
        pageLink.textContent = i;

        pageLink.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default page jump
            loadPage(i);
        });

        pageBtn.appendChild(pageLink); // Append the link to the list item
        pagination.appendChild(pageBtn); // Append the list item to the pagination
    }

    // Create Next button
    const nextBtn = document.createElement('li');
    nextBtn.classList.add('page-item'); // Add the 'page-item' class
    if (currentPage === totalPages) {
        nextBtn.classList.add('disabled'); // Disable if on the last page
    }
    const nextLink = document.createElement('a');
    nextLink.classList.add('page-link');
    nextLink.href = '#';
    nextLink.textContent = 'Next';
    nextLink.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent the default action
        if (currentPage < totalPages) {
            loadPage(currentPage + 1);
        }
    });
    nextBtn.appendChild(nextLink);
    pagination.appendChild(nextBtn);
}


function loadPage(page) {
    const formData = new FormData(document.getElementById('searchForm'));
    formData.append('page', page);
    
    // Agregamos la acción para que el backend sepa qué hacer
    formData.append('action', 'search'); 

    // Corregimos la ruta igual que arriba
    fetch('api_inventario.php', { 
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            displayGallery(data.items);
            setupPagination(data.total_pages, data.current_page);
        })
        .catch(error => console.error('Error:', error));
}

document.getElementById('ContactForm').addEventListener('submit', function (e) {
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;

    // Validar formato de teléfono (solo números y longitud de 10 dígitos)
    var phonePattern = /^\d{10}$/;
    if (!phonePattern.test(phone)) {
        alert('El número de teléfono debe tener 10 dígitos.');
        e.preventDefault(); // Evitar que el formulario se envíe
    }

    // Validar el formato del correo electrónico
    var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(email)) {
        alert('Por favor ingrese un correo electrónico válido.');
        e.preventDefault();
    }
});

