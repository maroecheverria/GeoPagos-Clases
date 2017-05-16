<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoritos
 *
 * @ORM\Table(name="favoritos", indexes={@ORM\Index(name="IDX_1E86887FA5B4F832", columns={"codigousuario"}), @ORM\Index(name="IDX_1E86887F21F506FC", columns={"codigousuariofavorito"})})
 * @ORM\Entity
 */
class Favoritos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codigousuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codigousuario;

    /**
     * @var \AppBundle\Entity\Usuarios
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigousuariofavorito", referencedColumnName="codigousuario")
     * })
     */
    private $codigousuariofavorito;


}

