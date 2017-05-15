<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UsuariosController extends Controller
{

    /**
     * @Route("/usuarios/create", name="usuarios_create")
     */
    public function createAction()
    {
        $usuario = new Usuarios();

        $usuario->setUsuario('mecheverria');
        $usuario->setClave('mecheverria134');
        $usuario->setEdad(25);

        $validator = $this->get('validator');
        $errors = $validator->validate($usuario);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();

        $em->persist($usuario);

        $em->flush();

        return new Response('El usuario ha sido creado.');
    }

    /**
     * @Route("/usuarios/delete/{id}", name="usuarios_delete")
     * @ParamConverter("usuarios", options={"id" = "codigousuario"})
     */
    public function deleteAction(Usuarios $usuario)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($usuario);
        $em->flush();

        return new Response('El usuario ha sido eliminado.');
    }

    /**
     * @Route("/usuarios/update/{id}", name="usuarios_update")
     * @ParamConverter("usuarios", options={"id" = "codigousuario"})
     */
    public function updateAction(Usuarios $usuario)
    {
        $usuario->setEdad(64);

        $validator = $this->get('validator');
        $errors = $validator->validate($usuario);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new Response('El usuario ha sido editado.');
    }
}
