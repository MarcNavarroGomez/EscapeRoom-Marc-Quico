<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera Prueba</title>
    <link rel="stylesheet" href="./css/styles3.css">
</head>
<body>
  <div class="fondo-desvaneciente">
    <h2 align= center>PRIMERA PRUEBA</h2>
    <div align= center>
      <?php echo "Buenas veo que quieres quitar tu virus del ordenador, pero primero deberas pasar una serie de pruebas. Pero primero, creo que debes informarte de lo que te he metido en el ordenador... <br><br>
      PREPARATE!" ; ?>
    </div>
    <br>
    <form action="" method="post">
          <div>
            <legend><h1>Pregunta 1: ¿Qué es un virus informático?</h1></legend>
            <br>
            <label for="respuesta1a"><input type="radio" id="respuesta1a" name="respuesta1" value="a"> a) Un virus informático es una herramienta utilizada por los técnicos de informática para reparar ordenadores.</label><br>
            <label for="respuesta1b"><input type="radio" id="respuesta1b" name="respuesta1" value="b"> b) Un virus informático es un programa malicioso diseñado para dañar, robar información o tomar el control de un ordenador.</label><br>
            <label for="respuesta1c"><input type="radio" id="respuesta1c" name="respuesta1" value="c"> c) Un virus informático es un programa diseñado para mejorar el rendimiento de un ordenador.</label><br>
          </div>
          <br>
          
          <div>
            <legend><h1>Pregunta 2: ¿Qué medidas de seguridad puedo tomar para proteger mi ordenador contra los virus?</h1></legend>
            <br>
            <label for="respuesta2a"><input type="radio" id="respuesta2a" name="respuesta2" value="a"> a) Abrir enlaces sospechosos recibidos en correos electrónicos.</label><br>
            <label for="respuesta2b"><input type="radio" id="respuesta2b" name="respuesta2" value="b"> b) Desactivar el firewall de Windows.</label><br>
            <label for="respuesta2c"><input type="radio" id="respuesta2c" name="respuesta2" value="c"> c) Instalar y mantener actualizado un software antivirus.</label><br>
          </div>
          <br>
          
          <div>
            <legend><h1>Pregunta 3: ¿Cuáles son los síntomas de que mi ordenador puede estar infectado por un virus?</h1></legend>
            <br>
            <label for="respuesta3a"><input type="radio" id="respuesta3a" name="respuesta3" value="a"> a) Incremento en la velocidad de navegación por Internet.</label><br>
            <label for="respuesta3b"><input type="radio" id="respuesta3b" name="respuesta3" value="b"> b) Rendimiento lento del sistema, ventanas emergentes no deseadas y archivos o programas inexplicables.</label><br>
            <label for="respuesta3c"><input type="radio" id="respuesta3c" name="respuesta3" value="c"> c) Mayor eficiencia en la ejecución de programas y procesos.</label><br>
          </div>
          <br>

          <div>
            <legend><h1>Pregunta 4: ¿Cuál es la importancia de mantener mi software y sistemas operativos actualizados para prevenir infecciones por virus?</h1></legend>
            <br>
            <label for="respuesta4a"><input type="radio" id="respuesta4a" name="respuesta4" value="a"> a) Las actualizaciones de software y sistemas operativos a menudo corrigen vulnerabilidades de seguridad que podrían ser explotadas por virus.</label><br>
            <label for="respuesta4b"><input type="radio" id="respuesta4b" name="respuesta4" value="b"> b) Las actualizaciones de software solo agregan nuevas características estéticas.</label><br>
            <label for="respuesta4c"><input type="radio" id="respuesta4c" name="respuesta4" value="c"> c) Las actualizaciones de software solo mejoran la interfaz de usuario.</label><br>
          </div>
          </div>
          <br><button class="btn-login" type="">Enviar respuestas</button>
    </form>
    
</body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Respuestas correctas
    $respuestas_correctas = array(
        "respuesta1" => "b", 
        "respuesta2" => "c", 
        "respuesta3" => "b", 
        "respuesta4" => "a"
    );

    // Respuestas del usuario
    $respuestas_usuario = array(
        "respuesta1" => isset($_POST['respuesta1']) ? $_POST['respuesta1'] : '', 
        "respuesta2" => isset($_POST['respuesta2']) ? $_POST['respuesta2'] : '',
        "respuesta3" => isset($_POST['respuesta3']) ? $_POST['respuesta3'] : '',
        "respuesta4" => isset($_POST['respuesta4']) ? $_POST['respuesta4'] : ''
    );

    // Verificar si todas las respuestas están presentes y son correctas
    $respuestas_correctas_values = array_intersect_assoc($respuestas_usuario, $respuestas_correctas);

    if ($respuestas_correctas_values == $respuestas_correctas) {
        // Todas las respuestas son correctas, redireccionar a la siguiente página
        header("Location: pagina2.php");
        exit();
    } else {
        // No todas las respuestas son correctas, almacenar un mensaje de error en la sesión
        $_SESSION['mensaje'] = "¡Lo siento! Algunas respuestas son incorrectas.";
        header("Location: pagina1.php");
        exit();
    }
}
?>


