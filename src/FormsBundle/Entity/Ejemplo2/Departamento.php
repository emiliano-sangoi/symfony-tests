<?php

namespace FormsBundle\Entity\Ejemplo2;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="forms_ej2_departamento")
 * @ORM\Entity
 */

class Departamento
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=false, nullable=false)
     * @Assert\NotBlank(message="Indicar el nombre del Departamento.")
     */
    protected $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="departamentos")
     * @ORM\JoinColumn(name="provincia_id", referencedColumnName="id")
     */
    protected $provincia;

    /**
     * @ORM\OneToMany(targetEntity="Localidad", mappedBy="departamento")
     */
    protected $localidades;


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
     * @return Departamento
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
     * Constructor
     */
    public function __construct()
    {
        $this->localidades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set provincia
     *
     * @param Provincia $provincia
     *
     * @return Departamento
     */
    public function setProvincia(Provincia $provincia = null)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return Provincia
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Add localidade
     *
     * @param Localidad $localidades
     *
     * @return Departamento
     */
    public function addLocalidade(Localidad $localidades)
    {
        $this->localidades[] = $localidades;

        return $this;
    }

    /**
     * Remove localidade
     *
     * @param Localidad $localidades
     */
    public function removeLocalidade(Localidad $localidades)
    {
        $this->localidades->removeElement($localidades);
    }

    /**
     * Get localidades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocalidades()
    {
        return $this->localidades;
    }

    public function __toString() {
        return $this->nombre;
    }
}
