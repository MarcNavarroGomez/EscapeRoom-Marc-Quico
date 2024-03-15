<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['mensaje'])) {
        $mensaje_enviado = $_POST['mensaje'];
        $mensaje_desencriptado_esperado = "Hola clase, estamos en un momento tenso, callarse porfavor";
        if ($mensaje_enviado == $mensaje_desencriptado_esperado) {
            header("Location: pagina3.php");
            exit;
        } else {
            $_SESSION['pista'] = " <br>Recuerda verificar la ortografía y la puntuación del mensaje. Pista extra porque me caes bien: 7 = T, 5 = S";
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
    <div class="content">
        <div class="box">
        BUENO, VAS BIEN, PERO AHORA UNA PRUEBA UN POCO MÁS DIFICIL, DESENCRIPTA ESTE MENSAJE MEZCLADO CON NUMEROS, <br>
         RESPETA LOS ESPACIOS, COMAS, MAYUSCULAS Y MINUSCULAS <br>
        </div>

        <?php
 
        if (isset($_SESSION['pista'])) {
            echo '<div class="pista">' . $_SESSION['pista'] . '</div>';
            unset($_SESSION['pista']);
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





