<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3 style="text-align: center; color: black; margin-bottom: 20px;">Nuevo Empleado</h3>

    <form action="#" method="post" autocomplete="off">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="clave" style="display: block; font-weight: bold; margin-bottom: 5px;">Cliente</label>
                    <input type="text" id="clave" name="clave" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </td>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="nombre" style="display: block; font-weight: bold; margin-bottom: 5px;">Instructor</label>
                    <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; vertical-align: top;">
                    <label for="nombre" style="display: block; font-weight: bold; margin-bottom: 5px;">Clase</label>
                    <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="fecha_nacimiento" style="display: block; font-weight: bold; margin-bottom: 5px;">Fecha de inicio</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </td>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="telefono" style="display: block; font-weight: bold; margin-bottom: 5px;">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; text-align: center;">
                    <a href="index.html" style="text-decoration: none; color: #fff; background-color: red; padding: 10px 20px; border-radius: 4px; margin-right: 10px; display: inline-block; width: 100px; text-align: center;">Regresar</a>
                    <button type="submit" style="background-color: green; border: none; color: #fff; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100px;">Guardar</button>
                </td>
            </tr>
        </table>
    </form>
</div>


<?= $this->endSection(); ?>