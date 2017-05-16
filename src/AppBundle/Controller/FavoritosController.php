<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Usuarios;
use AppBundle\Entity\Favoritos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class FavoritosController extends Controller
{

    /**
     * @Route("/favoritos/create/{usuario}/{favorito}", name="favoritos_create")
     * @ParamConverter("usuarios", options={"usuario" = "codigousuario"})
     * @ParamConverter("usuarios", options={"favorito" = "codigousuario"})
     */
    public function createAction(Usuarios $usuario, Usuarios $favorito)
    {
        $newFavorito = new Favoritos();

        $newFavorito->setCodigousuario($usuario->getCodigousuario());
        $newFavorito->setCodigousuariofavorito($favorito);

        $validator = $this->get('validator');
        $errors = $validator->validate($newFavorito);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();

        $em->persist($newFavorito);

        $em->flush();

        return new Response('El favorito ha sido creado.');
    }

    /**
     * @Route("/favoritos/update/{usuario}/{favorito}", name="favoritos_update")
     * @ParamConverter("favoritos", options={"mapping": {"usuario": "codigousuario", "favorito": "codigousuariofavorito"}})
     */
    public function updateAction(Usuarios $usuario, Usuarios $favorito)
    {
        $em = $this->getDoctrine()->getManager();

        $newFavorito = $em->getRepository('AppBundle\Entity\Usuarios')->find(3);

        $updateFavorito = $em->find("AppBundle\Entity\Favoritos", array("codigousuario" => $usuario->getCodigousuario(), "codigousuariofavorito" => $favorito->getCodigousuario()));

        if(!$updateFavorito){
            return new Response('El registro no existe.');
        }

        $updateFavorito->setCodigousuariofavorito($newFavorito);

        $validator = $this->get('validator');
        $errors = $validator->validate($updateFavorito);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new Response('El favorito ha sido editado.');
    }

    /**
     * @Route("/favoritos/delete/{usuario}/{favorito}", name="favoritos_delete")
     * @ParamConverter("favoritos", options={"mapping": {"usuario": "codigousuario", "favorito": "codigousuariofavorito"}})
     */
    public function deleteAction(Usuarios $usuario, Usuarios $favorito)
    {
        $em = $this->getDoctrine()->getManager();

        $deleteFavorito = $em->find("AppBundle\Entity\Favoritos", array("codigousuario" => $usuario->getCodigousuario(), "codigousuariofavorito" => $favorito->getCodigousuario()));

        if(!$deleteFavorito){
            return new Response('El registro no existe.');
        }

        $em->remove($deleteFavorito);
        $em->flush();

        return new Response('El favorito ha sido eliminado.');
    }
}
