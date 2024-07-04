<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Editar Usuario</h3>

<form action="<?= base_url('usuarios/' . $usuario['id']); ?>" class="row g-3" method="post" autocomplete="off">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="usuario_id" value="<?= $usuario['id']; ?>">

    <div class="col-md-4">
        <label for="nombres" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $usuario['nombres']; ?>" required autofocus>
    </div>

    <div class="col-md-8">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $usuario['apellidos']; ?>" required>
    </div>

    <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?=$usuario['telefono']; ?>" required>
    </div>

    <div class="col-md-6">
        <label for="sexo" class="form-label">Sexo</label>
        <input type="text" class="form-control" id="sexo" name="sexo" value="<?= $usuario['sexo']; ?>" required>
    </div>

    <div class="col-12">
        <a href="<?= base_url('usuarios'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<?= $this->endSection(); ?>
