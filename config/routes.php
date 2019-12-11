<?php
//* Agrupameto de imports do namespace*/
use Alura\Cursos\Controller\{Exclusao, FormularioInsercao, ListarCursos, Persistencia};

$rotas = [
    '/listar-cursos'=> ListarCursos::class,
    '/novo-curso'=> FormularioInsercao::class,
    '/salvar-curso'=> Persistencia::class,
    '/excluir-curso'=> Exclusao::class,

];

