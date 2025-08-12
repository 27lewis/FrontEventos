<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formnew" name="formnew">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombres:</label>
            <input type="text" class="form-control" id="nombres" name="nombres" require>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" require>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" require>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" require>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" require>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>