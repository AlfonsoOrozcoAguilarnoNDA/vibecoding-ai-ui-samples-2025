/**
 * ============================================================================
 * PROYECTO: Ai UI Samples (Edición gemini 2025)
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
 * para las circunstancias. A este de gemini le hice dos modificaciones
 * le puse los headers de cache del principio y un color cyan
 *
 * Se añadió fondo cyan al contenedor principal durante las pruebas para
 * delimitar el área de trabajo y verificar el scroll horizontal pedido en
 * el prompt
 * El resultado de Gemini fue muy agradable, pero NO permitia ocultar el
 * perfil que era mi requerimiento principal inicial.
 *
 * DOCUMENTACIÓN de modos de pensar
 * https://vibecodingmexico.com
 * ============================================================================
 */
/* PROMPT MAYO 2025 dado a varias IA
Necesito hacer una interfaz grafica en formato bootstrap 4 para php 7.x y 8x,
con barra de menus fija, footer fijo y scroill horizontal por algunas pantallas.
Se espera usar unos 300 pixels para el lado izquierdo usar un perfil de usuario
que pueda moverse a izquierda o derecha con un botón, y el espacio resultante
debe ser un div donde pueda poner contenido, que pienso poner botones tipo
interfaz metro, de windows 8, con un icono de font awesome, un texto y un
numero en esquina superior. ejemplo, usuarios, palabra usuarios y numero 43.
Se espera filas de 4 mosaicos que se adapten porque a veces entro en celular.

Pon por favor un menu con dropdown texto prueba 1 prueba dos
y prueba 3, con iconos en el texto de menu, y un boton rojo en en lado derecho
superior que diga salir.

Nuevas necesidades: 1 ) Cuenta en segundos con centesiumas de segundo el tiempo
desde que inicia hasta que termina, y que vaya en el footer (ej 2.03s) 2 )
Borra caché en headers, y considera como default UTF8

Genera el script php por favor. Gracias

*/
?>
<?php
// Iniciar el temporizador para calcular el tiempo de carga de la página
$start_time = microtime(true);

