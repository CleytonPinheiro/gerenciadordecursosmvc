<?php

namespace Alura\Cursos\Controller;

use Alura\cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositotioDeUsuarios;

    public function __construct()
    {
        $entityManager=(new EntityManagerCreator())->getEntityManager();
        $this->repositotioDeUsuarios=$entityManager
            ->getRepository(Usuario::class);
    }

    public function processaRequisicao():void
    {
        $email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        if(is_null($email)|| $email===false){
            echo "Email inválido";
            return;
        }

        //$senha=filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);

        $usuario=$this->repositotioDeUsuarios->findOneBy(['email'=>$email]);

        if (is_null($usuario) || !$usuario->senhaEstaCoreta($senha)) {
            echo "email ou senha inválidos";
            return;
        }
        header('Location: /listar-cursos');
    }
}

