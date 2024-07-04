<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>
<table style="width: 100%; background-color: Gainsboro;">
    <tr>
        <!-- Celda vacía para margen izquierdo -->
        <td style="width: 10px;">&nbsp;</td>
        
        <!-- Contenido de la tabla -->
        <td>
            <h3 class="my-3" id="titulo">Lista De Instructores</h3>
        </td>
        <td style="text-align: right;">
            <a href="nuevo.html" class="btn btn-success">Agregar</a>
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