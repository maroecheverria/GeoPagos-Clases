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
        $date = new \DateTime("2017/06/16");
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
     * @Route("/pagos/update/{id}", name="pagos_update")
     * @ParamConverter("pagos", options={"id" = "codigopago"})
     */
    public function updateAction(Pagos $pago)
    {
        $pago->setImporte(40.5);
        $date = new \DateTime("2017/07/16");
        $pago->setFecha($date);

        $validator = $this->get('validator');
        $errors = $validator->validate($pago);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new Response('El pago ha sido editado.');
    }

    /**
     * @Route("/pagos/delete/{id}", name="pagos_delete")
     * @ParamConverter("pagos", options={"id" = "codigopago"})
     */
    public function deleteAction(Pagos $pago)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($pago);
        $em->flush();

        return new Response('El pagos ha sido eliminado.');
    }
}
