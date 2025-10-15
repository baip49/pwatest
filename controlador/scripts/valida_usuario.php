
<?php
    //1. Incluir la clase de conexión
    require_once '../../modelo/conexion.php';
    
    // 2. Verificar método POST
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

    #Si alguno de los campos está vacío, se detiene el proceso
    if (empty($correo) || empty($pass) || empty($nombre) || empty($apaterno) || empty($amaterno)) {
        die("Todos los campos son obligatorios");
    }

    # Validar formato de correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("El formato del correo electrónico no es válido");
    }

    # Validar longitud de la contraseña
    if (strlen($pass) < 10) { //Unach$2025
        die("La contraseña debe tener al menos 10 caracteres");
    }
        
    
    try {
        // 5. Crear instancia de la Base de Datos
        $database = new Database();
        $pdo = $database->connect();

        // 6. Verificar si el correo existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = :correo");
        $stmt->execute([':correo' => $correo]);
        
        if ($stmt->rowCount() > 0) {
            die("El correo electrónico ya está registrado");
        }

        // 7. Encriptar contraseña
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);

        // 8. Insertar registro
        $sql = "INSERT INTO usuarios (correo, pass, nombre, apaterno, amaterno, fecha_registro) 
                VALUES (:correo, :pass, :nombre, :apaterno, :amaterno, NOW())";

        $stmt = $pdo->prepare($sql);
        $resultado = $stmt->execute([
            ':correo' => $correo,
            ':pass' => $password_hash,
            ':nombre' => $nombre,
            ':apaterno' => $apaterno,
            ':amaterno' => $amaterno
        ]);

        if ($resultado) {
            echo "¡Registro exitoso! ID: " . $pdo->lastInsertId();
            //header('Location: ../../vista/menu_principal.php');
            //exit;
        } else {
            echo "Error al registrar el usuario";
        }

    } catch (PDOException $e) {
        die("Error en la base de datos: " . $e->getMessage());
    }
?>