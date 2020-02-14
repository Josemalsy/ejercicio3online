<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />

</head>

<?php
session_start();
require_once 'connect_db.php';

$nombre = $_SESSION['nombre'];

//obtenemos el id del usuario
$sql = "SELECT id FROM usuario where usuario = ?";
$sth = $dbh->prepare($sql);
$sth->execute(array($nombre));
$result = $sth->fetch();

$id = $result['id'];

?>

<body>
    <div id="texto"> <button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button></div>


    <div id="titulo">
        <p>BALANCE
    </div>
    </p>
    <div class="row">

        <!-- TABLA DE LOS INGRESOS -->


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <table class="table table-striped table-bordered">
                <div id="ingresos">INGRESOS</div>
                <thead>
                    <tr>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Descripcion</th>
                        <th scope='col'> Cantidad</th>
                    </tr>
                <tbody>
                    <?php

                    $sql = 'SELECT fecha,concepto,importe from usuario,ingresos 
                    where usuario.id = ingresos.idUsuario and usuario.id = ?';

                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($id));
                    $rows = $sth->fetchAll();

                    foreach ($rows as &$row) {
                    ?>
                        <tr>
                            <td><?= $row['fecha'] ?></td>
                            <td><?= $row['concepto'] ?></td>
                            <td><?= $row['importe'] ?>€</td>
                        </tr>
                    <?php
                    }
                    $sql = 'SELECT sum(importe) from usuario,ingresos 
                    where usuario.id = ingresos.idUsuario and usuario.id = ?';

                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($id));
                    $rows = $sth->fetchAll();
                    foreach ($rows as &$row) {
                    ?>
                        <th></th>
                        <th id="totales">Total de ingresos</th>
                        <td><?= $row['sum(importe)'] ?>€</td>

                    <?php } ?>
                    </thead>
                </tbody>
            </table>
        </div>

        <!-- TABLA DE LOS GASTOS -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <table class="table table-striped table-bordered">
                <div id="gastos">gastos</div>
                <thead>
                    <tr>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Descripcion</th>
                        <th scope='col'> Cantidad</th>
                    </tr>

                <tbody>
                    <?php

                    $sql = 'SELECT fecha,concepto,importe from usuario,gastos 
                    where usuario.id = gastos.idUsuario and usuario.id = ?';

                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($id));
                    $rows = $sth->fetchAll();

                    foreach ($rows as &$row) {
                    ?>
                        <tr>
                            <td><?= $row['fecha'] ?></td>
                            <td><?= $row['concepto'] ?></td>
                            <td><?= $row['importe'] ?>€</td>
                        </tr>
                    <?php
                    }
                    $sql = 'SELECT sum(importe) from usuario,gastos 
                    where usuario.id = gastos.idUsuario and usuario.id = ?';

                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($id));
                    $rows = $sth->fetchAll();
                    foreach ($rows as &$row) {
                    ?>
                        <th></th>
                        <th id="totales">Total de gastos</th>
                        <td><?= $row['sum(importe)'] ?>€</td>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    <?php } ?>
                    </thead>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tablaFinal">
            <table class="table table-striped table-bordered">
                <?php

                $sql = 'SELECT SUM(,concepto,importe from usuario,gastos 
                where usuario.id = gastos.idUsuario and usuario.id = ?';

                $sth = $dbh->prepare($sql);
                $sth->execute(array($id));
                $rows = $sth->fetchAll();

                foreach ($rows as &$row) {
                ?>
                    <tr>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['concepto'] ?></td>
                        <td><?= $row['importe'] ?>€</td>
                    </tr>
                <?php
                }
                $sql = 'SELECT sum(importe) as totalIngresos from usuario,ingresos 
                where usuario.id = ingresos.idUsuario and usuario.id = ?';

                $sth = $dbh->prepare($sql);
                $sth->execute(array($id));
                $result = $sth->fetch();

                $totalIngresos = $result['totalIngresos'];

                $sql = 'SELECT sum(importe) as totalGastos from usuario,gastos 
                where usuario.id = gastos.idUsuario and usuario.id = ?';

                $sth = $dbh->prepare($sql);
                $sth->execute(array($id));
                $result = $sth->fetch();
                $totalGastos = $result['totalGastos'];

                $balance = $totalIngresos - $totalGastos;
                ?>
                <tr>
                    <td></td>
                    <td id="final">BALANCE TOTAL:</td>
                    <td id="dinero"><?= $balance ?>€</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </div>
</body>

</html>