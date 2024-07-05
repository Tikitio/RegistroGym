<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<table style="width: 100%; background-color: LightSeaGreen;">
    <tr>
        <!-- Celda vacía para margen izquierdo -->
        <td style="width: 10px;">&nbsp;</td>
        
        <!-- Contenido de la tabla -->
        <td>
            <h3 class="my-3" id="titulo">Lista De Usuarios</h3>
        </td>
        <td style="text-align: right;">
            <a href="<?= base_url('usuarios/new'); ?>" class="btn btn-success">Agregar</a>
        </td>
        
        <!-- margen derecho -->
        <td style="width: 10px;">&nbsp;</td>
    </tr>
</table>

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table">
        <tr>
            <th scope="col" style="background-color: LightSeaGreen;">No</th>
            <th scope="col" style="background-color: LightSeaGreen;">Nombre</th>
            <th scope="col" style="background-color: LightSeaGreen;">Apellidos</th>
            <th scope="col" style="background-color: LightSeaGreen;">Sexo</th>
            <th scope="col" style="background-color: LightSeaGreen;">Telefono</th>
            <th scope="col" style="background-color: LightSeaGreen;">Opciones</th>
        </tr>
    </thead>

    <tbody>

 <?php foreach($usuarios as $usuario) : ?>
    <tr>
            <td><?= $usuario['id']; ?></td>
            <td><?= $usuario['nombres']; ?></td>
            <td><?= $usuario['apellidos']; ?></td>
            <td><?= $usuario['sexo']; ?></td>
            <td><?= $usuario['telefono']; ?></td>
            <td> <a href="<?= base_url('usuarios/' . $usuario['id'] . '/edit'); ?>" class="btn btn-warning btn-sm me-2">Editar</a>

 <!-- Botón que abre el modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?= base_url('usuarios/' . $usuario['id']); ?>">Eliminar</button>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    var eliminaModal = document.getElementById('eliminaModal');
    eliminaModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var url = button.getAttribute('data-bs-url');
        var form = document.getElementById('deleteForm');
        form.action = url;
    });
});
</script>

<?= $this->endSection(); ?>