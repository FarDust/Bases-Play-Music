// Cuando se cargá la vista del front
$(document).ready(function() {
    var url_api = 'http://localhost:5000';

    // Cuando se hace click en un boton 
    $('.boton').click(function() {
        // Variable con el valor del boton clickeado
        var valor_boton = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'http://localhost:5000',
            data: { valor: valor_boton }
        }).done(function(data_recibida) {
            // Esto se ejecuta una vez que la funcion de php retorna
            alert('Información recibida: ' + data_recibida);
            console.log('Información recibida desde php', data_recibida);
        });
    });

    // Funcion para primera consulta
    $('.buscar_por_id').click(function() {
        // Variable con el valor del id del mensaje
        var valor_id = document.getElementById("id_mensaje").value;
        console.log('Id ingresado', valor_id);
        // Consultar a la API
        $.ajax({
            crossOrigin: true,
            type: 'GET',
            url: url_api + '/mensajes',
            data: { id: valor_id }
        }).done(function(data_recibida) {
            console.log('Información recibida desde la api', data_recibida);
            document.getElementById('resultado').innerHTML = JSON.stringify(data_recibida['entities'], null , 2);
        });
    });

    // Funcion para segunda consulta
    $('.buscar_artista').click(function() {
        // Valor del id del artista a buscar
        var valor_id = document.getElementById('id_artista').value;
        console.log('Id ingresado', valor_id);
        // Consultar a la API
        $.ajax({
            crossOrigin: true,
            type: 'GET',
            url: url_api + '/artista/' + valor_id
        }).done(function(data_recibida) {
            console.log('Información recibida desde la api', data_recibida);
            document.getElementById('resultado_informacion').innerHTML = data_recibida['informacion'];
            document.getElementById('resultado_mensajes').innerHTML = data_recibida['mensajes'];
        });
    });

    // Funcion para la tercera consulta
    $('.buscar_dos_artistas').click(function() {
        // Valor de los dos ids
        var id_1 = document.getElementById('id_artista_1').value;
        var id_2 = document.getElementById('id_artista_2').value;
        console.log('ids ingresados', id_1, id_2);
        // Consultar a la API
        $.ajax({
            crossOrigin: true,
            type: 'GET',
            url: url_api + '/artista',
            data: { id1: id_1, id2: id_2 }
        }).done(function(data_recibida) {
            console.log('Información recibida desde la api', data_recibida);
            document.getElementById('resultado_mensajes').innerHTML = data_recibida['mensajes'];
        });
    });

    $('.mensajes_por_texto').click(function() {
        var obligatory = document.getElementById('obligatorias').value;
        var optional = document.getElementById('quizas').value;
        var norequired = document.getElementById('no_pueden').value;
        console.log('Frases ingresadas: ', obligatory, optional, norequired);
        //consultar a la API
        $.ajax({
            crossOrigin: true,
            type: 'POST',
            data: JSON.stringify({obligatorias: obligatory, quizas: optional, no_pueden: norequired}),
            contentType: "application/json; charset=utf-8",
            traditional: true,
            url: url_api + '/mensajes',
        }).done(function(data_recibida){
            console.log("Información recibida desde la aip: ", data_recibida);
            document.getElementById('resultado_mensajes').innerHTML = data_recibida['mensajes'];
        });
    });
});