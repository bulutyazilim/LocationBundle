<?php

namespace OkulBilisim\LocationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Country
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection|Province[]
     */
    private $provinces;

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
     * Add Province
     *
     * @param  Province $province
     * @return $this
     */
    public function addProvince(Province $province)
    {
        $this->provinces[] = $province;

        return $this;
    }

    /**
     * Remove province
     *
     * @param Province $province
     */
    public function removeProvince(Province $province)
    {
        $this->provinces->removeElement($province);
    }

    /**
     * @return ArrayCollection|Province[]
     */
    public function getProvinces()
    {
        return $this->provinces;
    }

    public function __toString()
    {
        return $this->getName();
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
     * Set name
     *
     * @param  string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
