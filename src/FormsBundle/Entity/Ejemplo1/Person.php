<?php

namespace FormsBundle\Entity\Ejemplo1;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="forms_ej1_person", indexes={@ORM\Index(name="city_id", columns={"city_id"}), @ORM\Index(name="neighborhood_id", columns={"neighborhood_id"})})
 * @ORM\Entity
 */
class Person
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
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @var \FormsBundle\Entity\Ejemplo1\City
     *
     * @ORM\ManyToOne(targetEntity="FormsBundle\Entity\Ejemplo1\City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    /**
     * @var \FormsBundle\Entity\Ejemplo1\Neighborhood
     *
     * @ORM\ManyToOne(targetEntity="FormsBundle\Entity\Ejemplo1\Neighborhood")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="neighborhood_id", referencedColumnName="id")
     * })
     */
    private $neighborhood;

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
     * @return Person
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
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set city
     *
     * @param \FormsBundle\Entity\Ejemplo1\City $city
     * @return Person
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

    /**
     * Set neighborhood
     *
     * @param \FormsBundle\Entity\Ejemplo1\Neighborhood $neighborhood
     * @return Person
     */
    public function setNeighborhood(\FormsBundle\Entity\Ejemplo1\Neighborhood $neighborhood = null)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * Get neighborhood
     *
     * @return \FormsBundle\Entity\Ejemplo1\Neighborhood
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }
}
