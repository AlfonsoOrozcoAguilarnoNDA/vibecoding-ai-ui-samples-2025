<?php
/**
 * ============================================================================
 * PROYECTO: Ai UI Samples (Edición Coaude login)
 * ============================================================================
 * AUTOR:         Alfonso Orozco Aguilar (vibecodingmexico.com)
 * PERFIL:        DevOps / Programador desde 1991 / Contaduría
 * FECHA:         Algun momento de mayo 2025
 * REQUISITOS:    PHP 7.4 - 8.4+ | MySQL 5.7+ | cPanel Environment
 * LICENCIA:      MIT (Libre uso, mantener crédito del autor)
 * * OBJETIVO:
 * Estaba en medio de un problema de perfil de usuario que ocupaba mucho espacio
 * y le pedí a varias IA que me hicieran un login de ejemplo. El ganador fue CLAUDE y lo
 * incorpore a mi código, Mistral fue el finalista.

 * Protección contra fuerza bruta: Un sleep(1) en el else de contraseña incorrecta
 * para ralentizar scripts automáticos es una mejora posible pero asi funciona
 *
 * NOTA TÉCNICA:
 * Este código es el resultado de experimentos revisa el README.md
 * para las circunstancias. 
 *
 * DOCUMENTACIÓN de modos de pensar
 * https://vibecodingmexico.com
 * ============================================================================
 */
// Borrar caché en headers
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: text/html; charset=UTF-8");
/*
Lo que le pedía Claude fue conisderar por simplicidad
mysqli_real_escape_string. Ojo aquí: Aunque es "seguro", en 2026 lo ideal es usar
Sentencias Preparadas reales (mysqli_prepare). Es mejor enseñar la técnica moderna
para evitar cualquier riesgo de Inyección SQL compleja pero en el momento era lo mas sano

Le hice cambios menores poniendo los colores azul metalico y que en vez de
logo usara un font awesome como opcion Pero es funcional y se ve muy bien. Es buena base
calificaria yo como 9.5 por l oque le pedi.

Características implementadas:

? MySQLi procedural (sin objetos)
? Bootstrap 4.x con estilo Metro-friendly para móviles
? Validación server-side: password debe tener al menos una letra
? Espacio para mensaje administrativo configurable
? Área para logotipo (placeholder que puedes cambiar)
? POST con ?module=validate
? Redirect a index.php en login exitoso
? Mensajes de error específicos
? Compatible PHP 7.x y 8.x

Lo que debes ajustar:

Configuración BD: Cambiar las variables $db_host, $db_user, etc.
Logo: Reemplazar el div .logo-placeholder con tu imagen
Mensaje admin: Modificar la variable $admin_message

Nota importante: El código asume que las contraseñas están hasheadas con password_hash(). Si están en texto plano, cambia la línea 41 por:
phpif ($password === $user_data['camponuevo']) {
*/
// Configuración de base de datos
$db_host = 'localhost';
$db_user = 'tu_usuario';
$db_pass = 'tu_password';
$db_name = 'tu_base_datos';

$error_message = '';
$admin_message = 'Se les recuerda que el plazo expira el 7 de julio 2025
Se les recuerda que el plazo expira el 7 de julio 2025
Se les recuerda que el plazo expira el 7 de julio 2025
';

// Procesamiento del login
if (isset($_GET['module']) && $_GET['module'] == 'validate' && $_POST) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Validación del password - debe tener al menos una letra
    if (!preg_match('/[a-zA-Z]/', $password)) {
        $error_message = 'La contraseña debe contener al menos una letra';
    } elseif (empty($username) || empty($password)) {
        $error_message = 'Usuario y contraseña son requeridos';
    } else {
        // Conexión a base de datos
        $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        
        if (!$conexion) {
            $error_message = 'Error de conexión a la base de datos';
        } else {
            // Consulta segura con prepared statement simulado manualmente
            $username_escaped = mysqli_real_escape_string($conexion, $username);
            $query = "SELECT user_name, camponuevo FROM cat_users WHERE user_name = '$username_escaped'";
            $result = mysqli_query($conexion, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                
                // Verificar contraseña (asumiendo que está hasheada con password_hash)
                if (password_verify($password, $user_data['camponuevo'])) {
                    // Login exitoso - redirigir
                    mysqli_close($conexion);
                    header('Location: index.php');
                    exit();
                } else {
                    $error_message = 'Usuario o contraseña incorrectos';
                }
            } else {
                $error_message = 'Usuario o contraseña incorrectos';
            }
            mysqli_close($conexion);
        }
    }
}

/* colores pantalla trasera
estandard : background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
Azul corporativo: #2c3e50 a #3498db
Verde: #27ae60 a #2ecc71
Gris: #34495e a #95a5a6
Rojo: #e74c3c a #c0392b
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #34495e 0%, #95a5a6 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        
        .logo-section {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        
        .logo-placeholder {
            width: 80px;
            height: 80px;
            background: #007bff;
            border-radius: 10px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        
        .admin-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            margin: 0;
            font-size: 14px;
            text-align: center;
            border-bottom: 1px solid #c3e6cb;
        }
        
        .login-form {
            padding: 40px;
        }
        
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .btn-login {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        
        /* Estilo Metro para mobile */
        @media (max-width: 768px) {
            .login-card {
                border-radius: 0;
                min-height: 100vh;
            }
            
            .form-control {
                padding: 20px 15px;
                font-size: 18px;
            }
            
            .btn-login {
                padding: 20px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Sección del logo -->
            <div class="logo-section">
                <div class="logo-placeholder">
                    LOGO
                </div>
                <h4 class="mb-0">Sistema de Acceso</h4>
            </div>
            
            <!-- Mensaje administrativo -->
            <?php if (!empty($admin_message)): ?>
            <div class="admin-message">
                <?php echo htmlspecialchars($admin_message); ?>
            </div>
            <?php endif; ?>
            
            <!-- Formulario de login -->
            <div class="login-form">
                <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
                <?php endif; ?>
                
                <form method="POST" action="?module=validate">
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" 
                               class="form-control" 
                               id="username" 
                               name="username" 
                               required 
                               autocomplete="username"
                               value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Contrase&ntilde;a</label>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               required 
                               autocomplete="current-password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-login">
                        Iniciar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
