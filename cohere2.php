<?php
/**
 * ============================================================================
 * PROYECTO: Ai UI Samples (Edición Cohere)
 * ============================================================================
 * AUTOR:         Alfonso Orozco Aguilar (vibecodingmexico.com)
 * PERFIL:        DevOps / Programador desde 1991 / Contaduría
 * FECHA:         Algun momento de mayo 2025
 * REQUISITOS:    PHP 7.4 - 8.4+ | MySQL 5.7+ | cPanel Environment
 * LICENCIA:      MIT (Libre uso, mantener crédito del autor)
 * * OBJETIVO:
 * Estaba en medio de un problema de perfil de usuario que ocupaba mucho espacio
 * y le pedí a varias IA que me hicieran ejemplos.  El ganador fue CLAUDE y lo
 * incorpore a mi código, cohere fue el finalista.
 *
 * NOTA TÉCNICA:
 * Este código es el resultado de experimentos revisa el README.md
 * para las circunstancias.
 * Version iterativa de adaptación para trabajo con persona daltónica
 *
 * DOCUMENTACIÓN de modos de pensar
 * https://vibecodingmexico.com
 * ============================================================================
 */
// Borrar caché en headers
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: text/html; charset=UTF-8");

// Iniciar temporizador
$startTime = microtime(true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Bootstrap 4</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            padding-top: 56px; /* Altura del navbar */
            padding-bottom: 50px; /* Altura del footer */
        }
        .sidebar {
            width: 300px;
            height: calc(100vh - 56px);
            position: fixed;
            top: 56px;
            left: 0;
            background-color: #f8f9fa;
            transition: left 0.3s;
        }
        .sidebar.collapsed {
            left: -300px;
        }
        .content {
            margin-left: 300px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .content.expanded {
            margin-left: 0;
        }
        .tile {
            position: relative;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
        .tile .number {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            font-weight: bold;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50px;
            background-color: #f8f9fa;
            text-align: center;
            line-height: 50px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Mi App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog"></i> Prueba
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Prueba 1</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Prueba 2</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Prueba 3</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-danger my-2 my-sm-0" type="button">Salir</button>
        </form>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="text-center p-3">
        <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Perfil">
        <h5 class="mt-2">Usuario</h5>
    </div>
    <div class="p-3">
        <button class="btn btn-primary btn-block" id="toggleSidebar"><i class="fas fa-arrow-left"></i> Ocultar</button>
    </div>
</div>

<!-- Contenido Principal -->
<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Bienvenido</h1>
            </div>
        </div>
        <div class="row">
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="tile">
                        <i class="fas fa-users fa-3x"></i>
                        <h4 class="mt-2">Usuarios</h4>
                        <span class="number">43</span>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer" id="footer">
    Tiempo de carga: <span id="loadTime">0.00s</span>
</div>

<!-- Bootstrap 4 JS y dependencias -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Toggle Sidebar
    $('#toggleSidebar').click(function() {
        $('#sidebar').toggleClass('collapsed');
        $('#content').toggleClass('expanded');
        $(this).find('i').toggleClass('fa-arrow-left fa-arrow-right');
    });

    // Calcular tiempo de carga
    $(document).ready(function() {
        var endTime = performance.now() / 1000; // Convertir a segundos
        var loadTime = (endTime - <?php echo json_encode($startTime); ?>).toFixed(2);
        $('#loadTime').text(loadTime + 's');
    });
</script>
</body>
</html>
