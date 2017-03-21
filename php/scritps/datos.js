/**
 * Created by franciscomera on 19/03/17.
 */

/*Funcion que abre un nuevo formulario para ingresar una tarjeta*/
function agregarTarjeta(){
        e = document.getElementById('idF');
        e.style.visibility = (e.style.visibility == "visible") ? "hidden" : "visible";
        window.onclick = function (event) {
            if(event.target == e)
                    e.style.visibility = "hidden";
        };


}

/*Funcion para confirmar si el usuario desea borrar una tarjeta*/
function ask(id) {
    if(confirm("¿Seguro que deseas borrar esta tarjeta?")){
            location.href = '../scritps/borrar.php?eliminar='+id;
    }
}


/*Funcion para preguntar si se desea borrar todos los registros de tarjetas*/
function deleteAll() {
    if(confirm("¿Estas seguro que deseas borrar todas tus tarjetas?")) {
        location.href = "../scritps/borrarCards.php";
    }
}

/*Funcion para modificar un campo*/
function actualizarCP(id){
    if(prompt("¿Cambiaras este registro?")){
            location.href = '../scritps/actualizar.php?actualizar='+id;
    }
}