<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<br><br><br>

<div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3 style="text-align: center; color: black; margin-bottom: 20px;">Editar Inscripción</h3>

    <form action="<?= base_url('inscripciones/' . $inscripcion['id']); ?>" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="inscripcion_id" value="<?= $inscripcion['id']; ?>">
        
        <table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="padding: 10px; vertical-align: top;">
            <label for="id_usuario" style="display: block; font-weight: bold; margin-bottom: 5px;">Cliente</label>
            <select class="form-select" id="id_usuario" name="id_usuario" required>
                <option value="">Seleccionar</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id']; ?>" <?= set_select('id_usuario', $usuario['id'], $usuario['id'] == $inscripcion['id_usuario']); ?>>
                        <?= $usuario['nombres']; ?> <?= $usuario['apellidos']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </td>
        <td style="padding: 10px; vertical-align: top;">
            <label for="telefono" style="display: block; font-weight: bold; margin-bottom: 5px;">Teléfono</label>
            <input type="text" id="telefono" name="telefono" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="<?= $inscripcion['telefono']; ?>">
        </td>
    </tr>
    <tr>
        <td style="padding: 10px; vertical-align: top;">
        <label for="id_clase" style="display: block; font-weight: bold; margin-bottom: 5px;">Clase</label>
<select class="form-select" id="id_clase" name="id_clase" required>
    <option value="">Seleccionar</option>
    <?php foreach ($clases as $clase): ?>
        <?php
            // Encuentra la especialidad y el instructor para esta clase
            $especialidadNombre = '';
            $instructorNombre = '';

            foreach ($especialidades as $especialidad) {
                if ($especialidad['id'] == $clase['id_especialidad']) {
                    $especialidadNombre = $especialidad['nombres'];
                    break;
                }
            }

            foreach ($instructores as $instructor) {
                if ($instructor['id'] == $clase['id_instructor']) {
                    $instructorNombre = $instructor['nombres'];
                    break;
                }
            }
        ?>
        <option value="<?= $clase['id']; ?>" data-fecha_inicio="<?= $clase['fecha_inicio']; ?>"
            <?= isset($inscripcion['id_clase']) && $inscripcion['id_clase'] == $clase['id'] ? 'selected' : ''; ?>>
            <?= $instructorNombre; ?> - <?= $especialidadNombre; ?>
        </option>
    <?php endforeach; ?>
</select>



        </td>
        <td style="padding: 10px; vertical-align: top; width: 50%;">
            <label for="fecha_inicio" style="display: block; font-weight: bold; margin-bottom: 5px;">Inicio: Fecha y Hora</label>
            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                   value="<?= isset($inscripcion['fecha_inicio']) ? date('Y-m-d\TH:i', strtotime($inscripcion['fecha_inicio'])) : ''; ?>">
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 10px; text-align: center;">
            <a href="<?= base_url('inscripciones'); ?>" style="text-decoration: none; color: #fff; background-color: red; padding: 10px 20px; border-radius: 4px; margin-right: 10px; display: inline-block; width: 100px; text-align: center;">Regresar</a>
            <button type="submit" style="background-color: green; border: none; color: #fff; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100px;">Guardar</button>
        </td>
    </tr>
</table>

    </form>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.getElementById('id_clase').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var fechaInicio = selectedOption.getAttribute('data-fecha_inicio');
        document.getElementById('fecha_inicio').value = fechaInicio;
    });
</script>

<?= $this->endSection(); ?>
