<?php
function validarPassword($password)
{
	// Reglas:
	// - Máximo 10 caracteres
	// - Primera letra mayúscula
	// - Al menos un signo de pesos ($)
	// - Números solo al final (si existen)
	// - Solo letras, $, y números

	// Verificar longitud máxima
	if (strlen($password) > 10) {
		return "La contraseña no puede tener más de 10 caracteres";
	}

	// Verificar que no esté vacía
	if (empty($password)) {
		return "La contraseña no puede estar vacía";
	}

	// Verificar que la primera letra sea mayúscula
	if (!ctype_upper($password[0])) {
		return "La primera letra debe ser mayúscula";
	}

	// Verificar que contenga al menos un signo de pesos
	if (strpos($password, '$') === false) {
		return "La contraseña debe contener al menos un signo de pesos ($)";
	}

	// Verificar que los números estén al final (si existen)
	$tieneNumeros = preg_match('/\d/', $password);
	if ($tieneNumeros) {
		// Encontrar la posición del primer número
		$primerNumeroPos = -1;
		for ($i = 0; $i < strlen($password); $i++) {
			if (is_numeric($password[$i])) {
				$primerNumeroPos = $i;
				break;
			}
		}

		// Verificar que después del primer número solo haya números
		for ($i = $primerNumeroPos; $i < strlen($password); $i++) {
			if (!is_numeric($password[$i])) {
				return "Los números deben estar todos al final de la contraseña";
			}
		}
	}

	// Verificar caracteres permitidos: letras, $, números
	if (!preg_match('/^[A-Za-z\$0-9]+$/', $password)) {
		return "Solo se permiten letras, signo de pesos ($) y números";
	}

	// Si pasa todas las validaciones
	return true;
}
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#0d6efd">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Proyecto7M">
    <meta name="msapplication-TileColor" content="#0d6efd">
    <meta name="msapplication-tap-highlight" content="no">
    
    <!-- Manifest -->
    <link rel="manifest" href="./manifest.json">
    
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" href="./vista/images/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="192x192" href="./vista/images/icons/icon-192x192.png">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./vista/images/icons/favicon.ico"/>
    
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./controlador/css/util.css">
	<link rel="stylesheet" type="text/css" href="./controlador/css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
	<?php
	//Validar email
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$email = trim($_POST['email']);

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "✅ Email válido: " . htmlspecialchars($email);
		} else {
			echo "❌ Email inválido";
		}
	}
	?>
	<?php
	// Validar password
	$password = '';
	$mensaje = '';
	$claseMensaje = '';
	//$resultado = false;

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$password = trim($_POST['pass'] ?? '');
		//echo $password;

		$resultado = validarPassword($password);
		//$resultado = 1;
		echo $resultado;

		if ($resultado === true) {
			$mensaje = "✅ ¡Contraseña válida!";
			$claseMensaje = 'success';
			echo $mensaje;
			// Aquí puedes procesar el formulario (guardar en BD, etc.)
		} else {
			$mensaje = $resultado;
			$claseMensaje = ' ❌ error';
			echo $claseMensaje;
		}
	}
	?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>


					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<a href="./vista/registro.php" class="txt1">
							Registro
						</a>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('./vista/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="./controlador/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="./controlador/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="./controlador/vendor/bootstrap/js/popper.js"></script>
	<script src="./controlador/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="./controlador/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="./controlador/vendor/daterangepicker/moment.min.js"></script>
	<script src="./controlador/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="./controlador/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="./controlador/js/main.js"></script>

    <!-- PWA Registration -->
    <script>
        // Registrar Service Worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('./sw.js')
                    .then(function(registration) {
                        console.log('SW: Service Worker registrado con éxito:', registration.scope);
                    })
                    .catch(function(error) {
                        console.log('SW: Error al registrar Service Worker:', error);
                    });
            });
        }

        // Prompt para instalar PWA
        let deferredPrompt;
        
        window.addEventListener('beforeinstallprompt', (e) => {
            console.log('PWA: Evento beforeinstallprompt disparado');
            e.preventDefault();
            deferredPrompt = e;
            showInstallButton();
        });

        // AGREGAR: Botón de instalación fijo (temporal para testing)
        window.addEventListener('load', function() {
            setTimeout(() => {
                if (!document.querySelector('.install-btn-temp')) {
                    showInstallButtonFixed();
                }
            }, 2000);
        });

        function showInstallButtonFixed() {
            const installButton = document.createElement('button');
            installButton.innerHTML = '📱 Instalar PWA';
            installButton.className = 'install-btn-temp';
            installButton.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: linear-gradient(45deg, #0d6efd, #6610f2);
                color: white;
                border: none;
                padding: 15px 20px;
                border-radius: 30px;
                cursor: pointer;
                box-shadow: 0 6px 20px rgba(0,0,0,0.3);
                z-index: 10000;
                font-size: 14px;
                font-weight: bold;
                animation: pulse 2s infinite;
            `;
            
            // Agregar animación CSS
            const style = document.createElement('style');
            style.textContent = `
                @keyframes pulse {
                    0% { transform: scale(1); }
                    50% { transform: scale(1.05); }
                    100% { transform: scale(1); }
                }
            `;
            document.head.appendChild(style);
            
            installButton.addEventListener('click', function() {
                if (deferredPrompt) {
                    installPWA();
                } else {
                    // Método manual si no hay prompt
                    showManualInstallInstructions();
                }
            });
            
            document.body.appendChild(installButton);
        }

        function showInstallButton() {
            const installButton = document.createElement('button');
            installButton.innerHTML = '📱 Instalar App';
            installButton.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: #0d6efd;
                color: white;
                border: none;
                padding: 12px 16px;
                border-radius: 25px;
                cursor: pointer;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
                z-index: 1000;
                font-size: 14px;
            `;
            
            installButton.addEventListener('click', installPWA);
            document.body.appendChild(installButton);
        }

        async function installPWA() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const { outcome } = await deferredPrompt.userChoice;
                console.log('PWA: Usuario', outcome === 'accepted' ? 'aceptó' : 'rechazó', 'la instalación');
                deferredPrompt = null;
                
                const installBtn = document.querySelector('.install-btn-temp');
                if (installBtn) installBtn.remove();
            }
        }

        function showManualInstallInstructions() {
            const modal = document.createElement('div');
            modal.innerHTML = `
                <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 20000; display: flex; align-items: center; justify-content: center;">
                    <div style="background: white; padding: 30px; border-radius: 15px; max-width: 500px; text-align: center;">
                        <h3 style="color: #333; margin-bottom: 20px;">📱 Instalar PWA</h3>
                        <p style="color: #666; margin-bottom: 20px;">Para instalar esta aplicación:</p>
                        <ol style="text-align: left; color: #666; margin-bottom: 20px;">
                            <li>Haz clic en los <strong>3 puntos (⋮)</strong> del menú de Chrome</li>
                            <li>Selecciona <strong>"Más herramientas"</strong></li>
                            <li>Haz clic en <strong>"Crear acceso directo..."</strong></li>
                            <li>Marca la casilla <strong>"Abrir como ventana"</strong></li>
                            <li>Dale un nombre y haz clic en <strong>"Crear"</strong></li>
                        </ol>
                        <button onclick="this.parentElement.parentElement.remove()" style="background: #0d6efd; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Entendido</button>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
        }

        window.addEventListener('appinstalled', (evt) => {
            console.log('PWA: App instalada correctamente');
            const installBtn = document.querySelector('.install-btn-temp');
            if (installBtn) installBtn.remove();
        });
    </script>
</body>

</html>