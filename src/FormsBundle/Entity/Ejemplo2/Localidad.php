<?php

namespace FormsBundle\Entity\Ejemplo2;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Localidad
 *
 * @ORM\Table(name="forms_ej2_localidad")
 * @ORM\Entity
 */
class Localidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO"))
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Indique el nombre de la Localidad.")
     */
    protected $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="FormsBundle\Entity\Ejemplo2\Departamento", inversedBy="localidades")
     * @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     */
    protected $departamento;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Localidad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set departamento
     *
     * @param FormsBundle\Entity\Ejemplo2\Departamento $departamento
     *
     * @return Localidad
     */
    public function setDepartamento(FormsBundle\Entity\Ejemplo2\Departamento $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return FormsBundle\Entity\Ejemplo2\Departamento
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function __toString() {
        return $this->nombre;
    }


}