// 1) Borrar caché en headers y configurar UTF-8 por defecto
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Interfaz Gráfica Bootstrap</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Asegura que el body ocupe al menos el alto de la ventana */
            overflow-x: hidden; /* Evita el scroll horizontal general */
        }
        #wrapper {
            display: flex;
            flex-grow: 1; /* Permite que el contenido principal ocupe el espacio restante */
            overflow: hidden; /* Oculta el scroll horizontal que pueda generar el contenido interno si no cabe */
        }
        #sidebar-wrapper {
            min-width: 300px;
            max-width: 300px;
            background: #343a40; /* Color oscuro para el sidebar */
            color: white;
            transition: all 0.3s ease;
            position: relative; /* Para el botón de toggle */
            display: flex;
            flex-direction: column;
            overflow-y: auto; /* Scroll vertical si el contenido del sidebar es muy largo */
        }
        #sidebar-wrapper.toggled {
            margin-left: -300px; /* Oculta el sidebar */
        }
        #page-content-wrapper {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto; /* Permite scroll vertical en el contenido principal */
            overflow-x: auto; /* Permite scroll horizontal en el contenido principal si es necesario */
            display: flex;
            flex-direction: column; /* Para que el contenido interno se apile verticalmente */
        }
        .navbar-brand {
            padding: 0 1rem;
        }
        .navbar-nav .nav-link {
            display: flex;
            align-items: center;
        }
        .navbar-nav .nav-link .fas, .navbar-nav .nav-link .far {
            margin-right: 8px;
        }

        /* Estilos para los botones tipo Metro */
        .metro-tile {
            position: relative;
            background-color: #007bff; /* Color de ejemplo */
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 15px; /* Espacio entre mosaicos */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 150px; /* Altura fija para los mosaicos */
            overflow: hidden; /* Para asegurar que el contenido no se desborde */
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .metro-tile:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .metro-tile .icon {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .metro-tile .title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .metro-tile .count {
            position: absolute;
            top: 10px;
            right: 15px;
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 0.9rem;
        }

        /* Colores para diferentes mosaicos (ejemplos) */
        .metro-tile.bg-primary { background-color: #007bff; }
        .metro-tile.bg-success { background-color: #28a745; }
        .metro-tile.bg-info { background-color: #17a2b8; }
        .metro-tile.bg-warning { background-color: #ffc107; }
        .metro-tile.bg-danger { background-color: #dc3545; }
        .metro-tile.bg-secondary { background-color: #6c757d; }

        /* Estilos para el footer fijo */
        .footer {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
            /* border-top: 1px solid #e7e7e7; */
            width: 100%;
            flex-shrink: 0; /* Evita que el footer se encoja */
        }

        /* Ajustes para pantallas pequeñas (móviles) */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -300px; /* Sidebar oculto por defecto en móvil */
                position: fixed; /* Lo hace flotante sobre el contenido */
                height: 100vh; /* Ocupa el 100% de la altura de la ventana */
                padding-top: 56px; /* Ajusta por la altura de la navbar fija */
            }
            #sidebar-wrapper.toggled {
                margin-left: 0; /* Muestra el sidebar al hacer toggle */
            }
            .metro-tile {
                height: 120px; /* Ajusta la altura de los mosaicos en móviles */
                padding: 15px;
            }
            .metro-tile .icon {
                font-size: 2.5rem;
            }
            .metro-tile .title {
                font-size: 1rem;
            }
            .metro-tile .count {
                top: 5px;
                right: 10px;
                padding: 3px 8px;
                font-size: 0.8rem;
            }
            .navbar-collapse.show {
                background-color: #343a40; /* Fondo para el menú colapsado */
            }
            .navbar-nav .nav-link {
                color: rgba(255, 255, 255, 0.75) !important; /* Color de texto en menú colapsado */
            }
            .navbar-nav .nav-item.dropdown .dropdown-menu {
                background-color: #495057; /* Fondo para el dropdown en menú colapsado */
            }
            .navbar-nav .nav-item.dropdown .dropdown-item {
                color: rgba(255, 255, 255, 0.75) !important;
            }
        }

        /* Estilo adicional para el chevron del menú de usuarios */
        .sidebar-item-with-chevron {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer; /* Indicar que es clickable */
        }
        .sidebar-item-with-chevron .fas.fa-chevron-down,
        .sidebar-item-with-chevron .fas.fa-chevron-up {
            transition: transform 0.3s ease;
        }
        .sidebar-item-with-chevron[aria-expanded="true"] .fas.fa-chevron-down {
            transform: rotate(180deg); /* Gira la flecha cuando está expandido */
        }
        .sidebar-item-with-chevron[aria-expanded="false"] .fas.fa-chevron-down {
            transform: rotate(0deg); /* Mantiene la flecha hacia abajo cuando está contraído */
        }
        .sidebar-submenu .list-group-item {
            padding-left: 2.5rem; /* Ajusta la indentación para subelementos */
            background-color: #495057 !important; /* Un poco más claro para diferenciar */
        }
        .sidebar-submenu .list-group-item:hover {
            background-color: #6c757d !important; /* Color al pasar el ratón */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="btn btn-outline-light mr-3" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#">Mi Aplicación</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs"></i> Menú
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-file-alt"></i> Prueba Uno</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-chart-line"></i> Prueba Dos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i> Prueba Tres</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn btn-warning" ><i class="fas fa-shield-alt"></i> Permisos</button>
                </li>
                &nbsp;&nbsp;
                <li class="nav-item">
                    <button class="btn btn-danger" onclick="alert('¡Has salido!');"><i class="fas fa-sign-out-alt"></i> Salir</button>
                </li>
            </ul>
        </div>
    </nav>

    <div id="wrapper" class="toggled">
        <div id="sidebar-wrapper" style="margin-top: 50px">
            <div class="sidebar-heading p-4 text-center">
                <img src="https://via.placeholder.com/100" class="rounded-circle img-fluid mb-2" alt="Perfil">
                <h5 class="text-white">Nombre de Usuario</h5>
                <small class="text-muted">Administrador</small>
            </div>
            <div class="list-group list-group-flush flex-grow-1">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-tachometer-alt"></i> Dashboard</a>

                <div class="list-group-item list-group-item-action bg-dark text-white sidebar-item-with-chevron"
                    data-toggle="collapse" href="#collapseUsers" role="button" aria-expanded="false" aria-controls="collapseUsers">
                    <span><i class="fas fa-users"></i> Usuarios</span>
                    <i class="fas fa-chevron-down ml-auto"></i> </div>
                <div class="collapse sidebar-submenu" id="collapseUsers">
                    <a href="#" class="list-group-item list-group-item-action text-white"><i class="fas fa-user-plus"></i> Crear Nuevo</a>
                    <a href="#" class="list-group-item list-group-item-action text-white"><i class="fas fa-user-edit"></i> Editar Usuario</a>
                    <a href="#" class="list-group-item list-group-item-action text-white"><i class="fas fa-user-times"></i> Eliminar Usuario</a>
                    <a href="#" class="list-group-item list-group-item-action text-white"><i class="fas fa-list"></i> Ver Todos</a>
                </div>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-cog"></i> Configuración</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-info-circle"></i> Acerca de</a>
            </div>
        </div>

        <div id="page-content-wrapper" style='margin-top: 50px'>
            <div class="container-fluid" style='background-color:cyan'>
                <h1 class="mt-4">Bienvenido al Panel de Control</h1>
                <p>Este es el área donde podrás visualizar y gestionar tus elementos. El contenido se adaptará a la pantalla y podrás desplazarte horizontalmente si es necesario.</p>

                <div class="row mt-4">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-primary">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span class="title">Usuarios</span>
                            <span class="count">43</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-success">
                            <span class="icon"><i class="fas fa-chart-bar"></i></span>
                            <span class="title">Reportes</span>
                            <span class="count">12</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-info">
                            <span class="icon"><i class="fas fa-envelope"></i></span>
                            <span class="title">Mensajes</span>
                            <span class="count">5</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-warning">
                            <span class="icon"><i class="fas fa-tasks"></i></span>
                            <span class="title">Tareas</span>
                            <span class="count">8</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-danger">
                            <span class="icon"><i class="fas fa-exclamation-triangle"></i></span>
                            <span class="title">Alertas</span>
                            <span class="count">2</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-secondary">
                            <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                            <span class="title">Eventos</span>
                            <span class="count">18</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-primary">
                            <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
                            <span class="title">Facturas</span>
                            <span class="count">7</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="metro-tile bg-success">
                            <span class="icon"><i class="fas fa-box-open"></i></span>
                            <span class="title">Productos</span>
                            <span class="count">230</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-dark text-white mt-auto text-center">
        <span id="load-time"></span> | &copy; <?php echo date("Y"); ?> Mi Aplicación. Todos los derechos reservados.
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        // Lógica para el toggle del sidebar
        $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        // Lógica para calcular y mostrar el tiempo de carga
        document.addEventListener('DOMContentLoaded', function() {
            var loadTimeElement = document.getElementById('load-time');
            <?php
            $end_time = microtime(true);
            $load_time = round(($end_time - $start_time), 3); // Redondea a 3 decimales para centésimas
            ?>
            if (loadTimeElement) { // Agregado para evitar errores si el elemento no existe
                loadTimeElement.textContent = "Tiempo de carga: <?php echo $load_time; ?>s";
            }
        });

        // Asegura que el sidebar esté visible por defecto en pantallas grandes
        function checkSidebarVisibility() {
            if (window.innerWidth >= 768) {
                $('#wrapper').removeClass('toggled');
            } else {
                $('#wrapper').addClass('toggled'); // Ocultar en móvil por defecto
            }
        }

        // Ejecutar al cargar y al redimensionar la ventana
        $(window).on('load resize', function() {
            checkSidebarVisibility();
        });
    </script>

</body>
</html>
