<?php

require __DIR__ . '/../vendor/autoload.php';

//*var_dump($_SERVER['PATH_INFO']);*/

switch ($_SERVER['PATH_INFO']){
    case '/listar-cursos':
        $controlador= new ListarCursos();
        $controlados-> processaRequisicao();
        break;
    case '/novo-curso':
        require 'formulario-novo-curso.php';
        break;
    default:
        echo "Erro 404";
        break;
}





