<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Pagos;
use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PagosController extends Controller
{

    /**
     * @Route("/pagos/create/{id}", name="pagos_create")
     * @ParamConverter("usuarios", options={"id" = "codigousuario"})
     */
    public function createAction(Usuarios $usuario)
    {
        $pago = new Pagos();

        $pago->setCodigousuario($usuario);
        $pago->setImporte(29.45);
        $date = new \DateTime("2017/05/15");
        $pago->setFecha($date);

        $validator = $this->get('validator');
        $errors = $validator->validate($pago);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();

        $em->persist($pago);

        $em->flush();

        return new Response('El pago ha sido creado.');
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
