<?php
$nombre = $_POST['nombre'];
$correo = $_POST['email'];
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera Prueba</title>
    <link rel="stylesheet" href="./styles3.css">
</head>
<body>
  <div class="fondo-desvaneciente">
    <h2 align= center>PRIMERA PRUEBA</h2>
    <div align= center>
      <?php echo "Buenas " .  $nombre . " veo que quieres quitar tu virus del ordenador, pero primero deberas pasar una serie de pruebas. Pero primero, creo que debes informarte de lo que te he metido en el ordenador... <br><br>
      PREPARATE!" ; ?>
    </div>
    <br>
    <form action="pagina2.php" method="post">
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
          <br><button class="btn-login">Enviar respuestas</button>
    </form>
    
</body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuestas_correctas = array(
        "pregunta1" => "b", 
        "pregunta2" => "c", 
        "pregunta3" => "b", 
    );

    // Recoger las respuestas del usuario del formulario anterior
    $respuestas_usuario = array(
        "pregunta1" => $_POST['respuesta1'], 
        "pregunta2" => $_POST['respuesta2'],
        "pregunta3" => $_POST['respuesta3'],
    );

    $pistas = array(
        "pregunta1" => "Un virus, se supone que es algo malo verdad?",
        "pregunta2" => "Confías de todos los correos que recibes?",
        "pregunta3" => "Si un virus es malo, el rendimiento será mayor o menor?",
    ); 

    $respuestas_usuario = array_map('strtolower', $respuestas_usuario);

    $respuestas_correctas_values = array_intersect_assoc($respuestas_usuario, $respuestas_correctas);

    if (count($respuestas_correctas_values) == count($respuestas_correctas)) {
        header("Location: pagina2.php");
        exit();
    } else {

        $_SESSION['mensaje'] = "";
        foreach ($respuestas_correctas as $pregunta => $respuesta_correcta) {
            if ($respuestas_usuario[$pregunta] != $respuesta_correcta) {
                $pista = $pistas[$pregunta];
                $_SESSION['mensaje'] .= "Pregunta: $pregunta - Pista: $pista <br>";
            }
        }
        header("Location: pagina1.php");
        exit();
    }
}
?>

