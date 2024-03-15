<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['mensaje'])) {
        $mensaje_enviado = $_POST['mensaje'];
        $mensaje_desencriptado_esperado = "777";
        if ($mensaje_enviado == $mensaje_desencriptado_esperado) {
            header("Location: pagina4.php");
            exit;
}
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesmemory.css">
    <title>Memory Informatica</title>
</head>
<body>
    <div class="container">
        <div class="memory-game">
            <!-- Aqui van las imagenes-->
        </div>
        <div class="content">
            <h1>¡¡MEMORY CARD!!</h1>
            <p>Resuelve la prueba y obtendras el codigo para pasar de prueba</p>
            <form action="" method="post">
                <input type="text" name="mensaje" id="mensaje" placeholder="Introduce el código">
                <br>
                <br><button class="btn-login">SIGUIENTE NIVEL</button>
            </form>
        </div>
    </div>
    <script src="script1.js"></script>
</body>
</html>
