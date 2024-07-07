<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?= base_url('css/estilo.css'); ?>" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100" style="background-color: #F8F6F3;">

<!-- CONTENIDO DEL NAVBAR -->
<nav class="navbar navbar-expand-lg bg-light" style="background-color: #FFFFFF;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <!-- Imagen de icono -->
      <img src="<?= base_url('img/vendiereinc.png'); ?>" alt="Icono" style="height: 100px; width: auto;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('usuarios'); ?>">USUARIOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('instructores'); ?>">INSTRUCTORES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('clases'); ?>">CLASES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('inscripciones'); ?>">INSCRIPCIONES</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
      <?php echo $this->renderSection('contenido'); ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<?php echo $this->renderSection('script'); ?>
</body>

</html>
