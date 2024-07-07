<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>
<!-- Contenedor principal -->
<div style="width: 100%; background-color: LightSeaGreen; padding: 10px; box-sizing: border-box;">

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
     
            <td style="width: 10px; background-color: LightSeaGreen;"></td>
            
            <!-- Contenido de la tabla -->
            <td style="text-align: left; padding: 0 10px;">
                <h3 style="margin: 0; color: white;">Lista De Inscripciones</h3>
            </td>
            <td style="text-align: left; padding: 0 10px;">
                <!-- Buscador de clases -->
                <input type="text" placeholder="Búsqueda de inscripcion" style="max-width: 350px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; text-align: center;" id="bvac">
            </td>
            <td style="text-align: right; padding: 0 10px;">
                <a href="<?= base_url('inscripciones/new'); ?>" style="display: inline-block; padding: 10px 20px; color: white; background-color: #28a745; text-decoration: none; border-radius: 5px; font-weight: bold;">Agregar Inscripción</a>
            </td>
 
            <td style="width: 10px; background-color: LightSeaGreen;"></td>
        </tr>
    </table>
</div>





<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table">
        <tr>
            <th scope="col" style="background-color: LightSeaGreen; color:white">No</th>
            <th scope="col" style="background-color: LightSeaGreen; color:white">Cliente</th>
            <th scope="col" style="background-color: LightSeaGreen; color:white">Telefono</th>
            <th scope="col" style="background-color: LightSeaGreen; color:white">Clase</th>
            <th scope="col" style="background-color: LightSeaGreen; color:white">Inicio: Fecha y Hora</th>
            <th scope="col" style="background-color: LightSeaGreen; color:white">Opciones</th>
        </tr>
    </thead>

   
    <tbody id="tablaBody">
    <?php foreach($inscripciones as $inscripcion) : ?>
    <tr>
    <td><?= $inscripcion['id']; ?></td>
        <td><?= isset($inscripcion['nombre_usuario']) ? $inscripcion['nombre_usuario'] : 'N/A'; ?> <?= isset($inscripcion['apellido_usuario']) ? $inscripcion['apellido_usuario'] : 'N/A'; ?></td>
        <td><?= $inscripcion['telefono']; ?></td>
        <td><?= isset($inscripcion['nombre_instructor']) ? $inscripcion['nombre_instructor'] : 'N/A'; ?> <?= isset($inscripcion['apellido_instructor']) ? $inscripcion['apellido_instructor'] : 'N/A'; ?>-<?= isset($inscripcion['nombre_especialidad']) ? $inscripcion['nombre_especialidad'] : 'N/A'; ?></td>
        <td><?= $inscripcion['fecha_inicio']; ?></td>
            <td> <a href="<?= base_url('inscripciones/' . $inscripcion['id'] . '/edit'); ?>" class="btn btn-warning btn-sm me-2">Editar</a>

 <!-- Botón que abre el modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?= base_url('inscripciones/' . $inscripcion['id']); ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteForm" action="" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var eliminaModal = document.getElementById('eliminaModal');
    eliminaModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var url = button.getAttribute('data-bs-url');
        var form = document.getElementById('deleteForm');
        form.action = url;
    });

 // Codigo JavaScript para el buscador
    $("#bvac").keyup(function() {
        var query = $(this).val().toLowerCase();
        $("#tablaBody tr").each(function() {
            var rowData = $(this).text().toLowerCase();
            if (rowData.indexOf(query) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });
});
</script>

<?= $this->endSection(); ?>