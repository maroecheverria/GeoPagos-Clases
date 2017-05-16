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
     *   @ORM\JoinColumn(name="codigousuariofavorito", referencedColumnName="codigousuario", onDelete="CASCADE")
     * })
     */
    private $codigousuariofavorito;


    /**
     * Set codigousuario
     *
     * @param integer $codigousuario
     *
     * @return Favoritos
     */
    public function setCodigousuario($codigousuario)
    {
        $this->codigousuario = $codigousuario;

        return $this;
    }

    /**
     * Get codigousuario
     *
     * @return integer
     */
    public function getCodigousuario()
    {
        return $this->codigousuario;
    }

    /**
     * Set codigousuariofavorito
     *
     * @param \AppBundle\Entity\Usuarios $codigousuariofavorito
     *
     * @return Favoritos
     */
    public function setCodigousuariofavorito(\AppBundle\Entity\Usuarios $codigousuariofavorito)
    {
        $this->codigousuariofavorito = $codigousuariofavorito;

        return $this;
    }

    /**
     * Get codigousuariofavorito
     *
     * @return \AppBundle\Entity\Usuarios
     */
    public function getCodigousuariofavorito()
    {
        return $this->codigousuariofavorito;
    }
}
