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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Bootstrap 4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            padding-top: 56px; /* Altura de la navbar */
            padding-bottom: 56px; /* Altura del footer */
        }
        .sidebar {
            position: fixed;
            top: 56px;
            bottom: 56px;
            left: 0;
            width: 300px;
            background-color: #f8f9fa;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        .content {
            margin-left: 300px;
            padding: 20px;
            transition: margin-left 0.3s ease;
            overflow-x: auto; /* Scroll horizontal si es necesario */
        }
        .content.expanded {
            margin-left: 0;
        }
        .metro-tile {
            position: relative;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .metro-tile .number {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            font-weight: bold;
        }
        .metro-tile i {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 56px;
            background-color: #f8f9fa;
            text-align: center;
            line-height: 56px;
        }

        /* --- Estilos para el menú "sándwich" de Configuración --- */
        .sidebar-item-with-chevron {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            /* Asegura que el color de texto sea oscuro en el sidebar light */
            color: #212529; /* Dark text for light sidebar */
        }
        .sidebar-item-with-chevron:hover {
            color: #0056b3; /* Color al pasar el ratón */
            text-decoration: none; /* Quita el subrayado si aplica */
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
            padding-left: 2.5rem; /* Indentación para subelementos */
            background-color: #e9ecef; /* Un color ligeramente diferente para diferenciar */
            color: #212529; /* Color de texto oscuro para submenú */
        }
        .sidebar-submenu .list-group-item:hover {
            background-color: #dee2e6; /* Color al pasar el ratón */
        }
        /* --- Fin de estilos de menú "sándwich" --- */
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Mi Aplicación</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-list"></i> Prueba
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

<div class="sidebar" id="sidebar">
    <div class="text-center p-3">
        <img src="https://via.placeholder.com/100" class="rounded-circle" alt="Perfil">
        <h5 class="mt-2">Juan Pérez</h5>
    </div>
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action">Perfil</a>

        <div class="list-group-item list-group-item-action sidebar-item-with-chevron"
            data-toggle="collapse" href="#collapseConfiguracion" role="button" aria-expanded="false" aria-controls="collapseConfiguracion">
            <span><i class="fas fa-cog"></i> Configuración</span>
            <i class="fas fa-chevron-down ml-auto"></i> </div>
        <div class="collapse sidebar-submenu" id="collapseConfiguracion">
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-cogs"></i> General</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-lock"></i> Seguridad</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-bell"></i> Notificaciones</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-palette"></i> Apariencia</a>
        </div>
        <a href="#" class="list-group-item list-group-item-action">Cerrar Sesión</a>
    </div>
</div>

<button class="btn btn-primary btn-sm position-fixed" style="top: 70px; left: 280px; z-index: 1000;" onclick="toggleSidebar()">
    <i class="fas fa-arrow-left" id="sidebarToggleIcon"></i>
</button>

<div class="content" id="content">
    <div class="container-fluid overflow-x: scroll;">
        <div class="row">
            <div class="col-12">
                <h1>Bienvenido</h1>
                <p>Este es el contenido principal de la aplicación.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-primary">
                    <i class="fas fa-users"></i>
                    <div>Usuarios</div>
                    <div class="number">43</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-success">
                    <i class="fas fa-chart-bar"></i>
                    <div>Estadísticas</div>
                    <div class="number">12</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-warning">
                    <i class="fas fa-cog"></i>
                    <div>Configuración</div>
                    <div class="number">5</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-danger">
                    <i class="fas fa-envelope"></i>
                    <div>Mensajes</div>
                    <div class="number">99</div>
                </div>
            </div>
            
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-primary">
                    <i class="fas fa-users"></i>
                    <div>Usuarios 2</div>
                    <div class="number">43</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-success">
                    <i class="fas fa-chart-bar"></i>
                    <div>Estadísticas 2</div>
                    <div class="number">12</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-warning">
                    <i class="fas fa-cog"></i>
                    <div>Configuración 2</div>
                    <div class="number">5</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="metro-tile bg-danger">
                    <i class="fas fa-envelope"></i>
                    <div>Mensajes 2</div>
                    <div class="number">99</div>
                </div>
            </div>
            
            Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.
            
<?php //----------------------------------------------------------------------------- ?>            
            <div class="container mt-5">
    <h2 class="mb-4">Tabla de Prueba para Scrolling</h2>

    <div class="table-responsive-custom">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Edad</th>
            <th scope="col">Ciudad</th>
            <th scope="col">País</th>
            <th scope="col">Ocupación</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Fecha de Registro</th>
          </tr>
        </thead>
        <tbody>
          <script>
            const cities = ['Ciudad de México', 'Guadalajara', 'Monterrey', 'Puebla', 'Tijuana', 'León', 'Cancún', 'Querétaro', 'Mérida', 'San Luis Potosí'];
            const countries = ['México', 'España', 'Argentina', 'Colombia', 'Chile', 'Perú', 'Estados Unidos', 'Canadá'];
            const occupations = ['Ingeniero', 'Doctor', 'Profesor', 'Diseñador', 'Programador', 'Abogado', 'Contador', 'Arquitecto', 'Periodista', 'Chef'];

            function getRandomItem(arr) {
              return arr[Math.floor(Math.random() * arr.length)];
            }

            function getRandomDate() {
              const start = new Date(2020, 0, 1);
              const end = new Date();
              const date = new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
              return date.toISOString().split('T')[0];
            }

            for (let i = 1; i <= 3; i++) { // Bucle para generar 3 renglones
              document.write(`
                <tr>
                  <th scope="row">${i}</th>
                  <td>${getRandomItem(['Juan', 'María', 'Pedro', 'Ana', 'Luis', 'Sofía', 'Carlos', 'Elena'])}</td>
                  <td>${getRandomItem(['García', 'Rodríguez', 'López', 'Martínez', 'Pérez', 'González', 'Sánchez', 'Ramírez'])}</td>
                  <td>${Math.floor(Math.random() * 60) + 18}</td>
                  <td>${getRandomItem(cities)}</td>
                  <td>${getRandomItem(countries)}</td>
                  <td>${getRandomItem(occupations)}</td>
                  <td>user${i}@example.com</td>
                  <td>+52 ${Math.floor(Math.random() * 9000000000) + 1000000000}</td>
                  <td>${getRandomDate()}</td>
                </tr>
              `);
            }

            // Generar muchas más filas para asegurar el scrolling hasta los 1600px de altura
            for (let i = 4; i <= 100; i++) { // Puedes ajustar este número según sea necesario para alcanzar los 1600px
                document.write(`
                  <tr>
                    <th scope="row">${i}</th>
                    <td>${getRandomItem(['Juan', 'María', 'Pedro', 'Ana', 'Luis', 'Sofía', 'Carlos', 'Elena'])}</td>
                    <td>${getRandomItem(['García', 'Rodríguez', 'López', 'Martínez', 'Pérez', 'González', 'Sánchez', 'Ramírez'])}</td>
                    <td>${Math.floor(Math.random() * 60) + 18}</td>
                    <td>${getRandomItem(cities)}</td>
                    <td>${getRandomItem(countries)}</td>
                    <td>${getRandomItem(occupations)}</td>
                    <td>user${i}@example.com</td>
                    <td>user${i}@example.com</td>
                    <td>+52 ${Math.floor(Math.random() * 9000000000) + 1000000000}</td>
                    <td>${getRandomDate()}</td>
                  </tr>
                `);
            }
          </script>
        </tbody>
      </table>
    </div>
  </div>
  </div>            
<?php //----------------------------------------------------------------------------- ?>
            
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        &copy; 2023 Mi Aplicación. Todos los derechos reservados.
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleIcon = document.getElementById('sidebarToggleIcon');
        
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
        
        if (sidebar.classList.contains('collapsed')) {
            toggleIcon.classList.remove('fa-arrow-left');
            toggleIcon.classList.add('fa-arrow-right');
        } else {
            toggleIcon.classList.remove('fa-arrow-right');
            toggleIcon.classList.add('fa-arrow-left');
        }
    }
</script>
</body>
</html>
