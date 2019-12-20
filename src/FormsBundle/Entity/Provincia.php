<?php

namespace FormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Provincia
 *
 * @ORM\Table(name="provincia")
 * @ORM\Entity(repositoryClass="FormsBundle\Repository\ProvinciaRepository")
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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, unique=true, nullable=false)
     * @Assert\NotBlank(message="Indicar el nombre de la Provincia.")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="abreviatura", type="string", length=150, nullable=true, unique=true)
     */
    private $abreviatura;

    /**
     * @ORM\OneToMany(targetEntity="Departamento", mappedBy="provincia")
     */
    private $departamentos;


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
     * Set abreviatura
     *
     * @param string $abreviatura
     *
     * @return Provincia
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    /**
     * Get abreviaturaProvincia
     *
     * @return string
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Add departamento
     *
     * @param FormsBundle\Entity\Departamento $departamento
     *
     * @return Provincia
     */
    public function addDepartamento(FormsBundle\Entity\Departamento $departamento)
    {
        $this->departamentos[] = $departamento;

        return $this;
    }

    /**
     * Remove departamento
     *
     * @param FormsBundle\Entity\Departamento $departamento
     */
    public function removeDepartamento(FormsBundle\Entity\Departamento $departamento)
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
