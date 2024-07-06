<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<br><br><br>

<div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3 style="text-align: center; color: black; margin-bottom: 20px;">Editar Clase</h3>

    <form action="<?= base_url('clases/' . $clase['id']); ?>" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="clase_id" value="<?= $clase['id']; ?>">
        
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; vertical-align: top; width: 50%;">
                    <label for="id_instructor" style="display: block; font-weight: bold; margin-bottom: 5px;">Instructor</label>
                    <select class="form-select" id="id_instructor" name="id_instructor" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="">Seleccionar</option>
                        <?php foreach($instructores as $instructor): ?>
                            <option value="<?= $instructor['id']; ?>" <?= ($clase['id_instructor'] == $instructor['id']) ? 'selected' : ''; ?>>
                                <?= $instructor['nombres']; ?> <?= $instructor['apellidos']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>

                <td style="padding: 10px; vertical-align: top; width: 50%;">
                    <label for="id_especialidad" style="display: block; font-weight: bold; margin-bottom: 5px;">Especialidad</label>
                    <select class="form-select" id="id_especialidad" name="id_especialidad" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="">Seleccionar</option>
                        <?php foreach($especialidades as $especialidad): ?>
                            <option value="<?= $especialidad['id']; ?>" <?= ($clase['id_especialidad'] == $especialidad['id']) ? 'selected' : ''; ?>>
                                <?= $especialidad['nombres']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="fecha_inicio" style="display: block; font-weight: bold; margin-bottom: 5px;">Inicio: Fecha y Hora</label>
                    <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="<?= date('Y-m-d\TH:i', strtotime($clase['fecha_inicio'])); ?>" required> 
                </td>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="fecha_fin" style="display: block; font-weight: bold; margin-bottom: 5px;">Fin: Fecha y Hora</label>
                    <input type="datetime-local" id="fecha_fin" name="fecha_fin" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="<?= date('Y-m-d\TH:i', strtotime($clase['fecha_fin'])); ?>" required> 
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; vertical-align: top;">
                    <label for="descripcion" style="display: block; font-weight: bold; margin-bottom: 5px;">Descripción</label>
                    <textarea id="descripcion" name="descripcion" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"><?= htmlspecialchars($clase['descripcion']); ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; text-align: center;">
                    <a href="<?= base_url('clases'); ?>" style="text-decoration: none; color: #fff; background-color: red; padding: 10px 20px; border-radius: 4px; margin-right: 10px; display: inline-block; width: 100px; text-align: center;">Regresar</a>
                    <button type="submit" style="background-color: green; border: none; color: #fff; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100px;">Guardar</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?= $this->endSection(); ?>
