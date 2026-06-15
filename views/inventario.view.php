<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const modalBootstrap = new bootstrap.Modal(document.getElementById('inventarioModal'));
    const form = document.getElementById('inventarioForm');

    // Cargar datos al iniciar
    document.addEventListener('DOMContentLoaded', cargarDatos);

    function cargarDatos() {
        let formData = new FormData();
        formData.append('action', 'read');

        fetch('api_inventario.php', { method: 'POST', body: formData })
            .then(res => res.json())
            .then(response => {
                const tbody = document.getElementById('tabla-body');
                tbody.innerHTML = '';
                
                if(response.status === 'success') {
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

    // Submit del formulario (Crear o Actualizar)
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        let datos = new FormData(form);

        fetch('api_inventario.php', { method: 'POST', body: datos })
            .then(res => res.json())
            .then(response => {
                if(response.status === 'success') {
                    modalBootstrap.hide();
                    Swal.fire('¡Éxito!', response.message, 'success');
                    cargarDatos();
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            });
    });

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

                fetch('api_inventario.php', { method: 'POST', body: formData })
                    .then(res => res.json())
                    .then(response => {
                        if(response.status === 'success') {
                            Swal.fire('Eliminado!', response.message, 'success');
                            cargarDatos();
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    });
            }
        })
    }
</script>
</body>
</html>