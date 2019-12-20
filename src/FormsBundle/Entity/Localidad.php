<?php

namespace FormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Localidad
 *
 * @ORM\Table(name="localidad")
 * @ORM\Entity(repositoryClass="FormsBundle\Repository\LocalidadRepository")
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
     * @var string
     * @ORM\Column(name="codPostal", type="string", length=8, nullable=false)
     * @Assert\NotBlank(message="Indicar el Código Postal de la Localidad.")
     * @Assert\Length(
     *     min = 4,
     *     max = 8,
     *     minMessage = "El Código Postal no puede tener menos de {{ limit }} caracteres.",
     *     maxMessage = "El Código Postal no puede tener más de {{ limit }} caracteres."
     * )
     */
    protected $codPostal;

    /**
     * @var string
     * @ORM\Column(name="subZona", type="string", length=3, nullable=true)
     * @Assert\Length(
     *     max = 3,
     *     maxMessage = "La Subzona no puede tener más de {{ limit }} caracteres."
     * )
     */
    protected $subZona;

    /**
     * @ORM\ManyToOne(targetEntity="FormsBundle\Entity\Departamento", inversedBy="localidades")
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
     * Set codPostal
     *
     * @param integer $codPostal
     *
     * @return Localidad
     */
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * Get codPostal
     *
     * @return int
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }


    /**
     * Set subZona
     *
     * @param integer $subZona
     *
     * @return Localidad
     */
    public function setSubZona($subZona)
    {
        $this->subZona = $subZona;

        return $this;
    }

    /**
     * Get subZona
     *
     * @return integer
     */
    public function getSubZona()
    {
        return $this->subZona;
    }

    /**
     * Set departamento
     *
     * @param FormsBundle\Entity\Departamento $departamento
     *
     * @return Localidad
     */
    public function setDepartamento(FormsBundle\Entity\Departamento $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return FormsBundle\Entity\Departamento
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
