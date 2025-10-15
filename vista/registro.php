<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../vista/images/icons/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Registro Usuarios</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-md-6 col-lg-4 bg-info text-black text-center p-3">
                <form action="../controlador/scripts/valida_usuario.php" method="POST">
                    <h2>Registro de Usuarios</h2>
                    <div class="form-floating mb-3">
                        <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Correo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Clave</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="apaterno" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Apellido Paterno</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="amaterno" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Apellido Materno</label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-success btn-lg">Registrar</button>
                    </div>
                </form>
            </div>
            <div class="col "></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>