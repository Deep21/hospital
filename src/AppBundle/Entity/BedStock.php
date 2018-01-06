<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * BedStock
 *
 * @ORM\Table(name="bed_stock")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BedStockRepository")
 */
class BedStock
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
     * @var integer
     *
     * @ORM\Column(name="bedTotal", type="integer")
     */
    private $bedTotal;

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
     * @param \AppBundle\Entity\BedType $bedType
     * @return BedStock
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

    /**
     * Set bedTotal
     *
     * @param integer $bedTotal
     * @return BedStock
     */
    public function setBedTotal($bedTotal)
    {
        $this->bedTotal = $bedTotal;

        return $this;
    }

    /**
     * Get bedTotal
     *
     * @return integer 
     */
    public function getBedTotal()
    {
        return $this->bedTotal;
    }
}
