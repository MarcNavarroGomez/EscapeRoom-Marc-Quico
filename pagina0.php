<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['usuario']) || empty($_POST['password'])) {
        header("Location: index.html");
    } else {
        header("Location: pagina0.php");
        exit;
    }
}
?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quitar el Virus</title>
<link rel="stylesheet" href="./css/styles2.css">
</head>
<body>
  <h1 align= center>¡Alerta! Se ha detectado un virus en tu ordenador</h1>
  <p align= center>Para eliminar el virus, necesitas pasar una serie de pruebas. Por favor, antes de empezar completa el siguiente formulario; al finalizar las pruebas, obtendras una calve para desactivar el virus en el correo que pongas, así que ten cuidado con el que pones... Y sobre tus nombres... ten cuidado amigo, con el nombre que pongas, es por el que te voy a llamar...</p>
  <div align= center class="card-login-externo">
  <div class="card-login">
  <form action="pagina1.php" method="post">
    <label for="nombre">Nombre y Apellidos:</label><br>
    <input type="text" id="nombre" name="nombre" required placeholder="Nombre"><br><br>
    
    <label for="email">Correo Electrónico:</label><br>
    <input type="email" id="email" name="email" required placeholder="Email"><br><br>
    
    <input type="submit" class= "btn-login"value=" Enviar">
  </form>
  </div>
  </div>
</body>





