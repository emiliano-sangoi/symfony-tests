<?php

namespace FormsBundle\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento")
 * @ORM\Entity(repositoryClass="FormsBundle\Repository\DepartamentoRepository")
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
     * @ORM\Column(name="codigo", type="string", length=2, unique=false)
     */
    protected $codigo;

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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Departamento
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
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
     * @param FormsBundle\Entity\Provincia $provincia
     *
     * @return Departamento
     */
    public function setProvincia(FormsBundle\Entity\Provincia $provincia = null)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return FormsBundle\Entity\Provincia
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Add localidade
     *
     * @param FormsBundle\Entity\Localidad $localidades
     *
     * @return Departamento
     */
    public function addLocalidade(FormsBundle\Entity\Localidad $localidades)
    {
        $this->localidades[] = $localidades;

        return $this;
    }

    /**
     * Remove localidade
     *
     * @param FormsBundle\Entity\Localidad $localidades
     */
    public function removeLocalidade(FormsBundle\Entity\Localidad $localidades)
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
