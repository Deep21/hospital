<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * BedPatient
 *
 * @ORM\Table(name="bed_patient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BedPatientRepository")
 */
class BedPatient
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
     * @var \DateTime
     *
     * @ORM\Column(name="charge_at", type="datetime")
     */
    private $chargeAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="disharge_at", type="datetime")
     */
    private $dishargeAt;

    /**
     * @ManyToOne(targetEntity="AppBundle\Entity\Patient", cascade={"persist"})
     * @JoinColumn(name="patient_id", referencedColumnName="id")
     */
    private $patient;


    private $bedStock;

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
     * Set chargeAt
     *
     * @param \DateTime $chargeAt
     * @return BedPatient
     */
    public function setChargeAt($chargeAt)
    {
        $this->chargeAt = $chargeAt;

        return $this;
    }

    /**
     * Get chargeAt
     *
     * @return \DateTime 
     */
    public function getChargeAt()
    {
        return $this->chargeAt;
    }

    /**
     * Set dishargeAt
     *
     * @param \DateTime $dishargeAt
     * @return BedPatient
     */
    public function setDishargeAt($dishargeAt)
    {
        $this->dishargeAt = $dishargeAt;

        return $this;
    }

    /**
     * Get dishargeAt
     *
     * @return \DateTime 
     */
    public function getDishargeAt()
    {
        return $this->dishargeAt;
    }

    /**
     * Set patient
     *
     * @param \AppBundle\Entity\Patient $patient
     * @return BedPatient
     */
    public function setPatient(\AppBundle\Entity\Patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \AppBundle\Entity\Patient 
     */
    public function getPatient()
    {
        return $this->patient;
    }
}
