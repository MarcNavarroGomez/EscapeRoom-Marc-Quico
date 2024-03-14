<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si la clave 'mensaje' está presente en $_POST
    if (isset($_POST['mensaje'])) {
        // Obtener el mensaje enviado en el formulario
        $mensaje_enviado = $_POST['mensaje'];
        // Mensaje desencriptado esperado
        $mensaje_desencriptado_esperado = "Hola clase, estamos en un momento tenso, callarse porfavor";

        // Comparar el mensaje enviado con el mensaje desencriptado esperado
        if ($mensaje_enviado == $mensaje_desencriptado_esperado) {
            // El mensaje enviado coincide con el mensaje desencriptado esperado
            header("Location: pagina3.php");
            exit;
        } else {
            // El mensaje enviado no coincide con el mensaje desencriptado esperado
            $_SESSION['pista'] = "Recuerda verificar la ortografía y la puntuación del mensaje. Pista extra porque me caes bien: 7 = T, 5 = S";
        }
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room Puzzle</title>
    <link rel="stylesheet" href="styles4.css">
</head>
<body>
    <div class="puzzle-container">
        <div>
            <h1>
                BUENO, VAS BIEN, PERO AHORA UNA PRUEBA UN POCO MÁS DIFICIL, DESENCRIPTA ESTE MENSAJE MEZCLADO CON NUMEROS, RESPETA LOS ESPACIOS, COMAS, MAYUSCULAS Y MINUSCULAS
            </h1>
        </div>
        <?php
        // Mostrar el mensaje de pista si está presente en la sesión
        if (isset($_SESSION['pista'])) {
            echo '<div class="pista">' . $_SESSION['pista'] . '</div>';
            unset($_SESSION['pista']); // Limpiar la pista de la sesión después de mostrarla
        }
        ?>
        <div class="message-screen">Mensaje encriptado: H0l4 cl453, 3574m05 3n un m0m3n70 73n50, c4ll4r53 p0rf4v0r</div>
        <div class="lock">
            <form action="" method="post">
                <input type="text" name="mensaje" id="mensaje" placeholder="Introduce el código">
                <button class="btn-login">DESENCRIPTAR</button>
            </form>
        </div>
    </div>
</body>





