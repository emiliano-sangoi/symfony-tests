<?php

namespace FormsBundle\Entity\Ejemplo1;

use Doctrine\ORM\Mapping as ORM;

/**
 * Neighborhood
 *
 * @ORM\Table(name="forms_ej1_neighborhood", indexes={@ORM\Index(name="city_id", columns={"city_id"})})
 * @ORM\Entity
 */
class Neighborhood
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \FormsBundle\Entity\Ejemplo1\City
     *
     * @ORM\ManyToOne(targetEntity="FormsBundle\Entity\Ejemplo1\City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    public function __toString(){
      return $this->name;
    }


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
     * Set name
     *
     * @param string $name
     * @return Neighborhood
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set city
     *
     * @param \FormsBundle\Entity\Ejemplo1\City $city
     * @return Neighborhood
     */
    public function setCity(\FormsBundle\Entity\Ejemplo1\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \FormsBundle\Entity\Ejemplo1\City
     */
    public function getCity()
    {
        return $this->city;
    }
}
