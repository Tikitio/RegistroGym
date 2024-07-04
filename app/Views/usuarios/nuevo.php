<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Nuevo empleado</h3>



<form action="<?= base_url('usuarios'); ?>" class="row g-3" method="post" autocomplete="off">

    <div class="col-md-4">
        <label for="clave" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?= set_value('nombres'); ?>" required autofocus>
    </div>

    <div class="col-md-8">
        <label for="nombre" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= set_value('apellidos'); ?>" required>
    </div>

    <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="telefono" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono'); ?>" required>
    </div>

    <div class="col-md-6">
        <label for="correo_electronico" class="form-label">Sexo</label>
        <input type="text" class="form-control" id="sexo" name="sexo" value="<?= set_value('sexo'); ?>" required>
    </div>

    <!-- <div class="col-md-6">
        <label for="departamento" class="form-label">Departamento</label>
        <select class="form-select" id="departamento" name="departamento" required>
            <option value="">Seleccionar</option>
        </select>
    </div> -->

    <div class="col-12">
        <a href="<?= base_url('usuarios'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>

<?= $this->endSection(); ?>