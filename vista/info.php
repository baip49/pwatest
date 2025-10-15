<?php
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#0d6efd">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    <!-- Manifest -->
    <link rel="manifest" href="../manifest.json">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Información de Usuarios</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-title mb-0">
                            <i class="fas fa-users me-2"></i> Información de Usuarios Registrados
                        </h2>
                    </div>
                    <div class="card-body">
                        <?php
                        // Incluir la clase de conexión
                        require_once '../modelo/conexion.php';

                        try {
                            // Crear instancia de la Base de Datos
                            $pdo = Database::connect();

                            // Consulta para obtener todos los usuarios
                            $stmt = $pdo->prepare("SELECT id, correo, pass, nombre, apaterno, amaterno, fecha_registro, activo FROM usuarios ORDER BY fecha_registro DESC");
                            $stmt->execute();
                            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($usuarios && count($usuarios) > 0) {
                                echo "<div class='alert alert-success' role='alert'>";
                                echo "<i class='fas fa-check-circle me-2'></i><strong>Registros encontrados:</strong> " . count($usuarios) . " usuarios";
                                echo "</div>";

                                echo "<div class='table-responsive'>";
                                echo "<table class='table table-striped table-hover table-bordered'>";
                                echo "<thead class='table-dark'>";
                                echo "<tr>";
                                echo "<th scope='col'><i class='fas fa-hashtag me-1'></i>ID</th>";
                                echo "<th scope='col'><i class='fas fa-envelope me-1'></i>Correo</th>";
                                echo "<th scope='col'><i class='fas fa-user me-1'></i>Nombre Completo</th>";
                                echo "<th scope='col'><i class='fas fa-key me-1'></i>Password (Hash)</th>";
                                echo "<th scope='col'><i class='fas fa-calendar me-1'></i>Fecha Registro</th>";
                                echo "<th scope='col'><i class='fas fa-toggle-on me-1'></i>Estado</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                foreach ($usuarios as $usuario) {
                                    $nombreCompleto = htmlspecialchars($usuario['nombre']) . ' ' .
                                        htmlspecialchars($usuario['apaterno']) . ' ' .
                                        htmlspecialchars($usuario['amaterno']);

                                    $estado = $usuario['activo'] ?
                                        "<span class='badge bg-success'><i class='fas fa-check me-1'></i>Activo</span>" :
                                        "<span class='badge bg-danger'><i class='fas fa-times me-1'></i>Inactivo</span>";

                                    $fechaFormateada = date('d/m/Y H:i', strtotime($usuario['fecha_registro']));

                                    echo "<tr>";
                                    echo "<td><strong class='text-primary'>" . htmlspecialchars($usuario['id']) . "</strong></td>";
                                    echo "<td><i class='fas fa-at text-muted me-1'></i>" . htmlspecialchars($usuario['correo']) . "</td>";
                                    echo "<td><i class='fas fa-user-circle text-info me-1'></i>" . $nombreCompleto . "</td>";
                                    echo "<td><code class='text-muted' style='font-size: 10px;'>"
                                        . htmlspecialchars(substr($usuario['pass'], 0, 25)) . "...</code></td>";
                                    echo "<td><i class='fas fa-clock text-secondary me-1'></i>" . $fechaFormateada . "</td>";
                                    echo "<td>" . $estado . "</td>";
                                    echo "</tr>";
                                }

                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";

                                // Estadísticas adicionales
                                $activos = array_filter($usuarios, function ($u) {
                                    return $u['activo'] == 1;
                                });
                                
                                echo "<hr class='my-4'>";
                                echo "<h4 class='mb-3'><i class='fas fa-chart-bar me-2'></i>Estadísticas</h4>";
                                echo "<div class='row'>";
                                
                                echo "<div class='col-md-3 mb-3'>";
                                echo "<div class='card bg-info text-white h-100'>";
                                echo "<div class='card-body text-center'>";
                                echo "<i class='fas fa-users fa-2x mb-2'></i>";
                                echo "<h5 class='card-title'>Total Usuarios</h5>";
                                echo "<h2 class='card-text display-6'>" . count($usuarios) . "</h2>";
                                echo "</div></div></div>";

                                echo "<div class='col-md-3 mb-3'>";
                                echo "<div class='card bg-success text-white h-100'>";
                                echo "<div class='card-body text-center'>";
                                echo "<i class='fas fa-user-check fa-2x mb-2'></i>";
                                echo "<h5 class='card-title'>Usuarios Activos</h5>";
                                echo "<h2 class='card-text display-6'>" . count($activos) . "</h2>";
                                echo "</div></div></div>";

                                echo "<div class='col-md-3 mb-3'>";
                                echo "<div class='card bg-warning text-dark h-100'>";
                                echo "<div class='card-body text-center'>";
                                echo "<i class='fas fa-user-times fa-2x mb-2'></i>";
                                echo "<h5 class='card-title'>Usuarios Inactivos</h5>";
                                echo "<h2 class='card-text display-6'>" . (count($usuarios) - count($activos)) . "</h2>";
                                echo "</div></div></div>";

                                echo "<div class='col-md-3 mb-3'>";
                                echo "<div class='card bg-secondary text-white h-100'>";
                                echo "<div class='card-body text-center'>";
                                echo "<i class='fas fa-calendar-plus fa-2x mb-2'></i>";
                                echo "<h5 class='card-title'>Último Registro</h5>";
                                echo "<p class='card-text'>" . date('d/m/Y', strtotime($usuarios[0]['fecha_registro'])) . "</p>";
                                echo "</div></div></div>";
                                echo "</div>";

                            } else {
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo "<i class='fas fa-exclamation-triangle me-2'></i><strong>No hay usuarios registrados</strong> en la base de datos.";
                                echo "</div>";
                            }

                        } catch (PDOException $e) {
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo "<i class='fas fa-exclamation-circle me-2'></i><strong>Error en la base de datos:</strong> " . htmlspecialchars($e->getMessage());
                            echo "</div>";
                        }
                        ?>

                        <!-- Botones de navegación -->
                        <div class="mt-4 d-flex gap-2">
                            <a href="../index.php" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-1"></i> Volver al Login
                            </a>
                            <a href="registro.php" class="btn btn-success">
                                <i class="fas fa-user-plus me-1"></i> Nuevo Usuario
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para mejorar la experiencia -->
    <script>
        // Tooltip para elementos con título
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Verificar si estamos en PWA
        function isPWA() {
            return window.matchMedia('(display-mode: standalone)').matches || 
                   window.navigator.standalone === true;
        }

        if (isPWA()) {
            console.log('Ejecutándose como PWA');
            // Agregar estilos específicos para PWA
            document.body.style.paddingTop = '20px';
        }
    </script>
</body>
</html>