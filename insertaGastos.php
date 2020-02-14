<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />

</head>
<body>
<?php

session_start();

require_once('connect_db.php');

$importe = $_POST['importe'];
$fecha = $_POST['setFecha'];
$concepto = $_POST['concepto'];
$nombre = $_SESSION['nombre'];

//obtener el id del cliente
$sql = "SELECT id FROM usuario where usuario = ?";
$sth = $dbh->prepare($sql);
$sth->execute(array($nombre));
$result = $sth->fetch();

$id = $result['id'];

    //insertamos los datos
    $sql = 'INSERT INTO gastos(concepto,importe,fecha,idUsuario ) values(?,?,?,?)';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($concepto, $importe, $fecha, $id));

    ?> <div id="texto"> <h3>Datos insertados correctamente</h3>

    <button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button></div><?php
    
?>
</body>
</html>