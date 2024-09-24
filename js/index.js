document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita que el formulario se envíe de manera tradicional

    const formData = new FormData(this);

    fetch('php/search_inventory2.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            displayGallery(data.items);
            setupPagination(data.total_pages, data.current_page);
        })
        .catch(error => console.error('Error:', error));
});


function displayGallery(items) {
    const gallery = document.getElementById('gallery');
    gallery.innerHTML = ''; // Limpia la galería anterior

    items.forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('col-6', 'col-sm-4', 'col-md-3');
        itemDiv.innerHTML = `
    <img src="${item.image_url}" alt="${item.name}">
    <p>${item.Condicion}</p>
    <p>${item.Fabricante}</p>
    <p>${item.Modelo}</p>
    <p>${item.Ubicacion}</p>
`;
        gallery.appendChild(itemDiv);
    });
}

function setupPagination(totalPages, currentPage) {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = ''; // Limpia la paginación anterior

    for (let i = 1; i <= totalPages; i++) {
        const pageBtn = document.createElement('button');
        pageBtn.textContent = i;
        if (i === currentPage) {
            pageBtn.disabled = true;
        }
        pageBtn.addEventListener('click', () => loadPage(i));
        pagination.appendChild(pageBtn);
    }
}

function loadPage(page) {
    const formData = new FormData(document.getElementById('searchForm'));
    formData.append('page', page);

    fetch('php/search_inventory2.php', {
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