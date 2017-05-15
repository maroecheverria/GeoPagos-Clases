<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pagos
 *
 * @ORM\Table(name="pagos", indexes={@ORM\Index(name="fk_pagos_codigousuario_idx", columns={"codigousuario"})})
 * @ORM\Entity
 */
class Pagos
{
    /**
     * @var string
     *
     * @ORM\Column(name="importe", type="decimal", precision=10, scale=0, nullable=true)
     * @Assert\GreaterThan(18)
     */
    private $importe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     * @Assert\GreaterThanOrEqual("today UTC")
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="codigopago", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigopago;

    /**
     * @var \AppBundle\Entity\Usuarios
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigousuario", referencedColumnName="codigousuario")
     * })
     */
    private $codigousuario;



    /**
     * Set importe
     *
     * @param string $importe
     *
     * @return Pagos
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return string
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Pagos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get codigopago
     *
     * @return integer
     */
    public function getCodigopago()
    {
        return $this->codigopago;
    }

    /**
     * Set codigousuario
     *
     * @param \AppBundle\Entity\Usuarios $codigousuario
     *
     * @return Pagos
     */
    public function setCodigousuario(\AppBundle\Entity\Usuarios $codigousuario = null)
    {
        $this->codigousuario = $codigousuario;

        return $this;
    }

    /**
     * Get codigousuario
     *
     * @return \AppBundle\Entity\Usuarios
     */
    public function getCodigousuario()
    {
        return $this->codigousuario;
    }
}
