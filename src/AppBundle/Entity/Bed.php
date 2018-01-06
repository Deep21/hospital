<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Bed
 *
 * @ORM\Table(name="bed")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BedRepository")
 */
class Bed
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * One Product has One Shipment.
     * @OneToOne(targetEntity="AppBundle\Entity\BedType")
     * @JoinColumn(name="bed_id", referencedColumnName="id")
     */
    private $bedType;

    /**
     * @var string
     *
     * @ORM\Column(name="bed_number", type="string", length=50)
     */
    private $bedNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set bedNumber
     *
     * @param string $bedNumber
     * @return Bed
     */
    public function setBedNumber($bedNumber)
    {
        $this->bedNumber = $bedNumber;

        return $this;
    }

    /**
     * Get bedNumber
     *
     * @return string 
     */
    public function getBedNumber()
    {
        return $this->bedNumber;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Bed
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set bedType
     *
     * @param \AppBundle\Entity\BedType $bedType
     * @return Bed
     */
    public function setBedType(\AppBundle\Entity\BedType $bedType = null)
    {
        $this->bedType = $bedType;

        return $this;
    }

    /**
     * Get bedType
     *
     * @return \AppBundle\Entity\BedType 
     */
    public function getBedType()
    {
        return $this->bedType;
    }
}
