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

    $sql = 'SELECT * FROM usuario WHERE usuario=?';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($username));
    $result = $sth->fetch();

    $pass = $result['pass'];

    //Si no se encontro ningun resultado, es porque no existe tal usuario.
    if (!password_verify($password,$pass)) { ?>

        <div id="texto">
            <p>
                <h2>Nombre de usuario o contraseña incorrectos</h2>
                <p><button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button></p>
        </div>
    <?php
    } else {

        session_start();
        $_SESSION['nombre'] = $result['usuario'];
        $_SESSION['id'] = $result['id']; ?>

        <div id="texto">
            <p>
                <h2>Has iniciado sesión correctamente<h2>
            </p>
            <p><button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button></p>
        </div>

    <?php
    }
    ?>
</body>

</html>