//cargo en un arreglo las imágenes de las banderas. Este será el orden en que se mostrarán
let banderas = ["pa.svg", "bo.svg", "ad.svg", "gb.svg", "na.svg"];

//arreglo que guardará la opción correcta
let correcta = [2, 2, 1, 1, 0];

//arreglo que guardará los países a mostrar en cada jugada
let opciones = [];
//cargo en el arreglo opciones las opciones a mostrar en cada jugada
opciones.push(["SUDÁFRICA", "SINGAPUR", "PANAMÁ"]);
opciones.push(["PERÚ", "ITALIA", "BOLIVIA"]);
opciones.push(["TÚNEZ", "ANDORRA", "ANTIGUA Y BARBUDA"]);
opciones.push(["UCRANIA", "REINO UNIDO", "MADAGASCAR"]);
opciones.push(["NAMIBIA", "OMÁN", "ETIOPÍA"]);

//variable que guarda la posición actual
let posActual = 0;
//variable que guarda la cantidad acertadas hasta el momento
let cantidadAcertadas = 0;

function comenzarJuego() {
    //reseteamos las variables
    posActual = 0;
    cantidadAcertadas = 0;
    //activamos las pantallas necesarias
    document.getElementById("pantalla-inicial").style.display = "none";
    document.getElementById("pantalla-juego").style.display = "block";
    cargarBandera();

}

//función que carga la siguiente bandera y sus opciones
function cargarBandera() {
    //controlo si se acabaron las banderas
    if (banderas.length <= posActual) {
        terminarJuego();
    } else { //cargo las opciones
        //limpiamos las clases que se asignaron
        limpiarOpciones();

        document.getElementById("imgBandera").src = "img/" + banderas[posActual];
        document.getElementById("n0").innerHTML = opciones[posActual][0];
        document.getElementById("n1").innerHTML = opciones[posActual][1];
        document.getElementById("n2").innerHTML = opciones[posActual][2];
    }
}

function limpiarOpciones() {
    document.getElementById("n0").className = "nombre";
    document.getElementById("n1").className = "nombre";
    document.getElementById("n2").className = "nombre";

    document.getElementById("l0").className = "letra";
    document.getElementById("l1").className = "letra";
    document.getElementById("l2").className = "letra";
}

function comprobarRespuesta(opElegida) {
    if (opElegida == correcta[posActual]) { //acertó
        //agregamos las clases para colocar el color verde a la opción elegida
        document.getElementById("n" + opElegida).className = "nombre nombreAcertada";
        document.getElementById("l" + opElegida).className = "letra letraAcertada";
        cantidadAcertadas++;
    } else { //no acertó
        //agregamos las clases para colocar en rojo la opción elegida
        document.getElementById("n" + opElegida).className = "nombre nombreNoAcertada";
        document.getElementById("l" + opElegida).className = "letra letraNoAcertada";

        //opción que era correcta
        document.getElementById("n" + correcta[posActual]).className = "nombre nombreAcertada";
        document.getElementById("l" + correcta[posActual]).className = "letra letraAcertada";
    }
    posActual++;
    //Esperamos 1 segundo y pasamos mostrar la siguiente bandera y sus opciones
    setTimeout(cargarBandera, 1000);
}

function terminarJuego() {
    //ocultamos las pantallas y mostramos la pantalla final
    document.getElementById("pantalla-juego").style.display = "none";
    document.getElementById("pantalla-final").style.display = "block";
    //agregamos los resultados
    document.getElementById("numCorrectas").innerHTML = cantidadAcertadas;
    document.getElementById("numIncorrectas").innerHTML = banderas.length - cantidadAcertadas;

    // Llamar a siguientePaginaSiAciertos() al finalizar el juego
    siguientePagina();
}

function volverAlInicio() {
    //ocultamos las pantallas y activamos la inicial
    document.getElementById("pantalla-final").style.display = "none";
    document.getElementById("pantalla-inicial").style.display = "block";
    document.getElementById("pantalla-juego").style.display = "none";
}

function siguientePagina() {
    // Comprobar si todas las preguntas han sido acertadas
    if (cantidadAcertadas === banderas.length) {
        // Si todas las preguntas han sido acertadas, redirigir a la siguiente página
        window.location.href = "ultimapagina.php";
    } else {
        // Si no, mostrar un mensaje de error
        alert("Aún hay preguntas sin responder correctamente. ¡Sigue intentándolo!");
    }
}
