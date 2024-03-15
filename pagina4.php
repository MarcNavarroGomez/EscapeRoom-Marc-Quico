<?php
// Respuestas correctas
$respuestas_correctas = array(
    "redes" => "Nuria",
    "sistemas" => "Sergio",
    "base" => "Gerard",
    "aprobado" => 1, 
);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuestas_usuario = array(
        "redes" => $_POST["redes"],
        "sistemas" => $_POST["sistemas"],
        "base" => $_POST["base"],
        "aprobado" => $_POST["aprobado"],
    );


    $respuestas_correctas_usuario = array_intersect_assoc($respuestas_correctas, $respuestas_usuario);


    if (count($respuestas_correctas_usuario) == count($respuestas_correctas)) {

        header("Location: pagina6.php");
        exit();
    } else {
        echo "Algunas respuestas son incorrectas. Por favor, inténtalo de nuevo. No pongas apellidos, y recuerda las primeras letras en mayuscula";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Preguntas</title>
    <link rel="stylesheet" href="./css/styles9.css">
</head>
<body>
<div class="fondo-desvaneciente">
    <h1 align="center ">Formulario de Preguntas</h1>
    <div class="formulario">
    <form action="" method="post">
        <label for="nombre">1. ¿Si tengo un problema con la configuracion de mi ejercicio del Packet Tracer a quien debo acudir?</label><br>
        <input type="text" id="nombre" name="redes" required><br><br>

        <label for="edad">2. ¿Si no se instalar un dominio a quien debo pedir ayuda?</label><br>
        <input type="text" id="edad" name="sistemas" required><br><br>

        <label for="ciudad">3. ¿A quien le encantan los hackaton?</label><br>
        <input type="text" id="ciudad" name="base" required><br><br>

        <label for="hobby">4. ¿Cuantos alumnos aprobaron el famoso hackaton?</label><br>
        <input type="number" id="hobby" name="aprobado" required><br><br>

        <input type="submit" class= "btn-login"value=" Enviar">
    </form>
    </div>
</div>
</body>
