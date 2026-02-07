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
 * Borrador de nueva pantalla de asignador de horarios en division 
 *
 * Uno de los usuarios de otro sistema propio tuvo problemas con un samsung
 * cuando puso otro tipo de fuente. Creo que este mockup se hizo con mistral.
 *
 * Funciona perfectamente, se puede mejorar , resolvió el problema pero
 * se quedó en el limbo por los cambios laborales mencionados en README.md
 * No hizo falta probar con otro LLM. Solo cambié textos para que viera el 
 * usuario.
 *  
 * PHP 8.x - Sistema de Menús con Bootstrap 4 y Font Awesome 6
 * Debe ser compatible con versiones anteriores de php
 *
 * NOTA TÉCNICA:
 * Este código es el resultado de experimentos revisa el README.md
 * para las circunstancias.
 *
 * DOCUMENTACIÓN de modos de pensar
 * https://vibecodingmexico.com
 * ============================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Menú Principal</title>
    
    <!-- Bootstrap 4 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        .dropdown-item {
            padding: 0.5rem 1rem;
        }
        .dropdown-item i {
            width: 20px;
            margin-right: 8px;
        }
        .dropdown-divider {
            margin: 0.2rem 0;
        }
        .navbar-nav .dropdown-menu {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <!-- Navbar Principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-building-user"></i> Mockup
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    
                    <!-- * Desarrollador -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="desarrolladorDropdown" role="button" data-toggle="dropdown">
                            <i class="fas fa-code"></i> Desarrollador
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fas fa-stethoscope"></i> Diagnóstico</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-sync-alt"></i> Reindexar</a>
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header"><i class="fas fa-globe"></i> Organizar</h6>                            
                            <div class="dropdown-divider"></div>
                            
                            <a class="dropdown-item" href="#"><i class="fas fa-users"></i> Ver Ciudadanos</a>
<!-- o -->
<a class="dropdown-item" href="#"><i class="fas fa-list-ul"></i> Ver Ciudadanos</a>
                        </div>
                    </li>
                    
                    <!-- * Usuarios -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button" data-toggle="dropdown">
                            <i class="fas fa-users"></i> Usuarios
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fas fa-user-plus"></i> Agregar</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-user-times"></i> Suspender / activar</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-key"></i> Derechos Usuarios</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-unlock-alt"></i> Cambiar Password Ajeno</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-copy"></i> Copiar Permisos</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> Ver Usuarios</a>
                        </div>
                    </li>                    
                                        
                    <!-- * Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>                    
                    
                </ul>
                
                <!-- Menú de usuario (lado derecho) -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Usuario
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Perfil</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Salir</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Contenido Principal -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron py-4">
                    <h3>
                        <i class="fas fa-building-user"></i> Sistema de Recursos Humanos
                    </h3>
                    <h6>Gestión Organizacional y Horarios</h6>
                    
                </div>
                <div>    
                    <!-- Tarjetas de acceso rápido -->
                    <div class="row mt-4">                        
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-sitemap fa-3x text-primary mb-3"></i>
                                    <h5 class="card-title">Organigrama</h5>
                                    <p class="card-text">Visualización y gestión de la estructura organizacional de la empresa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-balance-scale fa-3x text-secondary mb-3"></i>
                                    <h5 class="card-title">Evaluar</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit vel magna, sodales ligula sagittis</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-puzzle-piece fa-3x text-danger mb-3"></i>
                                    <h5 class="card-title">Cuadrar Horarios</h5>
                                    <p class="card-text">Verificar cobertura de los tres turnos en la división</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-file-alt fa-3x text-warning mb-3"></i>
                                    <h5 class="card-title">Sumario</h5>
                                    <p class="card-text">Resumen ejecutivo y reportes consolidados de la gesti&oacute;n organizacional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                                                
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-project-diagram fa-3x text-warning mb-3"></i>
                                    <h5 class="card-title">Relación Lorem Ipsum</h5>
                                    <p class="card-text">Gestión de Lorem Ipsum</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-users-cog fa-3x text-dark mb-3"></i>
                                    <h5 class="card-title">Rh</h5>
                                    <p class="card-text">Visualiza las capacidades de la división</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-exclamation-triangle fa-3x text-success mb-3"></i>
                                    <h5 class="card-title">Incidencias</h5>
                                    <p class="card-text">Registro y seguimiento de incidencias</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-history fa-3x text-info mb-3"></i>
                                    <h5 class="card-title">Last Actions</h5>
                                    <p class="card-text">Bitácora completa de las acciones realizadas por los usuarios del sistema.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="fixed-bottom bg-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">
                        <i class="fas fa-copyright"></i> 2025 Sistema de Gestión RH - 
                        Desarrollado con PHP 8.x, Bootstrap 4 y Font Awesome 6
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js"></script>
    
    <script>
        // Funcionalidad adicional para mejorar la UX
        $(document).ready(function() {
            // Cerrar dropdown al hacer click fuera
            $(document).click(function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('.dropdown-menu').removeClass('show');
                }
            });
            
            // Efecto hover en cards
            $('.card').hover(
                function() {
                    $(this).addClass('shadow-lg').css('cursor', 'pointer');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );
            
            // Confirmación para salir
            $('a[href="#"]:contains("Salir")').click(function(e) {
                e.preventDefault();
                if (confirm('¿Estás seguro de que deseas salir del sistema?')) {
                    // Aquí iría la lógica de logout
                    alert('Cerrando sesión...');
                }
            });
        });
    </script>
</body>
</html>
