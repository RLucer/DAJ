const newLocal = '1';
function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.', '');
    var valor = rut.value.replace(',', '');
    // Despejar Guión
    valor = valor.replace('-', '');

    //Despejar Punto2 (Quito el punto de los miles que me queda)
    valor = valor.replace('.', '');
    valor = valor.replace(',', '');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-' + dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 1) { rut.setCustomValidity("RUT Incompleto"); alert('Rut Inexistente'); return false; }
    
    // Calcular Dígito Verificador and (cuerpo.length < 999999999)
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {

        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);

        // Sumar al Contador General
        suma = suma + index;

        // Consolidar Múltiplo dentro del rango [2,7]
        if (multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); alert('Rut Invalido No Coincide el DV'); return false; }
    //alert('Rut Invalido Revisa '+ dvEsperado);return false;--> para que diga cual es el dv
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');

}

