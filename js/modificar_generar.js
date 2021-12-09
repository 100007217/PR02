function validar() {
    num_personas_reserva = document.getElementById('num_personas_reserva').value
    nombre_cliente = document.getElementById('nombre_cliente').value
    mensaje = document.getElementById('mensaje')

    if (num_personas_reserva == '' && nombre_cliente == '') {
        mensaje.innerHTML = 'Rellena los campos'
        return false
    } else if (num_personas_reserva == '') {
        mensaje.innerHTML = 'Introduce el número de personas'
        return false
    } else if (nombre_cliente == '') {
        mensaje.innerHTML = 'Introduce el nombre del cliente'
        return false
    } else {
        return true
    }
}