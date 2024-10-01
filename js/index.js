document.addEventListener('DOMContentLoaded', function() {
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

// function setupPagination(totalPages, currentPage) {
//     const pagination = document.getElementById('pagination');
//     pagination.innerHTML = ''; // Limpia la paginación anterior

//     for (let i = 1; i <= totalPages; i++) {
//         const pageBtn = document.createElement('li');
//         pageBtn.textContent = i;
//         if (i === currentPage) {
//             pageBtn.disabled = true;
//         }
//         pageBtn.addEventListener('click', () => loadPage(i));
//         pagination.appendChild(pageBtn);
//     }
// }

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

