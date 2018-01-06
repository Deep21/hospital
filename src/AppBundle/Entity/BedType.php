<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BedType
 *
 * @ORM\Table(name="bed_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BedTypeRepository")
 */
class BedType
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
     * @var string
     *
     * @ORM\Column(name="bed_type", type="string", length=50)
     */
    private $bedType;


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
     * Set bedType
     *
     * @param string $bedType
     * @return BedType
     */
    public function setBedType($bedType)
    {
        $this->bedType = $bedType;

        return $this;
    }

    /**
     * Get bedType
     *
     * @return string 
     */
    public function getBedType()
    {
        return $this->bedType;
    }
}
