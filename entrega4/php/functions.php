<?php
    if (isset($_POST['valor'])) {
        // Distintos casos para las distintas opciones
        switch ($_POST['valor']) {
            // En el caso de la primera ruta
            case 'opcion_1':
                funcion_1();
                break;

            case 'opcion_2':
                llamar_api();
                break;
        };
    };

    function funcion_1() {
        echo 'Esto retorna la primera funcion';
        exit;
    };

    function funcion_2() {
        echo 'Esto retorna la segunda funcion';
        exit;
    };

    function llamar_api() {
        /* llamar_api: funcion para llamar a la API. Imprime lo 
        que retorna la API y eso lo recibe la funcion de Javascript y 
        lo maneja */
    }
?>