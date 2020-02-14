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
  session_destroy();

  ?>

  <div id="texto">
    <p>
      <h2>Has cerrado sesión</h2>
    </p>

    <button onclick=" location.href='index.php'" class="btn btn-lg btn-warning">Volver a la portada</button>
  </div>
</body>

</html>