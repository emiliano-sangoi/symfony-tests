<?php

namespace FormsBundle\Entity\Ejemplo2;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Provincia
 *
 * @ORM\Table(name="forms_ej2_provincia")
 * @ORM\Entity
 */

class Provincia
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=true, nullable=false)
     * @Assert\NotBlank(message="Indicar el nombre de la Provincia.")
     */
    protected $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Departamento", mappedBy="provincia")
     */
    protected $departamentos;


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
     * @return Provincia
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
     * Add departamento
     *
     * @param FormsBundle\Entity\Ejemplo2\Departamento $departamento
     *
     * @return Provincia
     */
    public function addDepartamento(\FormsBundle\Entity\Ejemplo2\Departamento $departamento)
    {
        $this->departamentos[] = $departamento;

        return $this;
    }

    /**
     * Remove departamento
     *
     * @param FormsBundle\Entity\Ejemplo2\Departamento $departamento
     */
    public function removeDepartamento(\FormsBundle\Entity\Ejemplo2\Departamento $departamento)
    {
        $this->departamentos->removeElement($departamento);
    }

    /**
     * Get departamentos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartamentos()
    {
        return $this->departamentos;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departamentos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->nombre;
    }

}
