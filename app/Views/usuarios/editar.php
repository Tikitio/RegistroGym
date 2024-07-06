<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<br><br><br>

<div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3 style="text-align: center; color: black; margin-bottom: 20px;">Editar Usuario</h3>

    <form action="<?= base_url('usuarios/' . $usuario['id']); ?>" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="usuario_id" value="<?= $usuario['id']; ?>">
        
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="nombres" style="display: block; font-weight: bold; margin-bottom: 5px;">Nombre</label>
                    <input type="text" id="nombres" name="nombres" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="<?= $usuario['nombres']; ?>" required autofocus>
                </td>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="apellidos" style="display: block; font-weight: bold; margin-bottom: 5px;">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="<?= $usuario['apellidos']; ?>" required>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="telefono" style="display: block; font-weight: bold; margin-bottom: 5px;">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="<?= $usuario['telefono']; ?>" required>
                </td>
                <td style="padding: 10px; vertical-align: top;">
                <label for="sexo" style="display: block; font-weight: bold; margin-bottom: 5px;">Género</label>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option value="">Seleccionar</option>
                        <option value="1" <?= $usuario['sexo'] == '1' ? 'selected' : ''; ?>>Masculino</option>
                        <option value="2" <?= $usuario['sexo'] == '2' ? 'selected' : ''; ?>>Femenino</option>
                        <option value="3" <?= $usuario['sexo'] == '3' ? 'selected' : ''; ?>>Otro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; text-align: center;">
                    <a href="<?= base_url('usuarios'); ?>" style="text-decoration: none; color: #fff; background-color: red; padding: 10px 20px; border-radius: 4px; margin-right: 10px; display: inline-block; width: 100px; text-align: center;">Regresar</a>
                    <button type="submit" style="background-color: green; border: none; color: #fff; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100px;">Guardar</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?= $this->endSection(); ?>
