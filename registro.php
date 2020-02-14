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

  require_once('connect_db.php');

  $username = $_POST['user'];
  $password = $_POST['password'];

  $password = password_hash($password, PASSWORD_BCRYPT);

  $sql = "SELECT * FROM usuario WHERE usuario = ?";
  $sth = $dbh->prepare($sql);
  $sth->execute(array($username));
  $buscaUsuarios = $sth->fetch();

  if ($buscaUsuarios == 0) {
    $sql = 'INSERT INTO usuario(usuario,pass,id) values(?,?,?)';
    $sth = $dbh->prepare($sql);
    $success = $sth->execute(array($username, $password, null));
   ?>

    <div id="texto"><p><h2>Registro completado</h2></p></div>

  <?php } else { ?>

    <div id="texto"><p><h2>El usuario ya existe</h2></p></div>

  <?php } ?>

  <div id="texto"><button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button></div>

</body>

</html>