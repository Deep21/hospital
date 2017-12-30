<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StockRepository")
 */
class Stock
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
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="physical_quantity", type="integer")
     */
    private $physicalQuantity;

    /**
     * @var int
     *
     * @ORM\Column(name="usable_quantity", type="integer")
     */
    private $usableQuantity;


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
     * Set reference
     *
     * @param string $reference
     * @return Stock
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set physicalQuantity
     *
     * @param integer $physicalQuantity
     * @return Stock
     */
    public function setPhysicalQuantity($physicalQuantity)
    {
        $this->physicalQuantity = $physicalQuantity;

        return $this;
    }

    /**
     * Get physicalQuantity
     *
     * @return integer 
     */
    public function getPhysicalQuantity()
    {
        return $this->physicalQuantity;
    }

    /**
     * Set usableQuantity
     *
     * @param integer $usableQuantity
     * @return Stock
     */
    public function setUsableQuantity($usableQuantity)
    {
        $this->usableQuantity = $usableQuantity;

        return $this;
    }

    /**
     * Get usableQuantity
     *
     * @return integer 
     */
    public function getUsableQuantity()
    {
        return $this->usableQuantity;
    }
}
