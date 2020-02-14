<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Balance</title>
</head>
<?php session_start(); ?>

<body>
    <?php
    if (isset($_SESSION['nombre']) === false) { ?>

        <div class="container">
            <p>
                <h4>Bienvenido invitado</h4>
            </p>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="login.php">
                        <h2>Inicie sesion</h2>
                        <div class="form-group">
                            <label for="user">Nombre de Usuario</label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                    </form>
                    <form method="POST" action="registro.php">
                        <h2>Registrarse</h2>
                        <div class="form-group">
                            <label for="user">Nombre de Usuario</label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>

        <?php

    } else { ?>

            <div id="texto">
                <p>
                    <h4>Bienvenido <?= $_SESSION['nombre'] ?> <h4>
                </p>

                <button onclick="  location.href='informes.php'" class="btn btn-lg btn-primary" id="informe">Generar informe</button>
                <button onclick=" location.href='ingresos.php'" class="btn btn-lg btn-primary" id="alquilar">Registrar Ingresos</button>
                <button onclick=" location.href='gastos.php'" class="btn btn-lg btn-primary" id="alquilar">Registrar Gastos</button>
            </div>


            <div id="texto"> <button onclick=" location.href='log_out.php'" class="btn btn-lg btn-warning" id="salir">Cerrar sesión actual</button></div> <?php
                                                                                                                                                        } ?>
        </div>
</body>

</html>