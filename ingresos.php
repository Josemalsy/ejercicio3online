<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />

</head>
<?php session_start();
if (!isset($_SESSION['nombre'])) {
?><div id="texto">
        <p>
            <h3>Tienes que registrarte para acceder
        </p>
        <p> <button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button>
        </p>
    </div> <?php
        } else {


            ?>

    <body>
        <div class="container">
            <div class="col-md-12">
                <form method="POST" action="insertaIngresos.php">
                    <div id="tituloI">
                        <p>
                            <H1>INGRESOS</H1>
                        </p>
                    </div>
                    <p>
                        <h3>Fecha del movimiento</h3>
                    </p>
                    <p> <input name="setFecha" type="date" required> </p>



                    <div class="col-md-13">
                        <p>
                            <h3>Introduzca el importe</h3>
                        </p>
                        <input type="number" name="importe" min="0" required>
                        </select>
                        <div class="col-md-13">
                            <p>
                                <h3>Introduzca el concepto</h3>
                            </p>
                            <input type="text" name="concepto" value="concepto" required>
                            </select>
                        </div>
                        <input id="enviar" type="submit" class="btn btn-lg btn-outline-success"> <button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button>
                </form>
                <br>

            </div>
        <?php } ?>
    </body>

</html>