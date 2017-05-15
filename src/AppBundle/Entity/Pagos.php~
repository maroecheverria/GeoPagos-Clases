<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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


}

