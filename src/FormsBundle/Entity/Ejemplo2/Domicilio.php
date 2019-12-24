<?php

namespace FormsBundle\Entity\Ejemplo2;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domicilio
 *
 * @ORM\Table(name="forms_ej2_domicilio")
 * @ORM\Entity(repositoryClass="FormsBundle\Repository\Ejemplo2\DomicilioRepository")
 */
class Domicilio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="calle", type="string", length=255)
     */
    protected $calle;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    protected $numero;

    /**
     * @var \FormsBundle\Entity\Ejemplo2\Localidad
     *
     * @ORM\ManyToOne(targetEntity="FormsBundle\Entity\Ejemplo2\Localidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
     * })
     */
    protected $localidad;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Domicilio
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Domicilio
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set localidad
     *
     * @param \FormsBundle\Entity\Ejemplo2\Localidad $localidad
     * @return Domicilio
     */
    public function setLocalidad(\FormsBundle\Entity\Ejemplo2\Localidad $localidad = null)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return \FormsBundle\Entity\Ejemplo2\Localidad 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }
}
