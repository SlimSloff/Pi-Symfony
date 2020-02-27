<?php

namespace ArbiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seance
 *
 * @ORM\Table(name="seance")
 * @ORM\Entity(repositoryClass="ArbiaBundle\Repository\SeanceRepository")
 */
class Seance
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
     * @ORM\Column(name="DateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFin", type="datetime")
     */
    private $dateFin;

    

    /**
     * @var string
     *
     * @ORM\Column(name="salle", type="string", length=255)
     */
    private $salle;
        /**
     * @ORM\ManyToOne(targetEntity="Professor")
     * @ORM\JoinColumn(name="id_professor",referencedColumnName="id")
     */
    private $professor;


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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return SeanceEleve
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @var string A "Y-m-d H:m:s" formatted value
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     ** @var string A "Y-m-d H:m:s" formatted value
     * @param \DateTime $dateFin
     *
     * @return SeanceEleve
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    

    /**
     * Get datefin
     *
     * @return int
     */
    public function getDatefin()
    {
        return $this->dateFin;
    }

    /**
     * Set salle
     *
     * @param string $salle
     *
     * @return Seance
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return string
     */
    public function getSalle()
    {
        return $this->salle;
    }

        /**
     * @return mixed
     */
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * @param mixed $professor
     */
    public function setProfessor($professor)
    {
        $this->professor = $professor;
    }
}

