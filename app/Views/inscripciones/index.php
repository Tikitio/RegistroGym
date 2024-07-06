<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>
<!-- Contenedor principal -->
<div style="width: 100%; background-color: LightSeaGreen; padding: 10px; box-sizing: border-box;">

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
     
            <td style="width: 10px; background-color: LightSeaGreen;"></td>
            
            <!-- Contenido de la tabla -->
            <td style="text-align: left; padding: 0 10px;">
                <h3 style="margin: 0; color: white;">Lista De Inscripción</h3>
            </td>
            <td style="text-align: left; padding: 0 10px;">
                <!-- Buscador de instructor -->
                <input type="text" placeholder="Búsqueda de Inscripcion" style="max-width: 320px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; text-align: center;" id="bvac">
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
            <th scope="col" style="background-color: LightSeaGreen;">No</th>
            <th scope="col" style="background-color: LightSeaGreen;">Cliente</th>
            <th scope="col" style="background-color: LightSeaGreen;">Clase</th>
            <th scope="col" style="background-color: LightSeaGreen;">Fecha</th>
            <th scope="col" style="background-color: LightSeaGreen;">Telefono</th>
            <th scope="col" style="background-color: LightSeaGreen;">Opciones</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>12345</td>
            <td>JUAN PEREZ</td>
            <td>0123456789</td>
            <td>JUANPEREZ@DOMINIO.COM</td>
            <td>RECURSOS HUMANOS</td>
            <td>
                <a href="edita.html" class="btn btn-warning btn-sm me-2">Editar</a>

                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#eliminaModal" data-bs-id="1">Eliminar</button>
            </td>
        </tr>

    </tbody>
</table>

<?= $this->endSection(); ?>