<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<br><br><br>

<div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3 style="text-align: center; color: black; margin-bottom: 20px;">Registro De Nueva Inscripcion</h3>

    <form action="<?= base_url('inscripciones'); ?>" method="post" autocomplete="off">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="id_usuario" style="display: block; font-weight: bold; margin-bottom: 5px;">Cliente</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <option value="">Seleccionar</option>
                        <?php foreach ($usuarios as $usuario): ?>
                            <option value="<?= $usuario['id']; ?>"><?= $usuario['nombres']; ?> <?= $usuario['apellidos']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="telefono" style="display: block; font-weight: bold; margin-bottom: 5px;">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"  value="<?= set_value('telefono'); ?>">
                        </td>
            </tr>
            <td style="padding: 10px; vertical-align: top;">
    <label for="id_clase" style="display: block; font-weight: bold; margin-bottom: 5px;">Clase</label>
    <select class="form-select" id="id_clase" name="id_clase" required>
        <option value="">Seleccionar</option>
        <?php foreach ($clases as $clase): ?>
            <option value="<?= $clase['id']; ?>" data-fecha_inicio="<?= $clase['fecha_inicio']; ?>">
                <?= $clase['id_instructor']; ?>-<?= $clase['id_especialidad']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</td>

<td style="padding: 10px; vertical-align: top; width: 50%;">
    <label for="fecha_inicio" style="display: block; font-weight: bold; margin-bottom: 5px;">Inicio: Fecha y Hora</label>
    <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="<?= set_value('fecha_inicio'); ?>"> 
</td>


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
document.addEventListener('DOMContentLoaded', function () {
    var usuarios = <?= json_encode($usuarios); ?>;
    
    var selectUsuario = document.getElementById('id_usuario');
    var inputTelefono = document.getElementById('telefono');

    selectUsuario.addEventListener('change', function () {
        var usuarioId = selectUsuario.value;

        // Encuentra el usuario seleccionado por su id
        var usuarioSeleccionado = usuarios.find(function (usuario) {
            return usuario.id == usuarioId;
        });

        // Si se encuentra el usuario, actualiza el campo de teléfono
        if (usuarioSeleccionado) {
            inputTelefono.value = usuarioSeleccionado.telefono;
        } else {
            inputTelefono.value = ''; // Limpia el campo si no se encuentra el usuario
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var selectClase = document.getElementById('id_clase');
    var inputFechaInicio = document.getElementById('fecha_inicio');

    selectClase.addEventListener('change', function() {
        var selectedOption = selectClase.options[selectClase.selectedIndex];
        var fechaInicio = selectedOption.getAttribute('data-fecha_inicio');

        if (fechaInicio) {
            inputFechaInicio.value = fechaInicio;
        } else {
            inputFechaInicio.value = ''; // O una fecha predeterminada si no hay valor
        }
    });
});
</script>

<?= $this->endSection(); ?>