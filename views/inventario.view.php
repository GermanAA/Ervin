<?php require 'templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Inventario de Equipos</h2>
    <button class="btn btn-primary" onclick="abrirModal()">+ Nuevo Equipo</button>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Fabricante</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Ubicación</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla-body">
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="inventarioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitle">Nuevo Equipo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="inventarioForm">
                <div class="modal-body">
                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="id" id="id">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fabricante</label>
                            <input type="text" class="form-control" name="fabricante" id="fabricante" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="modelo" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Condición</label>
                            <input type="text" class="form-control" name="condicion" id="condicion">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ubicación</label>
                            <input type="text" class="form-control" name="ubicacion" id="ubicacion">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" name="price" id="price">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Estatus</label>
                            <input type="text" class="form-control" name="estatus" id="estatus">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Fecha Ingreso</label>
                            <input type="date" class="form-control" name="fechaIngreso" id="fechaIngreso" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Ruta</label>
                            <input type="text" class="form-control" name="ruta" id="ruta" required>
                        </div>

                        <!-- SECCIÓN DE FOTOGRAFÍAS DEL REMOLQUE -->
                        <div class="col-12 mt-4 mb-2">
                            <h6 class="border-bottom pb-2 text-primary">Fotografías del Remolque (Se comprimirán al 30%)</h6>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Frente</label>
                            <input type="file" class="form-control" name="foto_frente" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Lateral Izquierdo</label>
                            <input type="file" class="form-control" name="foto_lat_izq" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Lateral Derecho</label>
                            <input type="file" class="form-control" name="foto_lat_der" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Puertas</label>
                            <input type="file" class="form-control" name="foto_puertas" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Suspensión</label>
                            <input type="file" class="form-control" name="foto_suspension" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Interior</label>
                            <input type="file" class="form-control" name="foto_interior" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Llantas Izquierdas</label>
                            <input type="file" class="form-control" name="foto_llantas_izq" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Llantas Derechas</label>
                            <input type="file" class="form-control" name="foto_llantas_der" accept="image/*">
                        </div>
                        <!-- FIN SECCIÓN DE FOTOGRAFÍAS -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // 1. Declaramos las variables globales primero, pero las dejamos vacías
    let modalBootstrap;
    let form;

    // 2. Esperamos a que TODA la página (incluyendo el footer con Bootstrap) termine de cargar
    document.addEventListener('DOMContentLoaded', function() {

        // Ahora sí, inicializamos las variables
        modalBootstrap = new bootstrap.Modal(document.getElementById('inventarioModal'));
        form = document.getElementById('inventarioForm');

        // Cargamos los datos de la tabla
        cargarDatos();

        // 3. Movemos el eventListener del formulario AQUÍ ADENTRO, porque ahora 'form' ya existe

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Mostramos alerta de procesamiento porque comprimir 8 fotos toma unos segundos
            Swal.fire({
                title: 'Procesando...',
                text: 'Comprimiendo imágenes y guardando datos',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            let datos = new FormData(form);

            // Array con los nombres de los inputs de nuestras imágenes
            const inputsFotos = [
                'foto_frente', 'foto_lat_izq', 'foto_lat_der', 'foto_puertas',
                'foto_suspension', 'foto_interior', 'foto_llantas_izq', 'foto_llantas_der'
            ];

            // Iteramos sobre los inputs para buscar imágenes y comprimirlas
            for (const inputName of inputsFotos) {
                const inputElement = document.querySelector(`input[name="${inputName}"]`);

                // Si el usuario seleccionó un archivo en este input
                if (inputElement && inputElement.files.length > 0) {
                    const archivoOriginal = inputElement.files[0];

                    // Solo comprimimos si es una imagen
                    if (archivoOriginal.type.startsWith('image/')) {
                        const archivoComprimido = await comprimirImagen(archivoOriginal);
                        // Sobrescribimos el archivo pesado original en el FormData con el comprimido
                        datos.set(inputName, archivoComprimido);
                    }
                }
            }

            // Se envía el POST exactamente igual, pero ahora el FormData pesa un 70% menos
            fetch('api_inventario.php', {
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(response => {
                    if (response.status === 'success') {
                        modalBootstrap.hide();
                        Swal.fire('¡Éxito!', response.message, 'success');
                        cargarDatos();
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error en fetch:', error);
                    Swal.fire('Error', 'No se pudo conectar con el servidor', 'error');
                });
        });
    });

    // =========================================================
    // Funciones que se ejecutan POR CLIC (No necesitan esperar)
    // =========================================================

    function cargarDatos() {
        let formData = new FormData();
        formData.append('action', 'read');

        fetch('api_inventario.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(response => {
                const tbody = document.getElementById('tabla-body');
                tbody.innerHTML = '';

                if (response.status === 'success') {
                    response.data.forEach(item => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${item.Id}</td>
                                <td>${item.Fabricante || ''}</td>
                                <td>${item.Modelo || ''}</td>
                                <td>$${item.Price || '0.00'}</td>
                                <td>${item.Ubicacion || ''}</td>
                                <td>${item.Estatus || ''}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick='editarRegistro(${JSON.stringify(item)})'>Editar</button>
                                    <button class="btn btn-sm btn-danger" onclick="eliminarRegistro(${item.Id})">Eliminar</button>
                                </td>
                            </tr>
                        `;
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function abrirModal() {
        form.reset();
        document.getElementById('action').value = 'create';
        document.getElementById('modalTitle').innerText = 'Nuevo Equipo';
        modalBootstrap.show();
    }

    function editarRegistro(item) {
        document.getElementById('action').value = 'update';
        document.getElementById('id').value = item.Id;
        document.getElementById('fabricante').value = item.Fabricante;
        document.getElementById('modelo').value = item.Modelo;
        document.getElementById('condicion').value = item.Condicion;
        document.getElementById('ubicacion').value = item.Ubicacion;
        document.getElementById('price').value = item.Price;
        document.getElementById('estatus').value = item.Estatus;
        document.getElementById('fechaIngreso').value = item.FechaIngreso;
        document.getElementById('ruta').value = item.Ruta;

        document.getElementById('modalTitle').innerText = 'Editar Equipo';
        modalBootstrap.show();
    }

    function eliminarRegistro(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append('action', 'delete');
                formData.append('id', id);

                fetch('api_inventario.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => res.json())
                    .then(response => {
                        if (response.status === 'success') {
                            Swal.fire('Eliminado!', response.message, 'success');
                            cargarDatos();
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    });
            }
        })
    }

    // Función para comprimir imagen usando Canvas nativo
    async function comprimirImagen(file) {
        return new Promise((resolve) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (event) => {
                const img = new Image();
                img.src = event.target.result;
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    // Mantener las dimensiones originales
                    canvas.width = img.width;
                    canvas.height = img.height;

                    // Dibujar la imagen en el canvas
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    // Exportar a JPEG con 30% de calidad (0.3)
                    canvas.toBlob((blob) => {
                        // Recrear un objeto File con el Blob comprimido
                        const compressedFile = new File([blob], file.name, {
                            type: 'image/jpeg',
                            lastModified: Date.now()
                        });
                        resolve(compressedFile);
                    }, 'image/jpeg', 0.3);
                };
            };
        });
    }
</script>
<?php require 'templates/footer.php'; ?>