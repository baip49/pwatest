<?php
    //1. Incluir la clase de conexión
    require_once '../../modelo/conexion.php';
    
    
    //// 2. Verificar método POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        die("Método no permitido");
    }

    // 3. Sanitizar y validar datos
    $correo = htmlspecialchars($_POST['correo'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $pass = $_POST['pass'] ?? ''; // No sanitizar para hash
    $nombre = htmlspecialchars($_POST['nombre'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $apaterno = htmlspecialchars($_POST['apaterno'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $amaterno = htmlspecialchars($_POST['amaterno'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // 4. Validaciones
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
    $usuarios = [];
    
    if (strlen($pass) < 10) { //Unach$2025
        die("La contraseña debe tener al menos 10 caracteres");
    }

    try {
        // 5. Crear instancia de la Base de Datos
        $pdo = Database::connect('8889'); 

        
        // 6. PRUEBA: Consulta con nombres de columnas exactos
        echo "<h3>Prueba: Consulta con nombres exactos</h3>";
        $stmt = $pdo->prepare("SELECT correo, pass FROM usuarios");
        if ($stmt->execute()) {
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<p>✅ Consulta con nombres exactos: " . count($usuarios) . " registros</p>";
        }
        
        
        // 7. Verificar si el correo y la contraseña existen
        $stmt = $pdo->prepare("SELECT correo, pass FROM usuarios WHERE correo = :correo");
        $stmt->execute([':correo' => $correo]);
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 8. Verificar si hay resultados
        if ($usuarios && count($usuarios) > 0) {
            echo "<h2>Correos y Passwords (Hashes)</h2>";
            echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
            echo "<tr style='background-color: #f2f2f2;'>
                    <th>Correo</th>
                    <th>Password (Hash)</th>
                </tr>";
            
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($usuario['correo']) . "</td>";
                echo "<td style='word-break: break-all; font-family: monospace; font-size: 10px;'>" 
                    . htmlspecialchars($usuario['pass']) . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p>No hay usuarios registrados en la base de datos.</p>";
        }
        
        // 9. Verificar si el password coincide con la base de datos
        if ($usuario && password_verify($pass, $usuario['pass'])) {
            // Contraseña correcta
            echo "<br>Login exitoso";
            // header('Location: ../../vista/menu_principal.php');
            //exit;
        } else {
            // Contraseña incorrecta
            echo "<br>Credenciales inválidas";
            // header('Location: ../../index.php');
            //exit;
        }
        
    } catch (PDOException $e) {
        die("Error en la base de datos: " . $e->getMessage());
    }
?>
